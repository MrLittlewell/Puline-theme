<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">	
	<?php wp_head(); ?>
</head>
<body>
	<div id="main-wrapper">
  <header id="header">
		<div class="flyout-trigger">
			<span class="flyout-trigger__bar"></span>
			<span class="flyout-trigger__bar"></span>
			<span class="flyout-trigger__bar"></span>
		</div>
		<div class="side-bar">
			<div class="side-bar__text">Тренды нового сезона</div>
		</div>

		<div class="header__top">
			<nav class="header__menu menu-loaded">
				<div class="header__menu__items js-header-items">
				<button 
					class="js-productmenu-trigger header__menu__item--products"
					aria-controls="product-menu"
					aria-expanded="false" 
					id="product-menu-control">
					продукты
				</button>
				<div class="content-asset">
					<a href="#">Комнаты</a>
					<a href="#" title="Вдохновение">Вдохновение</a>
					<a href="#" title="Услуга выезда дизайнера">Услуга выезда дизайнера</a>
					<a href="#">Найти магазин</a>
					<a href="#" title="Professionals">Professionals</a>
				</div> 
				<div class="header__menu__item--icon">
					<button class="js-search-trigger" aria-labelledby="search-button-label">
							<span>svg icon</span>
						<span id="search-button-label" class="visually-hidden">Поиск по каталогу</span>
					</button>
				</div>
			</nav>
		</div>
	</header>