<?php
function puline_scripts_styles(){
  wp_register_style( 'swiper_css', get_template_directory_uri() . '/assets/css/swiper.css', array(), '1.0', 'screen');
  wp_register_style( 'lightgallery', get_template_directory_uri() . '/assets/css/lightGallery.css', array(), '1.0', 'screen');
  wp_register_style( 'niceSelect', get_template_directory_uri() . '/assets/css/nice-select.css', array(), '1.0', 'screen');
  wp_register_style( 'my_style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.2', 'screen');
  
  wp_enqueue_style( 'swiper_css');
  wp_enqueue_style( 'lightgallery');
  wp_enqueue_style( 'niceSelect');
  wp_enqueue_style( 'my_style');

  wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/assets/js/jquery.js', array(), '1.0', true);
  wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), '1.0', true);
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

add_action('init', 'create_taxonomy');
function create_taxonomy () {
    register_taxonomy( 'category', [ 'products' ], [
        'label'                 => __( 'category' ),
        'rewrite'               => [ 'slug' => 'category' ],
        'labels'                => [
            'name'              => 'Категории',
            'singular_name'     => 'Категории',
            'search_items'      => 'найти категорию',
            'all_items'         => 'Все категории',
            'view_item '        => 'Смотреть категорию',
            'parent_item'       => 'Родитель категории',
            'parent_item_colon' => 'Родитель категории:',
            'edit_item'         => 'Редактировать категорию',
            'update_item'       => 'Обновить категорию',
            'add_new_item'      => 'Добавить новую категорию',
            'new_item_name'     => 'Добавить новую категорию',
            'menu_name'         => 'Категории',
        ],
        'public'                => true,
        'hierarchical'          => true,
        'capabilities'          => [],
        'meta_box_cb'           => null,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'show_ui'               => true,
        'publicly_queryable'    => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
    ] );

    register_taxonomy( 'coatings', [ 'products' ], [
        'label'                 => __( 'coatings' ),
        'rewrite'               => [ 'slug' => 'coatings' ],
        'labels'                => [
            'name'              => 'Покрытии',
            'singular_name'     => 'Покрытии',
            'search_items'      => 'Найти покрытие',
            'all_items'         => 'Все покрытии',
            'view_item '        => 'Смотреть покрытие',
            'parent_item'       => 'Родитель покрытия',
            'parent_item_colon' => 'Родитель покрытия:',
            'edit_item'         => 'Редактировать покрытие',
            'update_item'       => 'Обновить покрытие',
            'add_new_item'      => 'Добавить новое покрытие',
            'new_item_name'     => 'Добавить новое покрытие',
            'menu_name'         => 'Покрытии',
        ],
        'public'                => true,
        'hierarchical'          => true,
        'capabilities'          => [],
        'meta_box_cb'           => null,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'show_ui'               => true,
        'publicly_queryable'    => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
    ] );
}
function custom_register_post_types() {

    $post_types = [
        [
            "post_type_name"        => "products",
            "name"                  => "Товар",
            "name_plural"           => "Товары",
            "name_lowercase"        => "Товар",
            "name_lowercase_plural" => "Товар",
            'menu_icon'             => 'dashicons-businessman',
            "supports"              => [
                'title',
                'editor',
                'thumbnail',
                'author',
                'excerpt',
                'revisions',
                'post_formats'
            ],
            "has_archive"           => false,
            "taxonomies"            => [
                'categories',
                'coatings',
            ]
        ],
        [
            "post_type_name"        => "material",
            "name"                  => "Материал",
            "name_plural"           => "Материалы",
            "name_lowercase"        => "Материал",
            "name_lowercase_plural" => "Материал",
            'menu_icon'             => 'dashicons-businessman',
            "supports"              => [
                'title',
                'editor',
                'thumbnail',
                'author',
                'excerpt',
                'revisions',
                'post_formats'
            ],
            "has_archive"           => false,
        ],
    ];






    foreach ( $post_types as $post_type ) {
        $post_type_args = [
            'labels'        => [
                'name'                     => ( $post_type["name_plural"] ),
                'singular_name'            => ( $post_type["name"] ),
                'add_new'                  => ( 'Добавить новый ' . $post_type["name"] ),
                'add_new_item'             => ( 'Добавить новый ' . $post_type["name"] ),
                'edit_item'                => ( 'Редактировать ' . $post_type["name"] ),
                'new_item'                 => ( 'Новое ' . $post_type["name"] ),
                'view_item'                => ( 'Смотреть ' . $post_type["name"] ),
                'view_items'               => ( 'Смотреть ' . $post_type["name_plural"] ),
                'search_items'             => ( 'Искать ' . $post_type["name_plural"] ),
                'not_found'                => ( 'Не найдено ' . $post_type["name_lowercase_plural"] . ' found' ),
                'not_found_in_trash'       => ( 'Не найдено ' . $post_type["name_lowercase_plural"] . ' found in Trash' ),
                'all_items'                => ( 'Все ' . $post_type["name_plural"] ),
                'archives'                 => ( $post_type["name"] . ' Archives' ),
                'attributes'               => ( $post_type["name"] . ' Attributes' ),
                'insert_into_item'         => ( 'Insert into ' . $post_type["name_lowercase"] ),
                'uploaded_to_this_item'    => ( 'Uploaded to this ' . $post_type["name_lowercase"] ),
                'item_published '          => ( $post_type["name"] . ' published.' ),
                'item_published_privately' => ( $post_type["name"] . ' published privately.' ),
                'item_reverted_to_draft'   => ( $post_type["name"] . ' reverted to draft.' ),
                'item_scheduled'           => ( $post_type["name"] . ' scheduled.' ),
                'item_updated'             => ( $post_type["name"] . ' updated.' ),
            ],
            'menu_icon'     => $post_type['menu_icon'],
            'public'        => true,
            'has_archive'   => $post_type["has_archive"],
            'menu_position' => 5,
            'show_in_rest'  => true,
            'supports'      => $post_type["supports"],
            'taxonomies'    => $post_type["taxonomies"] ?? [],

        ];

        register_post_type( $post_type["post_type_name"], $post_type_args );
    }
}
add_action('init', 'custom_register_post_types');

function build_custom_category_tree ($activeCatId, $activeParentId, $parentId = 0) {

    $output = '';
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => true,
        'hierarchical' => true,
        'parent' => $parentId
    ) );

    if (count($terms)) {

        $output .= '<ul>';

        foreach ($terms as $term) {
            $output .= '<li class="custom-cat' . ($term->term_id === $activeParentId || $term->term_id === $activeCatId ? ' active' : '') . '">';
            $output .=  '<a href="' . $term->slug . '">' . $term->name . '</a>';
            $output .=  build_custom_category_tree($activeCatId, $activeParentId, $term->term_id);
            $output .= '</li>';
        }

        $output .= '</ul>';
    }

    return $output;
}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'   => 'Theme General Settings',
        'menu_title'  => 'Глобальные настройки',
        'menu_slug'   => 'theme-general-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));

}

add_theme_support( 'editor-styles');

