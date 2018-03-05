<?php

function wordpressify_resources() {
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_script('header_js', get_template_directory_uri() . '/js/header-bundle.js', null, 1.0, false);
	wp_enqueue_script('footer_js', get_template_directory_uri() . '/js/footer-bundle.js', null, 1.0, true);
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', null, 1.0, true);
}

add_action('wp_enqueue_scripts', 'wordpressify_resources');

// Customize excerpt word count length
function custom_excerpt_length() {
	return 22;
}

function wpdocs_dequeue_script() {
    wp_dequeue_script( 'jquery' );
}
add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );

add_filter('excerpt_length', 'custom_excerpt_length');

// Theme setup
function wordpressify_setup() {
	// Handle Titles
	add_theme_support( 'title-tag' );

	// Add featured image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 720, 720, true);
	add_image_size('square-thumbnail', 80, 80, true);
	add_image_size('banner-image', 1024, 1024, true);
}

add_action('after_setup_theme', 'wordpressify_setup');

show_admin_bar(false);

// Checks if there are any posts in the results
function is_search_has_results() {
	return 0 != $GLOBALS['wp_query']->found_posts;
}

// Add Widget Areas
function wordpressify_widgets() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}

add_action('widgets_init', 'wordpressify_widgets');

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
    $classes[] = "nav-item";

    return $classes;
}

add_filter( 'nav_menu_link_attributes', 'filter_function_name_1520', 10, 4 );
function filter_function_name_1520( $atts, $item, $args, $depth ){

    $atts['class'] = "nav-link";

    return $atts;
}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Настройки темы',
        'menu_title'	=> 'Настройки темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Header настройки',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Footer настройки',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

}

add_action('init', 'register_post_types');
function register_post_types(){
    register_post_type('plants', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Растения', // основное название для типа записи
            'singular_name'      => 'Растения', // название для одной записи этого типа
            'add_new'            => 'Добавить', // для добавления новой записи
            'add_new_item'       => 'Добавление', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование', // для редактирования типа записи
            'new_item'           => 'Новое', // текст новой записи
            'view_item'          => 'Смотреть', // для просмотра записи этого типа.
            'search_items'       => 'Искать', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Растения', // название меню
        ),
        'description'         => '',
        'public'              => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-carrot',
        'hierarchical'        => false,
        'supports'            => array('title','editor','page-attributes','post-formats','thumbnail'),
    ) );

    register_post_type('works', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Работы', // основное название для типа записи
            'singular_name'      => 'Работы', // название для одной записи этого типа
            'add_new'            => 'Добавить', // для добавления новой записи
            'add_new_item'       => 'Добавление', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование', // для редактирования типа записи
            'new_item'           => 'Новое', // текст новой записи
            'view_item'          => 'Смотреть', // для просмотра записи этого типа.
            'search_items'       => 'Искать', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Работы', // название меню
        ),
        'description'         => '',
        'public'              => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-media-text',
        'hierarchical'        => false,
        'supports'            => array('title','editor','page-attributes','post-formats','thumbnail'),
    ) );

    register_post_type('type_works', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Тип Работ', // основное название для типа записи
            'singular_name'      => 'Тип Работ', // название для одной записи этого типа
            'add_new'            => 'Добавить', // для добавления новой записи
            'add_new_item'       => 'Добавление', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование', // для редактирования типа записи
            'new_item'           => 'Новое', // текст новой записи
            'view_item'          => 'Смотреть', // для просмотра записи этого типа.
            'search_items'       => 'Искать', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Тип Работ', // название меню
        ),
        'description'         => '',
        'public'              => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-media-text',
        'hierarchical'        => false,
        'supports'            => array('title','editor','page-attributes','post-formats','thumbnail'),
    ) );
}