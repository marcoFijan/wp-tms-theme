<section class="flex flex-col items-center text-center lg:min-h-208 mb-20 lg:mb-41 pt-header-offset lg:pt-header-offset-lg ">
	<div class="bg-dark-blue absolute z-0 top-0 left-0 w-full h-136 lg:h-208 lg:[clip-path:circle(6000px_at_50%_calc(100%-6000px))]">
		<canvas class="h-full w-full z-0 absolute left-0 top-0 gradient-canvas" style="
			--gradient-color-1: <?php echo esc_attr(get_field('gradient_color_1')); ?>;
			--gradient-color-2: <?php echo esc_attr(get_field('gradient_color_2')); ?>;
			--gradient-color-3: <?php echo esc_attr(get_field('gradient_color_3')); ?>;
			--gradient-color-4: <?php echo esc_attr(get_field('gradient_color_4')); ?>"></canvas>
		<img class="w-full h-full object-cover absolute top-0 left-0 z-20 opacity-5" src="<?php echo get_template_directory_uri(); ?>/assets/media/heroOverlay.jpg" />
		<div class="w-full h-full bg-blue opacity-60 z-30 absolute top-0 left-0"></div>
	</div>
	<article class="container px-6 w-full min-h-1/2 relative z-10 prose grid grid-cols-12 ">
		<div class="col-span-12 lg:col-span-8 lg:col-start-3 flex flex-col items-center">
			<?php
			$label = get_field('label');
			if ($label):
				get_template_part('components/label', null, ['variant' => 'light', 'title' => $label]);
			endif;

			$title = get_field('title');
			if ($title): ?>
				<h1 class="text-white text-center mb-18 text-4xl lg:text-5xl"><?php echo $title; ?></h1>
			<?php endif;

			$link = get_field('link');

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
			}

			?>
		</div>
		<div class="col-span-12 lg:col-span-10 lg:col-start-2 mt-12 w-full bg-blur/70 backdrop-blur-(--blur-lg) shadow-card-dark border border-white/33 rounded-xs lg:rounded-lg p-1 lg:p-3">
			<?= wp_get_attachment_image(get_field('img'), 'laying-10', "", array("class" => "w-full mt-0 mb-0 rounded-tiny lg:rounded-md aspect-video object-cover object-top")); ?>
		</div>
	</article>
</section>