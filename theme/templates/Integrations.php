<section class="container grid grid-cols-12 gap-6 my-30 xl:my-35 overflow-x-hidden ">
	<div class="col-span-12 xl:col-span-10 xl:col-start-2 overflow-hidden relative rounded-lg xl:rounded-xl pt-16 grid grid-cols-12 xl:grid-cols-10 gap-6">
		<div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-8 lg:col-start-3 xl:col-span-4 xl:col-start-2 px-7 xl:px-0 order-2 xl:order-1 flex items-bottom">
			<?php
			$img = get_sub_field('img');
			if ($img): ?>
				<img class="w-full h-auto relative z-10" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
			<?php elseif (have_rows('blocks')) : ?>
				<div class="relative z-10 mt-auto aspect-square w-full">
					<div class="absolute top-0 left-0 w-full h-full grid grid-cols-3 gap-2 xl:gap-3">
						<?php while (have_rows('blocks')) :
							the_row();
							$counter = get_row_index();
							$block_img = get_sub_field('block_img');
							$block_txt = get_sub_field('block_txt');

							$translate_classes = ($counter % 3 === 2) ? '-translate-y-8' : 'translate-y-8';

						?>
							<div class="<?php echo $translate_classes; ?> col-span-1 flex flex-col items-center xl:p-6 p-2 justify-center relative bg-white/20 rounded-sm xl:rounded-md aspect-square">
								<?php if ($block_img): ?>
									<img class=" object-contain max-h-2/5 max-w-3/4" src="<?php echo esc_url($block_img['url']); ?>" alt="<?php echo esc_attr($block_img['alt']); ?>" />
								<?php endif; ?>
								<?php if ($block_txt): ?>
									<p class="text-center w-full absolute bottom-0 left-0 p-2 xl:p-4 text-tiny text-white"><?php echo esc_html($block_txt); ?></p>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
						<div class="translate-y-8 col-span-1 flex flex-col items-center p-6 justify-center relative bg-white/20 xl:rounded-md rounded-sm aspect-square"></div>
						<div class="-translate-y-8 col-span-1 flex flex-col items-center p-6 justify-center relative bg-white/20 xl:rounded-md rounded-sm aspect-square"></div>
						<div class="translate-y-8 col-span-1 flex flex-col items-center p-6 justify-center relative bg-white/20 xl:rounded-md rounded-sm aspect-square"></div>
					</div>
				</div>
			<?php endif; ?>

		</div>
		<article class="col-span-12 xl:col-span-3 xl:col-start-7 mb-14 px-7 xl:mb-22 xl:mt-4 xl:px-0 text-center xl:text-left relative z-10 flex items-center flex-col xl:block xl:items-start order-1 xl:order-2 prose prose-white">
			<div class="mb-14 text-white prose prose-white flex flex-col justify-center items-center xl:items-start xl:justify-start">
				<?php
				$label = get_sub_field('label');
				if ($label):
					get_template_part('components/label', null, ['variant' => 'light', 'title' => $label]);
				endif;

				$txt = get_sub_field('txt');
				if ($txt): ?>
					<?php the_sub_field("txt"); ?>
				<?php endif; ?>
			</div>

			<?php
			$link = get_sub_field('link');
			if ($link) :
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
			endif;

			if ($link_url && $link_title) :
				get_template_part('components/button', null, ['variant' => 'white', 'link' => $link, 'target' => esc_attr($link_target)]);
			endif;
			?>
		</article>
		<div class="bg-red absolute z-0 top-0 left-0 w-full h-full rounded-lg xl:rounded-xl overflow-hidden	">
			<canvas class="h-full w-full z-0 absolute left-0 top-0 gradient-canvas" style="
			--gradient-color-1: <?php echo esc_attr(get_sub_field('gradient_color_1')); ?>;
			--gradient-color-2: <?php echo esc_attr(get_sub_field('gradient_color_2')); ?>;
			--gradient-color-3: <?php echo esc_attr(get_sub_field('gradient_color_3')); ?>;
			--gradient-color-4: <?php echo esc_attr(get_sub_field('gradient_color_4')); ?>"></canvas>
			<img class="w-full h-full object-cover absolute top-0 left-0 z-20 opacity-5" src="<?php echo get_template_directory_uri(); ?>/assets/media/heroOverlay.jpg" />
		</div>
	</div>

</section>