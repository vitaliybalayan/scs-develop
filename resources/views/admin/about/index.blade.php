@extends('admin.layout')

@section('title')
О компании
@endsection

@section('vendor_styles')
<link href="/assets/admin/css/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

{{Form::open([
	'route'		=>	'about.store',
	'files'		=>	true,
])}}

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<!-- begin:: Content Head -->
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Информация о компании
				</h3>
			</div>
			<div class="kt-subheader__toolbar">
				<a href="{{ route('services.index') }}" class="btn btn-default btn-bold">Назад</a>
				<div class="btn-group">
					<button type="submit" class="btn btn-brand btn-bold">Сохранить</button>
				</div>
			</div>
		</div>
	</div>

	<!-- end:: Content Head -->

	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

		@include('admin.errors')

		<div class="kt-portlet kt-portlet--tabs">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-toolbar">
					<ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">

						@if ($g_languages->count() == 0)
							<li class="nav-item">
								<a class="nav-link" href="{{ route('languages.create') }}">
									Нет доступной локализации. Добавить?
								</a>
							</li>
						@endif

						@foreach($g_languages as $lang)
						<li class="nav-item">
							<a class="nav-link @if ($lang->is_default == 1) active @endif" data-toggle="tab" href="#kt_user_edit_tab_{{ $lang->id }}" role="tab">
								<img src="{{ $lang->getImage() }}" alt="{{ $lang->code }}" class="kt-svg-icon" style="margin-right: 0.5rem;">
								{{ $lang->name }}
							</a>
						</li>
						@endforeach

					</ul>
				</div>
			</div>
			<div class="kt-portlet__body">
				<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
				<div class="tab-content">

					<div class="kt-form kt-form--label-right">
						<div class="kt-form__body">
							<div class="kt-section kt-section--first">
								<div class="kt-section__body">

									<div class="form-group row">
										<label class="col-form-label col-lg-3 col-sm-12">Изображение</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
												<div class="kt-avatar__holder" style="background-image: url('/assets/noimage.png'); background-size: 100% auto; background-position: center;"></div>
												<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Добавить превью">
												<i class="fa fa-pen"></i>
												<input type="file" name="image" accept=".png, .jpg, .jpeg">
												</label>
												<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Добавить превью">
												<i class="fa fa-times"></i>
												</span>
											</div>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Полное название компании</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control" type="text" placeholder="Введите полное название компании" name="company_name">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Телефон</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control" type="text" placeholder="Введите телефон" name="phone">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Email</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control" type="text" placeholder="Введите email" name="email">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Видео</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control" type="text" placeholder="Вставьте ссылку на видео" name="video">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					@foreach ($g_languages as $lang)
					<div class="tab-pane @if ($lang->is_default == 1) active @endif" id="kt_user_edit_tab_{{ $lang->id }}" role="tabpanel">
						<div class="kt-form kt-form--label-right">
							<div class="kt-form__body">
								<div class="kt-section kt-section--first">
									<div class="kt-section__body">

										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Превью-контент</label>
											<div class="col-lg-9 col-xl-6">
												<textarea class="summernote" id="summernote_{{ $lang->code }}" name="locale[{{ $lang->code }}][preview_content]">
													<div class="parallelogram-item__content">
														<div class="parallelogram__content-block">
															<h1>Первая казахстанская сервисная компания</h1>
															<p data-size="middle" data-font_weight="light">Мы построили нашу репутацию на ценностях профессионализма, инноваций, технических знаний, качества, здоровья и безопасности.</p>
														</div>
														<div class="parallelogram__content-block">
															<h5 data-font_weight="bold">Уверенное развитие</h5>
															<p data-size="normal" data-font_weight="light">Высокие конкуренция и стандарты качества позволили нам в самые кратчайшие сроки достичь очень высокого уровня сервиса, сравнимого с международными игроками и в некоторых моментах даже превзойти его.</p>
														</div>
														<div class="parallelogram__content-block">
															<div class="parallelogram-links">
																<a href="{{ route('_about.index', app()->getLocale()) }}" class="text__button green" data-size="middle">История &amp; Миссия</a>
															</div>
														</div>
													</div>
												</textarea>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Слоган</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" placeholder="Слоган" name="locale[{{ $lang->code }}][quote]">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Контент</label>
											<div class="col-lg-9 col-xl-6">
												<textarea class="summernote" id="summernote_{{ $lang->code }}" name="locale[{{ $lang->code }}][content]"></textarea>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Мета-теги</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[{{ $lang->code }}][meta_tags]" placeholder="Введите мета-теги через запятую">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach

					<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>

					<div class="kt-form kt-form--label-right">
						<div class="kt-form__body">
							<div class="kt-section kt-section--first">
								<div class="kt-section__body">
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">OG Image</label>
										<div class="col-lg-9 col-xl-6">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="og_image" id="customFile">
												<label class="custom-file-label" for="customFile" style="text-align: left;">Выберите файл</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>

	<!-- end:: Content -->
</div>

{{Form::close()}}

@endsection

@section('vendor_scripts')
<script src="/assets/admin/js/pages/custom/user/edit-user.js" type="text/javascript"></script>

<script src="/assets/admin/js/pages/crud/file-upload/ktavatar.js" type="text/javascript"></script>

<script src="/assets/admin/js/pages/crud/forms/editors/summernote.js" type="text/javascript"></script>
<script src="/assets/admin/js/pages/crud/forms/widgets/autosize.js" type="text/javascript"></script>

<script src="/assets/admin/speakingurl-master/speakingurl.min.js" type="text/javascript"></script>
<script src="/assets/admin/jquery-slugify-master/dist/slugify.min.js" type="text/javascript"></script>
@endsection