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
							@foreach($g_languages as $lang)
								<a href="/{{ $lang->code }}">{{ $lang->code }}</a>
							@endforeach
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
						<a href="{{ route('index', app()->getLocale()) }}">
							<img src="{{ $site->getLogotype() }}" alt="{{ $site->name }}">
						</a>
					</div>
					<div class="nav-menu_mobile-hamburger">
						
						<div class="menu_hamburger-button" onclick="showMobileMenu();">
							<span class="menu_hamburder-icon"></span>
						</div>

						<div class="mobile-menu_block">

							@if ($menus->count() != 0)
								@foreach ($menus as $menu)
								<div class="mobile-menu-item">
									@if($menu->parent_id == null)
									<a href="{{ $menu->getLocalize(app()->getLocale(), 'link') }}" class="mobile-submenu_link" data-menu="{{ $menu->id }}">{{ $menu->getLocalize(app()->getLocale(), 'title') }}</a>
									@endif
									@if ($menu->sub_menu->count())
										<div class="mobile-submenu" data-menu_item="{{ $menu->id }}">
										@foreach ($menu->sub_menu as $sub_menu)
											<a href="{{ $sub_menu->getLocalize(app()->getLocale(), 'link') }}">{{ $sub_menu->getLocalize(app()->getLocale(), 'title') }}</a>
										@endforeach
										</div>
									@endif
								</div>
								@endforeach
							@else
								<a href="/" onclick="return false;" class="mobile-submenu_link">Нет ссылок</a>
							@endif

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
								<a href="{{ route('index', app()->getLocale()) }}">
									<img src="{{ $site->getLogotype() }}" alt="{{ $site-> name }}">
								</a>
							</div>
							<nav class="menu__list">

								@if ($menus->count() != 0)
									@foreach ($menus as $menu)
										@if($menu->parent_id == null)
											<a href="{{ $menu->getLocalize(app()->getLocale(), 'link') }}" class="submenu_link" @if($menu->sub_menu->count() != 0) data-submenu="{{ $menu->id }}" @endif>{{ $menu->getLocalize(app()->getLocale(), 'title') }}</a>
										@endif
									@endforeach
								@else
									<div class="submenu_link">
										<a href="/" onclick="return false;">Нет ссылок</a>
									</div>
								@endif

							</nav>
						</div>
					</div>
				</div>
			</div>

			<div class="submenu-conainer">
				<div class="g-content">
					<div class="container">
						
						<div class="submenu-content">

							@if ($menus->count() != 0)
								@foreach ($menus as $menu)
									@if ($menu->sub_menu->count() != 0)
										<div class="submenu-item" data-submenu_item="{{ $menu->id }}">
											@foreach ($menu->sub_menu as $submenu)
												<a href="{{ $submenu->getLocalize(app()->getLocale(), 'link') }}">{{ $submenu->getLocalize(app()->getLocale(), 'title') }}</a>
											@endforeach
										</div>
									@endif
								@endforeach
							@else
								<div class="submenu-item">
									<a href="/" onclick="return false;">Нет ссылок</a>
								</div>
							@endif

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
