<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bitter&family=Cutive&display=swap" rel="stylesheet">

	<?php wp_head();
	?>


</head>

<body <?php body_class(); ?>>

	<nav id="site-navigation" class="main-navigation">
		<?php esc_html_e('', 'asdf'); ?>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
	</nav>

	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<?php


				if (is_page()) {
					$page_logo = get_post_meta(get_the_ID(), 'page_logo', true);
					if ($page_logo) {
						$logo_url = wp_get_attachment_url($page_logo);
						echo '<img src="' . esc_url($logo_url) . '" alt="' . get_the_title() . '">';
					}
				}



				the_custom_logo();
				if (is_front_page() && is_home()) :
				?>
					<h1 class="site-title">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<?php bloginfo('name'); ?></a>
					</h1>
				<?php
				endif;
				$asdf_description = get_bloginfo('description', 'display');
				if ($asdf_description || is_customize_preview()) :
				?>
					<p class="site-description">
						<?php echo $asdf_description;
						?></p>
				<?php endif; ?>
			</div>

		</header>