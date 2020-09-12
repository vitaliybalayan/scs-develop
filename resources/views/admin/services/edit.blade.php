@extends('admin.layout')

@section('title')
Редактирование услуги
@endsection

@section('vendor_styles')
<link href="/assets/admin/css/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

{{Form::open([
	'route'		=>	['services.update', $service->id],
	'files'		=>	true,
	'method'	=> 'put'
])}}

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<!-- begin:: Content Head -->
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Редактирование услуги
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
							<a class="nav-link @if ($lang->code == 'ru') active @endif" data-toggle="tab" href="#kt_user_edit_tab_{{ $lang->id }}" role="tab">
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
												<div class="kt-avatar__holder" style="background-image: url('{{ $service->getImage() }}'); background-size: 100% auto; background-position: center;"></div>
												<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Добавить превью">
												<i class="fa fa-pen"></i>
												<input type="file" name="preview" accept=".png, .jpg, .jpeg">
												</label>
												<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Добавить превью">
												<i class="fa fa-times"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					@foreach ($g_languages as $lang)
					<div class="tab-pane @if ($lang->code == 'ru') active @endif" id="kt_user_edit_tab_{{ $lang->id }}" role="tabpanel">
						<div class="kt-form kt-form--label-right">
							<div class="kt-form__body">
								<div class="kt-section kt-section--first">

									<div class="kt-section__body">
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Заголовок *</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" placeholder="Введите заголовок" name="locale[{{ $lang->code }}][title]" id="{{ $lang->code }}_title" value="{{ $service->getLocalize($lang->code, 'title') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Ссылка</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" id="{{ $lang->code }}_slug" name="locale[{{ $lang->code }}][slug]" placeholder="Введите свой вариант ссылки" value="{{ $service->getLocalize($lang->code, 'slug') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Введите краткий заголовок</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[{{ $lang->code }}][sub_title]" placeholder="Введите краткий заголовок" value="{{ $service->getLocalize($lang->code, 'sub_title') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Цитата</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[{{ $lang->code }}][blockquote]" placeholder="Введите цитату" value="{{ $service->getLocalize($lang->code, 'blockquote') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Описание</label>
											<div class="col-lg-9 col-xl-6">
												<textarea name="locale[{{ $lang->code }}][desc]" class="form-control autosize" id="kt_autosize_{{ $lang->code }}" placeholder="Введите краткое описание">{{ $service->getLocalize($lang->code, 'desc') }}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Контент</label>
											<div class="col-lg-9 col-xl-6">
												<textarea class="summernote" id="summernote_{{ $lang->code }}" name="locale[{{ $lang->code }}][content]">{!! $service->getLocalize($lang->code, 'content') !!}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Мета-теги</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[{{ $lang->code }}][meta_tags]" placeholder="Введите мета-теги через запятую" value="{{ $service->getLocalize($lang->code, 'meta_tags') }}">
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
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
											<img src="{{ $service->getOgImage() }}" alt="{{ $service->getLocalize('ru', 'title') }}" style="max-height: 200px">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Порядок</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control" type="text" name="position" placeholder="Установите порядок" value="1">
										</div>
									</div>
									<div class="form-group form-group-sm row">
										<label class="col-xl-3 col-lg-3 col-form-label">Опубликованно</label>
										<div class="col-lg-9 col-xl-6">
											<span class="kt-switch">
												<label>
													<input type="checkbox" checked="checked" name="is_public">
													<span></span>
												</label>
											</span>
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

@foreach($g_languages as $lang)
<script>
	$('#{{ $lang->code }}_slug').slugify('#{{ $lang->code }}_title');
</script>
@endforeach

@endsection