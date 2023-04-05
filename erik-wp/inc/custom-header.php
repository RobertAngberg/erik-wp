<?php

// custom header image: <?php the_header_image_tag();

function asdf_custom_header_setup()
{
	add_theme_support(
		'custom-header',
		apply_filters(
			'asdf_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'asdf_header_style',
			)
		)
	);
}
add_action('after_setup_theme', 'asdf_custom_header_setup');

if (!function_exists('asdf_header_style')) :

	function asdf_header_style()
	{
		$header_text_color = get_header_textcolor();

		if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
			return;
		}

?>
		<style type="text/css">
			<?php
			if (!display_header_text()) :
			?>.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php endif; ?>
		</style>
<?php
	}
endif;
