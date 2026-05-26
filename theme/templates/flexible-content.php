<?php
// Default: current post
$acf_context = get_queried_object();

// If we are on a taxonomy archive, use the term object
if (is_tax('nextup_tms_category')) {
	$term = get_queried_object();
	$acf_context = $term->taxonomy . '_' . $term->term_id; // ACF expects 'taxonomy_term_{ID}'
}

// Now use $acf_context in have_rows()
if (have_rows('flexible_content', $acf_context)) :
	while (have_rows('flexible_content', $acf_context)) : the_row();

		$layout = get_row_layout();

		switch ($layout) {
			case 'txt_cat':
				get_template_part('templates/txt-categories', null, ['context' => $acf_context]);
				break;
			case 'numbers':
				get_template_part('templates/numbers', null, ['context' => $acf_context]);
				break;
			case 'integrations':
				get_template_part('templates/integrations', null, ['context' => $acf_context]);
				break;
			case 'partners':
				get_template_part('templates/partners', null, ['context' => $acf_context]);
				break;
			case 'usps':
				get_template_part('templates/usps', null, ['context' => $acf_context]);
				break;
			case 'successtories':
				get_template_part('templates/successtories', null, ['context' => $acf_context]);
				break;
			case 'img_support':
				get_template_part('templates/img-support', null, ['context' => $acf_context]);
				break;
			case 'news':
				get_template_part('templates/news', null, ['context' => $acf_context]);
				break;
			case 'txt_img':
				get_template_part('templates/txt-img', null, ['context' => $acf_context]);
				break;
			case 'call_to_action':
				get_template_part('templates/call-to-action', null, ['context' => $acf_context]);
				break;
			case 'img_txt_txt':
				get_template_part('templates/img-txt-txt', null, ['context' => $acf_context]);
				break;
			case 'txt_txt':
				get_template_part('templates/txt-txt', null, ['context' => $acf_context]);
				break;
			case 'txt':
				get_template_part('templates/txt', null, ['context' => $acf_context]);
				break;
			case 'txt_txt_txt':
				get_template_part('templates/txt_txt_txt', null, ['context' => $acf_context]);
				break;
			case 'modules':
				get_template_part('templates/modules', null, ['context' => $acf_context]);
				break;
			case 'faq':
				get_template_part('templates/faq', null, ['context' => $acf_context]);
				break;
			case 'slider':
				get_template_part('templates/slider', null, ['context' => $acf_context]);
				break;
			case 'quote':
				get_template_part('templates/quote', null, ['context' => $acf_context]);
				break;
			case 'img_img':
				get_template_part('templates/img-img', null, ['context' => $acf_context]);
				break;
			case 'contact':
				get_template_part('templates/contact', null, ['context' => $acf_context]);
				break;
			case 'txt_tabs':
				get_template_part('templates/txt-tabs', null, ['context' => $acf_context]);
				break;
			case 'helpcenter':
				get_template_part('templates/helpcenter', null, ['context' => $acf_context]);
				break;
			case 'card_card':
				get_template_part('templates/card-card', null, ['context' => $acf_context]);
		}

	endwhile;
endif;
