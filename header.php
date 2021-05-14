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
<?php
$address = get_field('address', 'option');
$email = get_field('email', 'option');
$phone = get_field('phone', 'option');
$social_networks = get_field('social_networks', 'option');
?>

<body>
	<div id="main-wrapper">
		<header id="header">
			<div class="flyout-trigger">
				<span class="flyout-trigger__bar"></span>
				<span class="flyout-trigger__bar"></span>
				<span class="flyout-trigger__bar"></span>
			</div>
			<div class="flyout-menu">
				<div class="basic-menu">
				<?php wp_nav_menu([
					'menu' => 'header_and_footer_menu',
					'theme_location' => 'header_and_footer_menu',
				]); ?>
				</div>
				<div class="category-menu">
					<h3>Категории</h3>
					<?= build_custom_category_tree($catIdOfPost, $rootIdOfCat) ?>
				</div>
				<div class="contact_infos">
					<p> <?= $address ?> </p>
					<a class="link" href="mailto:<?= $email ?>"><?= $email ?></a>
					<a class="link" href="tel:<?= $phone ?>"> <?= $phone ?> </a>
				</div>
			</div>
			<div class="side-bar">
				<div class="side-bar__text">Тренды нового сезона</div>
			</div>

			<div class="header__top">
				<div class="logo-block">
					<a href="/">
						<?php
						$custom_logo_id = get_theme_mod('custom_logo');
						$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

						if (has_custom_logo()) {
							echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
						}
						?>
						PULINE DESIGN
					</a>
				</div>
				<?php wp_nav_menu([
					'menu' => 'header_and_footer_menu',
					'theme_location' => 'header_and_footer_menu',
				]); ?>
			</div>
		</header>