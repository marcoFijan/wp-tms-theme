<?php
// Get the post type for the current archive
$post_type = get_post_type();
$archive_id = $post_type . '_archive'; // e.g., 'product_archive'
?>

<section class="flex flex-col mb-20 pb-20 pt-header-offset lg:pt-header-offset-lg relative">
	<div class="bg-dark-blue absolute z-0 top-0 left-0 w-full h-full">
		<canvas class="h-full w-full z-0 absolute left-0 top-0 gradient-canvas" style="
			--gradient-color-1: <?php echo esc_attr(get_field('gradient_color_1', $archive_id)); ?>;
			--gradient-color-2: <?php echo esc_attr(get_field('gradient_color_2', $archive_id)); ?>;
			--gradient-color-3: <?php echo esc_attr(get_field('gradient_color_3', $archive_id)); ?>;
			--gradient-color-4: <?php echo esc_attr(get_field('gradient_color_4', $archive_id)); ?>"></canvas>
		<img class="w-full h-full object-cover absolute top-0 left-0 z-20 opacity-5" src="<?php echo get_template_directory_uri(); ?>/assets/media/heroOverlay.jpg" />
		<div class="w-full h-full bg-blue opacity-60 z-30 absolute top-0 left-0"></div>
	</div>
	<article class="container px-6 w-full min-h-1/2 relative z-10 prose grid grid-cols-12 gap-grid pt-16">
		<div class="col-span-12 lg:col-span-4 lg:col-start-2 prose prose-white text-white">
			<?php $txt_left = get_field('txt_left', $archive_id);
			if ($txt_left): ?>
				<?php echo $txt_left; ?>
			<?php endif;

			$show_breadcumbs = get_field('breadcrumbs', $archive_id);
			if ($show_breadcumbs) :
				get_template_part('components/breadcrumbs', null, []);
			endif; ?>
		</div>
		<div class="col-span-12 lg:col-span-5 lg:col-start-7 prose prose-white text-white flex flex-col gap-y-9">
			<?php $txt_right = get_field('txt_right', $archive_id);
			if ($txt_right): ?>
				<?php echo $txt_right; ?>
			<?php endif; ?>

			<?php $link = get_field('link', $archive_id);
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