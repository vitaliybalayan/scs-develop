<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">

	<title>
		@yield('title') | {{ $site->name_prefix }}
	</title>

	@yield('detalis')

	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet">


	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="shortcut icon" href="{{ $site->getFavicon(48) }}" type="image/x-icon">
	<link rel="apple-touch-icon" href="{{ $site->getFavicon(57) }}">

	@if($site->getFaviconRetina(72))
	<link rel="apple-touch-icon" sizes="72x72" href="{{ $site->getFaviconRetina(72) }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ $site->getFaviconRetina(114) }}">
	@else
	<link rel="apple-touch-icon" sizes="72x72" href="{{ $site->getFavicon(72) }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ $site->getFavicon(114) }}">
	@endif

	<link rel="stylesheet" href="/assets/frontend/css/main.min.css">
</head>

<body>

	<!-- HEADER -->
	<header class="fixed-header">
		<!-- TOP Header -->
		<div class="top-header">
			<div class="container">
				<div class="top-header__content inline-middle">
					<div class="top-h_dropdown__menu">
						<div class="dropdown-default__value inline-middle" id="dropdown__button" onclick="showDropdown(1)">
							<span>{{ app()->getLocale() }}</span>
							<img src="/assets/frontend/img/icons/arrow-down.svg">
						</div>
						<div class="dropdown-_value top_header--dropdown" style="display: none;" data-dropdown_list="1">
							@if(app()->getLocale() != 'en')
							<a href="/en">EN</a>
							@endif
							@if(app()->getLocale() != 'kz')
							<a href="/kz">kz</a>
							@endif
							@if(app()->getLocale() != 'ru')
							<a href="/ru">ru</a>
							@endif
						</div>
					</div>
					<div class="top-h_link"><a href="#" title="Карьера">Карьера</a></div>
				</div>
			</div>
		</div>
		<!-- TOP Header -->
		<!-- Mobile menu -->
		<div class="nav-menu_mobile">
			<div class="g-content">
				<div class="nav-menu_mobile-content col-2">
					
					<div class="nav-menu_mobile-logotype">
						<a href="{{ route('index', $lang) }}">
							<img src="{{ $site->getLogotype() }}" alt="{{ $site->name }}">
						</a>
					</div>
					<div class="nav-menu_mobile-hamburger">
						
						<div class="menu_hamburger-button" onclick="showMobileMenu();">
							<span class="menu_hamburder-icon"></span>
						</div>

						<div class="mobile-menu_block">

							<div class="mobile-menu-item">
								<a href="#" class="mobile-submenu_link" data-menu="1">Услуги</a>
								<div class="mobile-submenu" data-menu_item="1">
									<a href="#">Корпоративное питание</a>
									<a href="#">Прачечные услуги</a>
								</div>
							</div>

							<div class="mobile-menu-item">
								<a href="#" class="mobile-submenu_link" data-menu="2">O SCS</a>
								<div class="mobile-submenu" data-menu_item="2">
									<a href="#">Корпоративное питание</a>
								</div>
							</div>

							<a href="#" class="mobile-submenu_link">Сертификация</a>
							<a href="/clients.html" class="mobile-submenu_link">Наши клиенты</a>
							<a href="#" class="mobile-submenu_link">Новости</a>
							<a href="#" class="mobile-submenu_link">Контакты</a>
						</div>

					</div>

				</div>
			</div>
		</div>
		<!-- Mobile menu -->
		<!-- Main menu -->
		<div class="nav-menu">

			<div class="g-content">
				<div class="nav-menu__content">
					<div class="container">
						<div class="col-a_1">
							<div class="logotype">
								<a href="{{ route('index', $lang) }}">
									<img src="{{ $site->getLogotype() }}" alt="{{ $site-> name }}">
								</a>
							</div>
							<nav class="menu__list">
								<a href="#" class="submenu_link" data-submenu="1">Услуги</a>
								<a href="#" class="submenu_link" data-submenu="2">O SCS</a>
								<a href="#" class="submenu_link" data-submenu="3">Сертификация</a>
								<a href="/clients.html" class="submenu_link" data-submenu="4">Наши клиенты</a>
								<a href="#" class="submenu_link" data-submenu="5">Новости</a>
								<a href="#" class="submenu_link">Контакты</a>
							</nav>
						</div>
					</div>
				</div>
			</div>

			<div class="submenu-conainer">
				<div class="g-content">
					<div class="container">
						
						<div class="submenu-content">
							
							<div class="submenu-item" data-submenu_item="1">
								<a href="#" onclick="return false;">1</a>
								<a href="#" onclick="return false;">2</a>
								<a href="#" onclick="return false;">3</a>
							</div>

							<div class="submenu-item" data-submenu_item="2">
								<a href="#" onclick="return false;">О компании</a>
								<a href="#" onclick="return false;">Миссия и ценности</a>
								<a href="#" onclick="return false;">Статистика</a>
							</div>

							<div class="submenu-item" data-submenu_item="3">
								<a href="#" onclick="return false;">1</a>
								<a href="#" onclick="return false;">3</a>
								<a href="#" onclick="return false;">2</a>
							</div>

							<div class="submenu-item" data-submenu_item="4">
								<a href="#" onclick="return false;">3</a>
								<a href="#" onclick="return false;">1</a>
								<a href="#" onclick="return false;">2</a>
							</div>

							<div class="submenu-item" data-submenu_item="5">
								<a href="#" onclick="return false;">2</a>
								<a href="#" onclick="return false;">1</a>
								<a href="#" onclick="return false;">3</a>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- Main menu -->
	</header>
	<!-- HEADER -->

	@yield('content')

	<div class="footer_line"></div>

	@yield('footer')

	<script src="/assets/frontend/js/scripts.min.js"></script>

</body>
</html>
