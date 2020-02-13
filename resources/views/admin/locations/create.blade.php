@extends('admin.layout')

@section('title')
Добавление местоположение
@endsection

@section('vendor_styles')
<link href="assets/admin/css/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

{{Form::open([
	'route'		=>	'locations.store',
	'files'		=>	true,
])}}

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<!-- begin:: Content Head -->
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Добавление местоположение
				</h3>
			</div>
			<div class="kt-subheader__toolbar">
				<a href="{{ route('locations.index') }}" class="btn btn-default btn-bold">Назад</a>
				<div class="btn-group">
					<button type="submit" class="btn btn-brand btn-bold">Добавить местоположение</button>
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
							<a class="nav-link @if ($lang->is_default == 1) active @endif" data-toggle="tab" href="#kt_user_edit_tab_{{ $lang->code }}" role="tab">
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

					@foreach ($g_languages as $lang)
					<div class="tab-pane @if ($lang->is_default == 1) active @endif" id="kt_user_edit_tab_{{ $lang->code }}" role="tabpanel">
						<div class="kt-form kt-form--label-right">
							<div class="kt-form__body">
								<div class="kt-section kt-section--first">
									<div class="kt-section__body">

										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Город *</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" placeholder="Введите город" name="locale[{{ $lang->code }}][city]">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Полный адрес</label>
											<div class="col-lg-9 col-xl-6">
												<textarea name="locale[{{ $lang->code }}][address]" class="form-control" id="kt_autosize_2"></textarea>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Email</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" placeholder="Введите email города" name="locale[{{ $lang->code }}][email]">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Телефон</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" placeholder="Введите телефон города" name="locale[{{ $lang->code }}][phone]">
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach

					<div class="kt-form kt-form--label-right">
						<div class="kt-form__body">
							<div class="kt-section kt-section--first">
								<div class="kt-section__body">
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Порядок</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control" type="text" name="position" placeholder="Установите порядок" value="1">
										</div>
									</div>
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h3 class="kt-section__title kt-section__title-sm">Отображение:</h3>
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
<script src="assets/admin/js/pages/custom/user/edit-user.js" type="text/javascript"></script>
<script src="/assets/admin/jquery-slugify-master/dist/slugify.min.js" type="text/javascript"></script>
<script src="/assets/admin/js/pages/crud/forms/widgets/autosize.js" type="text/javascript"></script>
@endsection