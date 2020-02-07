@extends('admin.layout')

@section('title')
Редактирование ссылки
@endsection

@section('vendor_styles')
<link href="/assets/admin/css/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

{{Form::open([
	'route'		=>	['menu.update', $menu->id],
	'files'		=>	true,
	'method'	=>	'put',
	'id'		=>	'form_upload'
])}}

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	
	<!-- begin:: Content Head -->
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">
					Редактирование ссылки
				</h3>
				<span class="kt-subheader__separator kt-subheader__separator--v"></span>
				<span class="kt-subheader__desc">{{ $menu->title_ru }}</span>
			</div>
			<div class="kt-subheader__toolbar">
				<a href="{{ route('menu.index') }}" class="btn btn-default btn-bold">Назад</a>
				<div class="btn-group">
					<button type="submit" class="btn btn-brand btn-bold">Сохранить изменения</button>
				</div>
			</div>
		</div>
	</div>

	<!-- end:: Content Head -->

	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

		<div id="result"></div>

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
					
					@foreach ($g_languages as $lang)
					<div class="tab-pane @if ($lang->is_default == 1) active @endif" id="kt_user_edit_tab_{{ $lang->code }}" role="tabpanel">
						<div class="kt-form kt-form--label-right">
							<div class="kt-form__body">
								<div class="kt-section kt-section--first">
									<div class="kt-section__body">
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Заголовок *</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" placeholder="Введите заголовок на русском" id="{{ $lang->code }}_title" name="locale[{{ $lang->code }}][title]" value="{{ $menu->getLocalize($lang->code, 'title') }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Ссылка</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" name="locale[{{ $lang->code }}][link]" id="{{ $lang->code }}_slug" placeholder="Введите ссылку" value="{{ $menu->getLocalize($lang->code, 'link') }}">
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
											<input class="form-control" type="text" name="position" placeholder="Установите порядок" value="{{ $menu->position }}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Выберите родителя</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control" name="parent_id">
												@if($menu->parent_id == 0)
													<option value="0" checked>Выберите родителя</option>
												@else
													<option value="0">Выберите родителя</option>
												@endif
												@foreach($menus as $item)
													@if($item->id == $menu->parent_id)
														<option value="{{ $item->id }}" checked>{{ $item->{{ $menu->getLocalize($default_lang, 'title') }} }}</option>
													@endif
													<option value="{{ $item->id }}">{{ $item->{{ $menu->getLocalize($default_lang, 'title') }} }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="row">
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
													<input type="checkbox" @if($menu->is_public == 1) checked="checked" @endif name="is_public">
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
<script>
$('#form_upload').submit(function(event) {
	event.preventDefault();

	$('button').attr('disabled', true);
	
	$.ajax({
		type: $(this).attr('method'),
		url: $(this).attr('action'),
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		statusCode: {
			404: function() {
				alert( "Страница не найдена." );
			}
		},
		success: function(result){
			$('#result').html('<div class="alert alert-success fade show" role="alert"><div class="alert-icon"><i class="flaticon-warning"></i></div><div class="alert-text">'+ result.status +'</div><div class="alert-close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="la la-close"></i></span></button></div></div>');
			
			$('button').attr('disabled', false);

			if (result.type == 'create') {
				location.reload();
			}
		}, 
		error: function(result) {
			$('#result').html(result);
			$('button').attr('disabled', false);
		}
	})
});
</script>
@endsection