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
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1" role="tab">
								<img src="/assets/admin/media/icons/country/russia.svg" alt="RU" class="kt-svg-icon" style="margin-right: 0.5rem;">
								Русский
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2" role="tab">
								<img src="/assets/admin/media/icons/country/kazakhstan.svg" alt="KZ" class="kt-svg-icon" style="margin-right: 0.5rem;">
								Казахский
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3" role="tab">
								<img src="/assets/admin/media/icons/country/usa.svg" alt="USA" class="kt-svg-icon" style="margin-right: 0.5rem;">
								Английский
							</a>
						</li>
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

					<div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
						<div class="kt-form kt-form--label-right">
							<div class="kt-form__body">
								<div class="kt-section kt-section--first">

									<div class="kt-section__body">
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Заголовок *</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" placeholder="Введите заголовок на русском" name="locale[ru][title]" id="ru_title" value="{{ $service->getLocalize('ru', 'title') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Ссылка</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" id="ru_slug" name="locale[ru][slug]" placeholder="Введите свой вариант ссылки" value="{{ $service->getLocalize('ru', 'slug') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Введите краткий заголовок</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[ru][sub_title]" placeholder="Введите краткий заголовок" value="{{ $service->getLocalize('ru', 'sub_title') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Цитата</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[ru][blockquote]" placeholder="Введите цитату" value="{{ $service->getLocalize('ru', 'blockquote') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Описание</label>
											<div class="col-lg-9 col-xl-6">
												<textarea name="locale[ru][desc]" class="form-control" id="kt_autosize_4" placeholder="Введите краткое описание">{{ $service->getLocalize('ru', 'desc') }}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Контент</label>
											<div class="col-lg-9 col-xl-6">
												<textarea class="summernote" id="summernote" name="locale[ru][content]">{!! $service->getLocalize('ru', 'content') !!}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Мета-теги</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[ru][meta_tags]" placeholder="Введите мета-теги через запятую" value="{{ $service->getLocalize('ru', 'meta_tags') }}">
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="kt_user_edit_tab_2" role="tabpanel">
						<div class="kt-form kt-form--label-right">
							<div class="kt-form__body">
								<div class="kt-section kt-section--first">

									<div class="kt-section__body">
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Заголовок *</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" placeholder="Введите заголовок на русском" name="locale[kz][title]" id="ru_title" value="{{ $service->getLocalize('kz', 'title') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Ссылка</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" id="ru_slug" name="locale[kz][slug]" placeholder="Введите свой вариант ссылки" value="{{ $service->getLocalize('kz', 'slug') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Введите краткий заголовок</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[kz][sub_title]" placeholder="Введите краткий заголовок" value="{{ $service->getLocalize('kz', 'sub_title') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Цитата</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[kz][blockquote]" placeholder="Введите цитату" value="{{ $service->getLocalize('kz', 'blockquote') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Описание</label>
											<div class="col-lg-9 col-xl-6">
												<textarea name="locale[kz][desc]" class="form-control" id="kt_autosize_4" placeholder="Введите краткое описание">{{ $service->getLocalize('kz', 'desc') }}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Контент</label>
											<div class="col-lg-9 col-xl-6">
												<textarea class="summernote" id="summernote" name="locale[kz][content]">{!! $service->getLocalize('kz', 'content') !!}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Мета-теги</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[kz][meta_tags]" placeholder="Введите мета-теги через запятую" value="{{ $service->getLocalize('kz', 'meta_tags') }}">
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="kt_user_edit_tab_3" role="tabpanel">
						<div class="kt-form kt-form--label-right">
							<div class="kt-form__body">
								<div class="kt-section kt-section--first">

									<div class="kt-section__body">
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Заголовок *</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" placeholder="Введите заголовок на русском" name="locale[en][title]" id="ru_title" value="{{ $service->getLocalize('en', 'title') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Ссылка</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" id="ru_slug" name="locale[en][slug]" placeholder="Введите свой вариант ссылки" value="{{ $service->getLocalize('en', 'slug') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Введите краткий заголовок</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[en][sub_title]" placeholder="Введите краткий заголовок" value="{{ $service->getLocalize('en', 'sub_title') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Цитата</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[en][blockquote]" placeholder="Введите цитату" value="{{ $service->getLocalize('en', 'blockquote') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Описание</label>
											<div class="col-lg-9 col-xl-6">
												<textarea name="locale[en][desc]" class="form-control" id="kt_autosize_4" placeholder="Введите краткое описание">{{ $service->getLocalize('en', 'desc') }}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Контент</label>
											<div class="col-lg-9 col-xl-6">
												<textarea class="summernote" id="summernote" name="locale[en][content]">{!! $service->getLocalize('en', 'content') !!}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Мета-теги</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[en][meta_tags]" placeholder="Введите мета-теги через запятую" value="{{ $service->getLocalize('en', 'meta_tags') }}">
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

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
									<div class="form-group row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h3 class="kt-section__title kt-section__title-sm">Отображение ссылки:</h3>
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

<script>
	$('#ru_slug').slugify('#ru_title');
	$('#en_slug').slugify('#en_title');
	$('#kz_slug').slugify('#kz_title');
</script>
@endsection