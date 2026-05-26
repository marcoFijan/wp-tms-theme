<?php $term = get_queried_object(); // Current taxonomy term
?>

<section class="flex flex-col mb-20 pb-20 pt-header-offset lg:pt-header-offset-lg relative">
	<div class="bg-dark-blue absolute z-0 top-0 left-0 w-full h-full">
		<canvas class="h-full w-full z-0 absolute left-0 top-0 gradient-canvas" style="
			--gradient-color-1: <?php echo esc_attr(get_field('gradient_color_1', $term)); ?>;
			--gradient-color-2: <?php echo esc_attr(get_field('gradient_color_2', $term)); ?>;
			--gradient-color-3: <?php echo esc_attr(get_field('gradient_color_3', $term)); ?>;
			--gradient-color-4: <?php echo esc_attr(get_field('gradient_color_4', $term)); ?>"></canvas>
		<img class="w-full h-full object-cover absolute top-0 left-0 z-20 opacity-5" src="<?php echo get_template_directory_uri(); ?>/assets/media/heroOverlay.jpg" />
		<div class="w-full h-full bg-blue opacity-60 z-30 absolute top-0 left-0"></div>
	</div>
	<article class="container px-6 w-full min-h-1/2 relative z-10 prose grid grid-cols-12 gap-grid pt-16">

		<div class="col-span-12 lg:col-span-4 lg:col-start-2 prose prose-white text-white">
			<?php $txt_left = get_field('txt_left', $term);
			if ($txt_left): ?>
				<?php the_field("txt_left", $term); ?>
			<?php endif;

			$show_breadcumbs = get_field('breadcrumbs');
			if ($show_breadcumbs) :
				get_template_part('components/breadcrumbs', null, []);
			endif; ?>

		</div>
		<div class="col-span-12 lg:col-span-5 lg:col-start-7 prose prose-white text-white flex flex-col">
			<?php $txt_categories = get_field('txt_cat', $term);
			if ($txt_categories): ?>
				<p class="text-md font-bold m-0 p-0"><?php the_field("txt_cat", $term); ?></p>
			<?php endif; ?>

			<?php
			// Get the post type(s) associated with this taxonomy
			$taxonomy_obj = get_taxonomy($term->taxonomy);
			$post_types = $taxonomy_obj->object_type;

			// Get the current page number for pagination
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			// Query posts for the current taxonomy term
			$args = array(
				'post_type' => $post_types, // Use the correct post type(s)
				'tax_query' => array(
					array(
						'taxonomy' => $term->taxonomy,
						'field'    => 'term_id',
						'terms'    => $term->term_id,
					),
				),
				'posts_per_page' => get_option('posts_per_page'),
				'paged' => $paged,
			);

			$category_query = new WP_Query($args);

			if ($category_query->have_posts()) : ?>
				<ul class="flex flex-wrap gap-x-4 gap-y-2 list-none m-0 p-0 mt-6">
					<?php while ($category_query->have_posts()) : $category_query->the_post(); ?>
						<li class="m-0 p-0">
							<?php get_template_part(
								'components/button',
								null,
								[
									'variant' => 'white',
									'url'     => get_permalink(),
									'title'   => get_the_title(),
								]
							); ?>
						</li>
					<?php endwhile; ?>
				</ul>
				<?php
				// Pagination with custom query
				echo paginate_links(array(
					'total' => $category_query->max_num_pages,
					'current' => $paged,
				));
				?>
			<?php else : ?>
				<p>Geen content gevonden.</p>
			<?php endif;

			// Reset post data
			wp_reset_postdata();
			?>

			<?php $link = get_field('link', $term);
			if (!empty($link['url']) && !empty($link['title'])) {
				get_template_part(
					'components/button',
					null,
					[
						'variant' => 'white',
						'link' => $link,
						'target' => esc_attr($link['target'] ?: '_self')
					]
				);
			}	?>
		</div>
	</article>
</section>