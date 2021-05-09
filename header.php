<!doctype html>
<html>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
			<div class="flyout-menu">
				<div>
					<?= build_custom_category_tree($catIdOfPost, $rootIdOfCat) ?>
				</div>
			</div>
			<div class="side-bar">
				<div class="side-bar__text">Тренды нового сезона</div>
			</div>

			<div class="header__top">
				<div class="logo-block">
					P U L I N E
				</div>
				<?php wp_nav_menu([
					'menu' => 'header_and_footer_menu',
					'theme_location' => 'header_and_footer_menu',
				]); ?>
			</div>
		</header>