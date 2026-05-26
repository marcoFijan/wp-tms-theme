<?php
get_header();
?>

<?php

// Determine queried object for ACF
if (is_archive()) {
	$queried_object = get_queried_object()->name . '_archive';
} else {
	$queried_object = get_queried_object();
}

// Loop through ACF flexible content
if (have_rows('flexible_nextup_content', $queried_object)) :
	while (have_rows('flexible_nextup_content', $queried_object)) : the_row();

		if (get_row_layout() == 'cat_featured') :
			get_template_part('templates/cat-featured');

		elseif (get_row_layout() == 'cat_img') :
			get_template_part('templates/cat-img');

		endif;

	endwhile;
endif;
?>

<?php
get_footer();
