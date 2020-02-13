<!DOCTYPE html>
<html lang="ru">

	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>@yield('title') | PARALLAX PANEL</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<!-- <link rel="stylesheet" href="/assets/admin/fonts/CenturyGothic/stylesheet.css"> -->
		<link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=cyrillic" rel="stylesheet">
		<!--end::Fonts -->

		<!--begin::Page Vendors Styles(used by this page) -->
		@yield('vendor_styles')
		<!--end::Page Vendors Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="/assets/admin/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/admin/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<link href="/assets/admin/css/custom_styles.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->

		<link rel="shortcut icon" href="/assets/admin/media/logos/favicon.png" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="{{ route('admin.dashboard') }}">
					<img alt="Logo" src="/assets/admin/media/logos/logo-2-sm.png" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside -->
					<div class="kt-aside__brand kt-grid__item  " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="{{ route('admin.dashboard') }}">
								<img alt="Логотип" src="/assets/admin/media/logos/logo-4.png" />
							</a>
						</div>
					</div>

					<!-- end:: Aside -->

					<!-- begin:: Aside Menu -->
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">
							<ul class="kt-menu__nav ">

								<li class="kt-menu__item  kt-menu__item" aria-haspopup="true">
									<a href="{{ route('users.index') }}" class="kt-menu__link ">
										<i class="kt-menu__link-icon flaticon2-user"></i><span class="kt-menu__link-text">Пользователи</span>
									</a>
								</li>

								<li class="kt-menu__item  kt-menu__item" aria-haspopup="true">
									<a href="{{ route('articles.index') }}" class="kt-menu__link ">
										<i class="kt-menu__link-icon flaticon-doc"></i><span class="kt-menu__link-text">Новости</span>
									</a>
								</li>

								<li class="kt-menu__item  kt-menu__item" aria-haspopup="true">
									<a href="{{ route('services.index') }}" class="kt-menu__link ">
										<i class="kt-menu__link-icon flaticon2-file"></i><span class="kt-menu__link-text">Услуги</span>
									</a>
								</li>

								<li class="kt-menu__item  kt-menu__item" aria-haspopup="true">
									<a href="{{ route('clients.index') }}" class="kt-menu__link ">
										<i class="kt-menu__link-icon flaticon-users-1"></i><span class="kt-menu__link-text">Клиенты</span>
									</a>
								</li>

								<li class="kt-menu__item  kt-menu__item" aria-haspopup="true">
									<a href="{{ route('menu.index') }}" class="kt-menu__link ">
										<i class="kt-menu__link-icon flaticon-grid-menu"></i><span class="kt-menu__link-text">Меню</span>
									</a>
								</li>

								<li class="kt-menu__item  kt-menu__item" aria-haspopup="true">
									<a href="{{ route('admin.settings') }}" class="kt-menu__link ">
										<i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Настройки</span>
									</a>
								</li>
								
								@if (Auth::user()->admin == 1)
								<li class="kt-menu__item  kt-menu__item" aria-haspopup="true">
									<a href="{{ route('languages.index') }}" class="kt-menu__link ">
										<i class="kt-menu__link-icon flaticon2-sort-alphabetically"></i><span class="kt-menu__link-text">Языки</span>
									</a>
								</li>
								@endif

							</ul>
						</div>
					</div>

					<!-- end:: Aside Menu -->
				</div>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin: Header Menu -->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-tab ">
								<ul class="kt-menu__nav ">
									<li class="kt-menu__item kt-menu__item--active" aria-haspopup="true"><a href="{{ route('index', 'ru') }}" class="kt-menu__link" target="_blank"><span class="kt-menu__link-text">Перейти на сайт</span></a></li>
								</ul>
							</div>
						</div>

						<!-- end: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

							<!--begin: Quick Actions -->
							<div class="kt-header__topbar-item dropdown">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="true">
									<span class="kt-header__topbar-icon"><i class="flaticon2-gear"></i></span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
									<form>

										<!--begin: Head -->
										<div class="kt-head kt-head--skin-dark" style="background-image: url(/assets/admin/media/misc/bg-1.jpg)">
											<h3 class="kt-head__title">
												Настройки сайта
											</h3>
										</div>

										<!--end: Head -->

										<!--begin: Grid Nav -->
										<div class="kt-grid-nav kt-grid-nav--skin-light">
											<div class="kt-grid-nav__row">
												<a href="{{ route('admin.settings') }}" class="kt-grid-nav__item">
													<span class="kt-grid-nav__icon">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
														    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														        <rect x="0" y="0" width="24" height="24"/>
														        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
														        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
														    </g>
														</svg>
													</span>
													<span class="kt-grid-nav__title">Описание</span>
													<span class="kt-grid-nav__desc">От название до мета-тегов</span>
												</a>
												<a href="{{ route('admin.settings') }}" class="kt-grid-nav__item">
													<span class="kt-grid-nav__icon">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
														    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														        <polygon points="0 0 24 0 24 24 0 24"/>
														        <path d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z" fill="#000000"/>
														    </g>
														</svg>
													</span>
													<span class="kt-grid-nav__title">Медия</span>
													<span class="kt-grid-nav__desc">Логотип, Favicon</span>
												</a>
											</div>
											<div class="kt-grid-nav__row">
												<a href="{{ route('admin.settings') }}" class="kt-grid-nav__item">
													<span class="kt-grid-nav__icon">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
														    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														        <rect x="0" y="0" width="24" height="24"/>
														        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
														        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
														    </g>
														</svg>
													</span>
													<span class="kt-grid-nav__title">Google</span>
													<span class="kt-grid-nav__desc">Analystics, Search Console</span>
												</a>
												<a href="{{ route('admin.settings') }}" class="kt-grid-nav__item">
													<span class="kt-grid-nav__icon">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
														    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														        <rect x="0" y="0" width="24" height="24"/>
														        <path d="M14,16 L12,16 L12,12.5 C12,11.6715729 11.3284271,11 10.5,11 C9.67157288,11 9,11.6715729 9,12.5 L9,17.5 C9,19.4329966 10.5670034,21 12.5,21 C14.4329966,21 16,19.4329966 16,17.5 L16,7.5 C16,5.56700338 14.4329966,4 12.5,4 L12,4 C10.3431458,4 9,5.34314575 9,7 L7,7 C7,4.23857625 9.23857625,2 12,2 L12.5,2 C15.5375661,2 18,4.46243388 18,7.5 L18,17.5 C18,20.5375661 15.5375661,23 12.5,23 C9.46243388,23 7,20.5375661 7,17.5 L7,12.5 C7,10.5670034 8.56700338,9 10.5,9 C12.4329966,9 14,10.5670034 14,12.5 L14,16 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.500000, 12.500000) rotate(-315.000000) translate(-12.500000, -12.500000) "/>
														    </g>
														</svg>
													</span>
													<span class="kt-grid-nav__title">Yandex</span>
													<span class="kt-grid-nav__desc">Webmaster, Metrika</span>
												</a>
											</div>
										</div>

										<!--end: Grid Nav -->
									</form>
								</div>
							</div>
							<!--end: Quick Actions -->

							<!--begin: User Bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										<span class="kt-hidden kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
										<span class="kt-hidden kt-header__topbar-username kt-hidden-mobile">Sean</span>
										<img alt="Pic" src="{{ $user->getImage() }}" />

										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										<!-- <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bolder">S</span> -->
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
									style="background-image: url(/assets/admin/media/misc/bg-1.jpg)">
										<div class="kt-user-card__avatar">
											<img alt="Pic" src="{{ $user->getImage() }}" />

											<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
											<!-- <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span> -->
										</div>
										<div class="kt-user-card__name">{{$user->first_name}} {{$user->last_name}}</div>
										<div class="kt-user-card__badge">
											<a href="{{ route('panel.logout') }}" class="btn btn-success btn-sm btn-bold btn-font-md">Выйти</a>
										</div>
									</div>
									<!--end: Head -->
									
								</div>
							</div>

							<!--end: User Bar -->
						</div>

						<!-- end:: Header Topbar -->
					</div>
					<!-- end:: Header -->

					<!-- <main id="swup" class="transition-fade"> -->
						@yield('content')
					<!-- </main> -->

					<!-- begin:: Footer -->
					<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-footer__copyright">
								2020&nbsp;&copy;&nbsp;<a href="https://parallax.pro" target="_blank" class="kt-link">PARALLAX.PRO</a>
							</div>
							<div class="kt-footer__menu">
								<a href="https://parallax.pro" target="_blank" class="kt-footer__menu-link kt-link">О компании</a>
								<a href="https://parallax.pro" target="_blank" class="kt-footer__menu-link kt-link">Команда</a>
								<a href="https://parallax.pro" target="_blank" class="kt-footer__menu-link kt-link">Контакты</a>
							</div>
						</div>
					</div>
					<!-- end:: Footer -->
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

		<!--
		<script src="/assets/admin/swup-master/dist/swup.min.js" type="text/javascript"></script>
		<script>
			const swup = new Swup();
		</script>
		-->
		
		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
		@yield('vendor_scripts')
		<!--end::Page Scripts -->

	</body>

	<!-- end::Body -->
</html>