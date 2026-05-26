<!DOCTYPE HTML>
<html <?php language_attributes('scroll-smooth'); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class('antialiased'); ?>>

	<ul class="sr-only">
		<li><a href="#nav" class="sr-only focus:not-sr-only"><?php _e('Naar navigatie', 'linc'); ?></a></li>
		<li><a href="#content" class="sr-only focus:not-sr-only"><?php _e('Naar hoofdinhoud', 'linc'); ?></a></li>
		<li><a href="#footer" class="sr-only focus:not-sr-only"><?php _e('Naar footer', 'linc'); ?></a></li>
	</ul>

	<header class="w-full absolute top-0 left-0 z-50" role="banner">
		<?php get_template_part('components/nav'); ?>
	</header>

	<?php
	// if (is_archive() && !is_tax('category_post')) {
	// $queried_object = get_queried_object()->name . '_archive';
	// } elseif (is_home() || is_tax('category_post')) {
	// $queried_object = get_option('page_for_posts');
	// } elseif (is_404()) {
	// $queried_object = 'options_404';
	// } else {
	// $queried_object = get_queried_object();
	// }

	?>

	<main class="">
		<?php
		if (is_front_page()) {
			// Homepage hero
			get_template_part('templates/hero-home');
		} elseif (is_page_template('template-contactpage.php')) {
			// Hero for contact page
			get_template_part('templates/hero-contact');
		} elseif (is_post_type_archive('nextup_tms') || is_page('nextup-tms-archive')) {
			// Landing page hero for the archive itself
			get_template_part('templates/hero-landingpage');
		} elseif (is_tax('nextup_tms_category')) {
			// Hero for individual Nextup TMS category pages
			get_template_part('templates/hero-nextup');
		} elseif (is_singular('news')) {
			// Hero for single news pages
			get_template_part('templates/hero-newspage');
		} else {
			// Default landing page hero
			get_template_part('templates/hero-landingpage');
		}
