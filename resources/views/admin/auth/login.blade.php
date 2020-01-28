<!DOCTYPE html>

<html lang="ru">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Авторизация | PARALLAX PANEL</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="/assets/admin/fonts/CenturyGothic/stylesheet.css">
		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="/assets/admin/css/pages/login/login-3.css" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="/assets/admin/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/admin/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="/assets/admin/media/logos/favicon.ico" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(/assets/admin/media/bg/bg-3.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="{{ \Request::url() }}">
									<img src="/assets/admin/media/logos/logo-5.png">
								</a>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Вход в административную панель</h3>
								</div>

								{{Form::open([
									'route'	=>	'panel.login',
									'class' => 'kt-form'
								])}}
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Пароль" name="password">
									</div>
									<div class="kt-login__actions">
										<button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Вход</button>
									</div>
								{{Form::close()}}

							</div>
							<div class="kt-login__signup">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Регистрация</h3>
									<div class="kt-login__desc">
										@include('admin.errors')
									</div>
								</div>

								{{Form::open([
									'route'	=>	'panel.register',
									'class' => 'kt-form'
								])}}

									<div class="input-group">
										<input class="form-control" type="text" placeholder="Имя" name="first_name" value="{{ old('first_name') }}">
									</div>

									<div class="input-group">
										<input class="form-control" type="text" placeholder="Фамилия" name="last_name" value="{{ old('last_name') }}">
									</div>

									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" value="{{ old('email') }}">
									</div>

									<div class="input-group">
										<input class="form-control" type="password" placeholder="Пароль" name="password">
									</div>

									<div class="input-group">
										<input class="form-control" type="password" placeholder="Подтвердите пароль" name="password_confirmation">
									</div>

									<div class="kt-login__actions">
										<button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Регистрация</button>&nbsp;&nbsp;
										<button id="kt_login_signup_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Назад</button>
									</div>

								{{Form::close()}}

							</div>
							<div class="kt-login__forgot">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Forgotten Password ?</h3>
									<div class="kt-login__desc">Enter your email to reset your password:</div>
								</div>
								<form class="kt-form" action="">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
									</div>
									<div class="kt-login__actions">
										<button id="kt_login_forgot_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Request</button>&nbsp;&nbsp;
										<button id="kt_login_forgot_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
							<div class="kt-login__account">
								<span class="kt-login__account-msg">
									Don't have an account yet ?
								</span>
								&nbsp;&nbsp;
								<a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">Sign Up!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#2c77f4",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="/assets/admin/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="/assets/admin/js/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="/assets/admin/js/pages/custom/login/login-general.js" type="text/javascript"></script>

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>