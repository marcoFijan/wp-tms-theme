<?php
function register_cpt()
{
	register_post_type('posttype', [
		'labels' => ['name' => '[Post types]', 'singular_name' => 'Post type', 'add_new' => 'Nieuwe [Post type] toevoegen'],
		'public' => true,
		'show_ui' => true,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => ['title', 'author', 'thumbnail', 'revisions'],
		'taxonomies' => ['taxonomy'],
		'has_archive' => true,
		'rewrite' => ['with_front' => false],
		'delete_with_user' => false,
		//  'acfe_admin_archive' => true,

	]);

	register_taxonomy('taxonomy', ['posttype'], [
		'labels' => ['name' => '[Taxonomies]', 'singular_name' => '[Taxonomy]', 'add_new_item' => 'Nieuwe [Taxonomy] toevoegen'],
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'meta_box_cb' => false,
		'rewrite' => ['with_front' => false],
	]);
}

// add_action('init', 'register_cpt');