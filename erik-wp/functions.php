<?php
function asdf_setup()
{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'asdf'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'asdf_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support('customize-selective-refresh-widgets');

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'asdf_setup');

function asdf_content_width()
{
	$GLOBALS['content_width'] = apply_filters('asdf_content_width', 640);
}
add_action('after_setup_theme', 'asdf_content_width', 0);

function asdf_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'asdf'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'asdf'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'asdf_widgets_init');

function asdf_scripts()
{
	wp_enqueue_style('asdf-style', get_stylesheet_uri(), array());

	wp_enqueue_script('asdf-navigation', get_template_directory_uri() . '/js/navigation.js', array(), true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'asdf_scripts');

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

/////////////////////////////////////////////////////////////////////////////////

if (is_front_page() && is_home()) {
	echo "asdfasdfad";
}
