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
	<div class="overtview"></div>
	<div id="main-wrapper">
		<header id="header">
			<div class="search-bar">
				<div class="search-contaner">
					<?php get_search_form(); ?>
					<svg x="0px" y="0px" id="close-search" viewBox="0 0 496.096 496.096">
						<path d="M259.41,247.998L493.754,13.654c3.123-3.124,3.123-8.188,0-11.312c-3.124-3.123-8.188-3.123-11.312,0L248.098,236.686
			L13.754,2.342C10.576-0.727,5.512-0.639,2.442,2.539c-2.994,3.1-2.994,8.015,0,11.115l234.344,234.344L2.442,482.342
			c-3.178,3.07-3.266,8.134-0.196,11.312s8.134,3.266,11.312,0.196c0.067-0.064,0.132-0.13,0.196-0.196L248.098,259.31
			l234.344,234.344c3.178,3.07,8.242,2.982,11.312-0.196c2.995-3.1,2.995-8.016,0-11.116L259.41,247.998z" />
					</svg>
				</div>
			</div>
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
				<div class="header-actions">

					<svg x="0px" y="0px" id="active-search" viewBox="0 0 512 512">
						<path d="M508.875,493.792L353.089,338.005c32.358-35.927,52.245-83.296,52.245-135.339C405.333,90.917,314.417,0,202.667,0
		S0,90.917,0,202.667s90.917,202.667,202.667,202.667c52.043,0,99.411-19.887,135.339-52.245l155.786,155.786
		c2.083,2.083,4.813,3.125,7.542,3.125c2.729,0,5.458-1.042,7.542-3.125C513.042,504.708,513.042,497.958,508.875,493.792z
			M202.667,384c-99.979,0-181.333-81.344-181.333-181.333S102.688,21.333,202.667,21.333S384,102.677,384,202.667
		S302.646,384,202.667,384z" />
					</svg>


					<svg x="0px" y="0px" id="active-favorite" viewBox="0 0 381.247 381.247">
						<path style="fill:#010002;" d="M191.847,360.957c-4.648,0-9.076-1.784-12.447-5.024c-0.245-0.233-29.256-28.289-146.439-145.472
			l-0.817-0.817c-1.205-1.193-1.796-1.88-2.387-2.572C10.621,186.384,0,159.48,0,131.483C0,70.173,49.883,20.29,111.193,20.29
			c30.091,0,58.672,12.113,79.425,33.444c20.759-21.332,49.346-33.444,79.437-33.444c61.31,0,111.193,49.883,111.193,111.193
			c0,30.723-12.31,59.305-34.673,80.535c-0.328,0.382-0.627,0.686-0.847,0.901C227.6,331.045,205.195,355.002,204.98,355.229
			c-3.288,3.514-7.9,5.597-12.674,5.716L191.847,360.957z M111.199,32.23c-54.734,0-99.259,44.525-99.259,99.259
			c0,24.983,9.499,49.012,26.744,67.664c0.585,0.674,1.002,1.164,1.886,2.041l0.835,0.835
			C158.552,319.177,187.413,347.084,187.67,347.334c1.128,1.086,2.596,1.683,4.135,1.695l0.251-0.006
			c1.557-0.042,3.109-0.74,4.207-1.915c0.173-0.191,22.764-24.339,141.009-142.584l0.859-0.925
			c20.114-18.969,31.195-44.578,31.195-72.104c0-54.734-44.525-99.259-99.259-99.259c-28.862,0-56.166,12.477-74.914,34.238
			l-4.523,5.245l-4.523-5.251C167.365,44.707,140.066,32.23,111.199,32.23z" />
					</svg>

				</div>
			</div>
		</header>