@extends('admin.layout')

@section('title')
Настройки сайта
@endsection

@section('vendor_styles')
@endsection

@section('content')

{{Form::open([
	'route'	=>	'admin.settings.store',
	'files'	=>	true,
	'id' => 'form_upload'
])}}

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<div id="result"></div>

	<!-- begin:: Content Head -->
	<div class="kt-subheader  kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title">Настройки сайта</h3>
				<div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
					<input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
					<span class="kt-input-icon__icon kt-input-icon__icon--right">
						<span><i class="flaticon2-search-1"></i></span>
					</span>
				</div>
			</div>
			@include('admin.blocks.quick_jump')
		</div>
	</div>

	<!-- end:: Content Head -->

	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="row">
			<div class="col-lg-6">

				<!--begin::Portlet-->
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Описание
							</h3>
						</div>
					</div>

					<!--begin::Form-->
					<div class="kt-portlet__body">
						<div class="kt-section--first">
							<div class="form-group">
								<label>Название сайта:</label>
								<input type="text" class="form-control" name="name" placeholder="Введите название сайта">
								<span class="form-text text-muted">Пожалуйста введите название сайта</span>
							</div>
							<div class="form-group">
								<label>Префикс сайта:</label>
								<input type="text" class="form-control" name="name_prefix" placeholder="Введите название сайта">
								<span class="form-text text-muted">Пожалуйста введите префикс сайта. Отображается во вкладе браузера и в поисковой выдаче. Например: (site_name) | PARALLAX.PRO</span>
							</div>
							<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
							<div class="form-group">
								<label>Краткое описание сайта:</label>
								<textarea name="desc" class="form-control" id="kt_autosize_1">Введите кратое описание сайта</textarea>
							</div>
							<div class="form-group">
								<label>Теги сайта:</label>
								<input type="text" class="form-control" name="meta_tags" placeholder="Введите теги сайта">
								<span class="form-text text-muted">Пожалуйста введите мета-теги сайта. Эти ключевые слова, влияют на поисковую выдачу.</span>
							</div>
							<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
							<div class="form-group">
								<label>Email Администратора:</label>
								<input type="text" class="form-control" name="admin_email" placeholder="Введите email администратора">
							</div>
						</div>
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Подтвердить</button>
						</div>
					</div>

					<!--end::Form-->
				</div>
				<!--end::Portlet-->

				<!--begin::Portlet-->
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Yandex Metrika
							</h3>
						</div>
					</div>

					<!--begin::Form-->
					<div class="kt-portlet__body">

						<div class="form-group">
							<label>Код:</label>
							<textarea name="yandex_metrica" class="form-control" id="kt_autosize_2"></textarea>
							<span class="form-text text-muted">Вставьте код <a href="https://metrika.yandex.kz/" target="_blank">Яндекс.Метрика</a></span>
						</div>

					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Подтвердить</button>
						</div>
					</div>

					<!--end::Form-->
				</div>
				<!--end::Portlet-->

				<!--begin::Portlet-->
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Yandex Webmaster
							</h3>
						</div>
					</div>

					<!--begin::Form-->
					<div class="kt-portlet__body">

						<div class="form-group">
							<label>Код:</label>
							<textarea name="yandex_webmaster" class="form-control" id="kt_autosize_3"></textarea>
							<span class="form-text text-muted">Вставьте код <a href="http://webmaster.yandex.ru/" target="_blank">Яндекс.Вебмастер</a></span>
						</div>

					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Подтвердить</button>
						</div>
					</div>

					<!--end::Form-->
				</div>
				<!--end::Portlet-->

			</div>
			<div class="col-lg-6">

				<!--begin::Portlet-->
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Медиа сайта
							</h3>
						</div>
					</div>

					<!--begin::Form-->
					<div class="kt-portlet__body">
						<div class="kt-section--first row">

							<div class="form-group col-6">
								<label>Логотип</label>
								<div class="custom-file">
									<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
										<div class="kt-avatar__holder" style="background-image: url('/assets/noimage.png'); background-size: 100% auto; background-position: center;"></div>
										<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Сменить логотип">
										<i class="fa fa-pen"></i>
										<input type="file" name="logotype" accept=".png, .jpg, .jpeg">
										</label>
										<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Сменить логотип">
										<i class="fa fa-times"></i>
										</span>
									</div>
								</div>
							<span class="form-text text-muted">Формат: .PNG, .JPG, .JPEG.<br>Размер должен быть с расчетом для retina. Примерно: 200х200</span>
							</div>

							<div class="form-group col-6">
								<label>OG Image</label>
								<div class="custom-file">
									<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
										<div class="kt-avatar__holder" style="background-image: url('/assets/noimage.png'); background-size: 100% auto; background-position: center;"></div>
										<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Сменить OG Image">
										<i class="fa fa-pen"></i>
										<input type="file" name="og_image" accept=".png, .jpg, .jpeg">
										</label>
										<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Сменить OG Image">
										<i class="fa fa-times"></i>
										</span>
									</div>
								</div>
							<span class="form-text text-muted">Формат: .PNG, .JPG, .JPEG.<br>Данное изображение проявляется в виде превью, при отправки ссылки в социальных сетях. Рекомендуемый размер: 1200х630</span>
							</div>

							<div class="form-group col-6">
								<label>Favicon</label>
								<div class="custom-file">
									<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_3">
										<div class="kt-avatar__holder" style="background-image: url('/assets/noimage.png'); background-size: 100% auto; background-position: center;"></div>
										<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Сменить Favicon">
										<i class="fa fa-pen"></i>
										<input type="file" name="favicon" accept=".png, .jpg, .jpeg">
										</label>
										<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Сменить Favicon">
										<i class="fa fa-times"></i>
										</span>
									</div>
								</div>
							<span class="form-text text-muted">Формат: .PNG, .JPG, .JPEG.<br>Наши алгоритмы продублирют изображение в несколько форматов.<br>Рекомендуемый размер: 114х114.</span>
							</div>

							<div class="form-group col-6">
								<label>Favicon Retina</label>
								<div class="custom-file">
									<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_4">
										<div class="kt-avatar__holder" style="background-image: url('/assets/noimage.png'); background-size: 100% auto; background-position: center;"></div>
										<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Сменить Favicon Retina">
										<i class="fa fa-pen"></i>
										<input type="file" name="favicon_retina" accept=".png, .jpg, .jpeg">
										</label>
										<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Сменить Favicon Retina">
										<i class="fa fa-times"></i>
										</span>
									</div>
								</div>
							<span class="form-text text-muted">Формат: .PNG, .JPG, .JPEG.<br>Данный формат можно не заполнять, если вы последовали рекомендации загрузки favicon. Рекомендуемый размер: 114х114</span>
							</div>

						</div>
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Подтвердить</button>
						</div>
					</div>

					<!--end::Form-->
				</div>
				<!--end::Portlet-->

				<!--begin::Portlet-->
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Google Analytics
							</h3>
						</div>
					</div>

					<!--begin::Form-->
					<div class="kt-portlet__body">

						<div class="form-group">
							<label>Код:</label>
							<textarea name="google_analytics" class="form-control" id="kt_autosize_4"></textarea>
							<span class="form-text text-muted">Вставьте код <a href="https://analytics.google.com/" target="_blank">Google Analytics</a></span>
						</div>

					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Подтвердить</button>
						</div>
					</div>

					<!--end::Form-->
				</div>
				<!--end::Portlet-->
			</div>
		</div>
	</div>

	<!-- end:: Content -->
</div>

{{Form::close()}}

@endsection

@section('vendor_scripts')
<script src="/assets/admin/js/pages/crud/forms/widgets/autosize.js" type="text/javascript"></script>
<script src="/assets/admin/js/pages/crud/file-upload/ktavatar.js" type="text/javascript"></script>

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
			$('#dd').html(result);
			$('button').attr('disabled', false);
		}
	})
});
</script>

@endsection