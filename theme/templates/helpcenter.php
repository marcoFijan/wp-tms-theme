<section class="bg-white mt-30 mb-40 pt-20 lg:pt-30 rounded-t-xl lg:rounded-t-2xl shadow-t-section">
	<div class="container prose grid grid-cols-12 gap-grid gap-y-4 lg:gap-y-6 mb-20">
		<?php $label = get_sub_field('label'); ?>
		<?php if ($label): ?>
			<div class="col-span-12 lg:col-span-10 lg:col-start-2">
				<?php get_template_part('components/label', null, [
					'variant' => 'dark',
					'title'   => esc_html($label)
				]); ?>
			</div>
		<?php endif; ?>

		<!-- Left column -->
		<article class="col-span-12 lg:col-span-4 lg:col-start-2">
			<?php $txt = get_sub_field('txt'); ?>
			<?php if ($txt): ?>
				<div class="prose">
					<?php echo wp_kses_post($txt); ?>
				</div>
			<?php endif; ?>
		</article>

		<!-- Right column (contact) -->
		<div class="col-span-12 lg:col-span-4 lg:col-start-8 lg:justify-self-end">
			<div class="h-max max-h-max w-max rounded-sm py-4 px-6 lg:!ml-auto bg-white shadow-card flex items-center gap-4 justify-between">
				<div class="w-8 h-8 lg:w-12 lg:h-12 flex items-center justify-center bg-light-grey rounded-full text-dark-blue fill-dark-blue">
					<?php $icon = get_sub_field('icon'); ?>
					<?php if ($icon): ?>
						<span class="font-icons-filled text-dark-blue text-2xl"><?= esc_html($icon); ?></span>
					<?php endif; ?>
				</div>

				<div class="prose prose-gradient_link prose-purple prose-small text-xs leading-none">
					<?php $chapeau = get_sub_field('chapeau'); ?>
					<?php if ($chapeau): ?>
						<p class="max-w-none m-0"><?= esc_html($chapeau); ?></p>
					<?php endif; ?>

					<?php $mail = get_sub_field('mail'); ?>
					<?php if ($mail): ?>
						<a href="mailto:<?= esc_attr($mail); ?>" class="font-bold bg-(image:--purple-gradient) leading-(--line-height-tight) bg-clip-text bg-clip-text--fix text-transparent w-fit relative after:absolute after:w-full after:h-0 hover:after:h-0.5 after:bg-gradient-to-r after:from-blue after:via-purple after:to-red after:left-0 after:bottom-0">
							<?= esc_html($mail); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>



	</div>

	<?php if (have_rows('help_block')): ?>
		<section class="container mx-auto">
			<div class="grid grid-cols-12 gap-grid">

				<?php while (have_rows('help_block')): the_row();
					$icon  = get_sub_field('icon_help');
					$text  = get_sub_field('txt_help');
					$link  = get_sub_field('link_help');
				?>

					<a
						href="<?php echo esc_url($link['url'] ?? '#'); ?>"
						target="<?php echo esc_attr($link['target'] ?? '_self'); ?>"
						class="col-span-12 md:col-span-6 xl:col-span-3 h-full relative overflow-hidden rounded-md p-8 lg:p-14 shadow-card transition
							flex flex-col items-start justify-start text-left text-black hover:text-white group">

						<?php if ($icon): ?>
							<div class="w-12 lg:w-18 h-12 lg:h-18 mb-6 flex items-center justify-center rounded-full bg-light-grey text-blue group-hover:text-white relative z-20 group-hover:bg-white/20">
								<span class="font-icons-filled text-2xl"><?php echo esc_html($icon); ?></span>
							</div>
						<?php endif; ?>

						<?php if ($text): ?>
							<div class="prose relative z-10 mb-10 group-hover:text-white">
								<?php echo wp_kses_post($text); ?>
							</div>
						<?php endif; ?>

						<?php if ($link): ?>
							<span class="flex items-center gap-2 relative z-10 mt-auto font-normal group-hover:text-white">
								<span><?php echo esc_html($link['title']); ?></span>
								<span class="font-icons-filled group-hover:-rotate-45 transition-transform duration-300">
									arrow_right_alt
								</span>
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