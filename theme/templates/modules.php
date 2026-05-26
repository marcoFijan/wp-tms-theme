<section class="bg-white mt-30 mb-40 pt-20 lg:pt-30 rounded-t-xl lg:rounded-t-2xl shadow-t-section">
	<?php $has_link = get_sub_field('module_link'); ?>
	<div class="container prose grid grid-cols-12 gap-grid gap-y-4 lg:gap-y-6 mb-20">
		<div class="col-span-12 lg:col-span-10 lg:col-start-2">
			<?php
			$label = get_sub_field('label');
			if ($label): ?>
				<?php get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]); ?>
			<?php endif; ?>
		</div>
		<article class="col-span-12 lg:col-span-4 lg:col-start-2">
			<?php $txt_left = get_sub_field('txt_left');
			if ($txt_left): ?>
				<div class="prose">
					<?php the_sub_field('txt_left'); ?>
				</div>
			<?php endif; ?>
			<?php $link = get_sub_field('link_left');
			if ($link) :
				get_template_part(
					'components/button',
					null,
					[
						'variant' => 'dark-blue',
						'link' => $link,
						'target' => esc_attr($link['target'] ?: '_self'),
						'custom-class' => 'mt-11'
					]
				);
			?>
			<?php endif; ?>
		</article>
		<article class="col-span-12 lg:col-span-4 lg:col-start-8">
			<?php $txt_right = get_sub_field('txt_right');
			if ($txt_right): ?>
				<div class="prose">
					<?php the_sub_field('txt_right'); ?>
				</div>
			<?php endif;
			$link = get_sub_field('link_right');
			if ($link) :
				get_template_part(
					'components/button',
					null,
					[
						'variant' => 'dark-blue',
						'link' => $link,
						'target' => esc_attr($link['target'] ?: '_self'),
						'custom-class' => 'mt-11'
					]
				);
			?>
			<?php endif; ?>
		</article>
	</div>
	<?php if (have_rows('modules')) : ?>
		<section class="container mx-auto">
			<div class="grid grid-cols-12 gap-grid">
				<?php while (have_rows('modules')) : the_row();
					$icon = get_sub_field('icon');
					$text = get_sub_field('txt');
					$link = get_sub_field('link'); // link array if true
				?>

					<?php
					// Determine wrapper tag
					if ($has_link && $link && !empty($link['url'])) :
						$tag = 'a';
						$href = esc_url($link['url']);
						$target = $link['target'] ? esc_attr($link['target']) : '_self';
						$rel = $target === '_blank' ? 'noopener noreferrer' : '';
						$link_classes = 'items-center justify-center text-center text-black hover:text-white group';
					else :
						$tag = 'div';
						$href = '';
						$target = '';
						$rel = '';
						$link_classes = 'pointer-events-none';
					endif;
					?>

					<<?php echo $tag; ?>
						<?php if ($href) : ?> href="<?php echo $href; ?>" <?php endif; ?>
						<?php if ($target) : ?> target="<?php echo $target; ?>" <?php endif; ?>
						<?php if ($rel) : ?> rel="<?php echo $rel; ?>" <?php endif; ?>
						class="col-span-12 lg:col-span-4 h-full relative overflow-hidden rounded-md p-8 lg:p-14 shadow-card transition flex flex-col <?php echo $link_classes ?>">

						<?php if ($has_link) : ?>
							<div class="absolute z-0 top-0 left-0 w-full h-full">
								<canvas class="gradient-canvas h-full w-full z-0 relative left-0 top-0" style="--gradient-color-1: <?php echo esc_attr(get_sub_field('gradient_color_1')); ?>;	--gradient-color-2: <?php echo esc_attr(get_sub_field('gradient_color_2')); ?>; --gradient-color-3: <?php echo esc_attr(get_sub_field('gradient_color_3')); ?>;	--gradient-color-4: <?php echo esc_attr(get_sub_field('gradient_color_4')); ?>"></canvas>
								<img class="w-full h-full object-cover absolute top-0 left-0 z-20 opacity-0 transition-all ease-in-out group-hover:opacity-5" src="<?php echo get_template_directory_uri(); ?>/assets/media/heroOverlay.jpg" />
								<div class="w-full h-full group-hover:bg-blue group-hover:opacity-0 z-0 absolute top-0 left-0 opacity-100 bg-white transition-all duration-500 ease-in-out"></div>
							</div>
						<?php endif; ?>

						<?php if ($icon) : ?>
							<div class="w-12 lg:w-18 h-12 lg:h-18 relative z-20 group-hover:bg-white/20 group-hover:text-white mb-9 flex justify-center items-center rounded-full bg-light-grey text-blue">
								<span class="font-icons-filled text-2xl font-medium"><?php echo esc_attr($icon); ?></span>
							</div>
						<?php endif; ?>

						<?php if ($text) : ?>
							<div class="prose relative z-10 group-hover:text-white">
								<?php echo wp_kses_post($text); ?>
							</div>
						<?php endif; ?>

						<?php if ($has_link && $link) : ?>
							<span class="flex items-center relative z-10 mt-11 group-hover:text-white gap-2 font-normal">
								<span><?php echo $link['title'] ?></span>
								<span class="font-icons-filled group-hover:-rotate-45 transition-transform duration-300">arrow_right_alt</span>
							</span>

						<?php endif; ?>
					</<?php echo $tag; ?>>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; ?>

</section>