<section class="bg-white mt-30 mb-40 pt-20 lg:pt-30 rounded-t-xl lg:rounded-t-2xl shadow-t-section">
	<?php $category = get_sub_field('category'); ?>
	<div class="container prose grid grid-cols-12 gap-grid gap-y-4 lg:gap-y-6 mb-20">
		<div class="col-span-12 lg:col-span-10 lg:col-start-2">
			<?php if ($category): ?>
				<?php get_template_part('components/label', null, [
					'variant' => 'dark',
					'title' => esc_html($category->name)
				]); ?>
			<?php endif; ?>
		</div>

		<article class="col-span-12 lg:col-span-4 lg:col-start-2">
			<?php $txt_left = get_sub_field('txt_left'); ?>
			<?php if ($txt_left): ?>
				<div class="prose">
					<?php echo wp_kses_post($txt_left); ?>
				</div>
			<?php endif; ?>

			<?php if ($category):
				$taxonomy_link = get_term_link($category);
				$taxonomy_name = $category->name;
				get_template_part('components/button', null, [
					'variant' => 'dark-blue',
					'link' => $taxonomy_link,
					'title' => 'Bekijk alle ' . esc_html($taxonomy_name),
					'custom-class' => 'mt-8'
				]);
			endif; ?>
		</article>

		<article class="col-span-12 lg:col-span-4 lg:col-start-8">
			<?php $txt_right = get_sub_field('txt_right'); ?>
			<?php if ($txt_right): ?>
				<div class="prose">
					<?php echo wp_kses_post($txt_right); ?>
				</div>
			<?php endif; ?>
		</article>
	</div>

	<?php if (have_rows('subcategories')): ?>
		<section class="container mx-auto">
			<div class="grid grid-cols-12 gap-grid">
				<?php while (have_rows('subcategories')): the_row();
					$subcategory_post = get_sub_field('posts'); // Use a different variable name

					// Skip if no post selected
					if (!$subcategory_post) continue;

					$icon = get_sub_field('icon');
					$text = get_sub_field('txt');
					$link_txt = get_sub_field('link_txt');
					$gradient_colors = [
						get_sub_field('gradient_color_1'),
						get_sub_field('gradient_color_2'),
						get_sub_field('gradient_color_3'),
						get_sub_field('gradient_color_4')
					];
				?>

					<a href="<?php echo esc_url(get_permalink($subcategory_post->ID)); ?>" target="_self"
						class="col-span-12 lg:col-span-4 h-full relative overflow-hidden rounded-md p-8 lg:p-14 shadow-card transition flex flex-col items-center justify-center text-center text-black hover:text-white group">

						<?php if ($icon): ?>
							<div class="w-12 lg:w-18 h-12 lg:h-18 relative z-20 group-hover:bg-white/20 group-hover:text-white mb-9 flex justify-center items-center rounded-full bg-light-grey text-blue">
								<span class="font-icons-filled text-2xl font-medium"><?php echo esc_html($icon); ?></span>
							</div>
						<?php endif; ?>

						<!-- Post title above text -->
						<span class="text-lg font-semibold relative z-10 group-hover:text-white mb-3">
							<?php echo esc_html(get_the_title($subcategory_post->ID)); ?>
						</span>

						<?php if ($text): ?>
							<div class="prose relative z-10 group-hover:text-white mb-3">
								<?php echo wp_kses_post($text); ?>
							</div>
						<?php endif; ?>

						<?php if ($link_txt): ?>
							<span class="flex items-center relative z-10 mt-2 group-hover:text-white gap-2 font-normal">
								<span><?php echo esc_html($link_txt); ?></span>
								<span class="font-icons-filled group-hover:-rotate-45 transition-transform duration-300">arrow_right_alt</span>
							</span>
						<?php endif; ?>

						<div class="absolute z-0 top-0 left-0 w-full h-full">
							<canvas class="gradient-canvas h-full w-full z-0 relative left-0 top-0" style="--gradient-color-1: <?php echo esc_attr(get_sub_field('gradient_color_1')); ?>;	--gradient-color-2: <?php echo esc_attr(get_sub_field('gradient_color_2')); ?>; --gradient-color-3: <?php echo esc_attr(get_sub_field('gradient_color_3')); ?>;	--gradient-color-4: <?php echo esc_attr(get_sub_field('gradient_color_4')); ?>"></canvas>
							<img class="w-full h-full object-cover absolute top-0 left-0 z-20 opacity-0 transition-all ease-in-out group-hover:opacity-5" src="<?php echo get_template_directory_uri(); ?>/assets/media/heroOverlay.jpg" />
							<div class="w-full h-full group-hover:bg-blue group-hover:opacity-0 z-0 absolute top-0 left-0 opacity-100 bg-white transition-all duration-500 ease-in-out"></div>
						</div>

					</a>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; ?>


</section>