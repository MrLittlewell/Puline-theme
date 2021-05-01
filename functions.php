<?php
function puline_scripts_styles(){

  // Регистрирую стили
  wp_register_style( 'my_style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.2', 'screen');
  wp_register_style( 'swiper_css', get_template_directory_uri() . '/assets/css/swiper.css', array(), '1.0', 'screen');

  // Подключаю стили
  wp_enqueue_style( 'my_style');
  wp_enqueue_style( 'swiper_css');

  // Подключаем файл с JS скриптом
  wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/assets/js/jquery.js', array(), '1.0', true);
  wp_enqueue_script( 'swiper_js', get_template_directory_uri() . '/assets/js/swiper.js', array(), '1.0', true);
  wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}

add_action( 'wp_enqueue_scripts', 'puline_scripts_styles', 1 );

if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}

add_action( 'after_setup_theme', function(){

  
	register_nav_menus( [
		'header_menu' => 'Меню в шапке',
		'footer_menu' => 'Меню в подвале'
	] );

  add_theme_support(
    'custom-logo',
    array(
      'height'      => 240,
      'width'       => 500,
      'flex-height' => true,
    )
  );
} );
