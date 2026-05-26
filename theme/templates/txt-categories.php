<?php
$label = get_sub_field('label');
$txt  = get_sub_field('txt');
$link  = get_sub_field('link');
?>

<section class="container mx-auto grid grid-cols-12 gap-6 mt-24 mb-24 lg:mb-36">
	<div class="col-span-12 lg:col-span-3 lg:col-start-2 prose mb-14 lg:mb-0">
		<?php if ($label): ?>
			<?php get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]); ?>
		<?php endif;
		if ($txt): ?>
			<article class="mb-11 text-grey text-md">
				<?php the_sub_field("txt"); ?>
			</article>
		<?php
			if ($link) :
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
			endif;
			if ($link_url && $link_title) :
				get_template_part('components/button', null, ['variant' => 'dark-blue', 'link' => $link, 'title' => $link_title, 'target' => $link_target]);
			endif;
		endif ?>
	</div>
	<div class="col-span-12 lg:col-span-6 lg:col-start-6 grid grid-cols-6 gap-6">
		<?php if (have_rows('categories', $cat)) : ?>
			<?php $i = 1; ?>

			<?php while (have_rows('categories', $cat)) :
				the_row();
				$text  = $args['txt']  ?? '';
				$link_cat = get_sub_field('link_cat');
				if ($link_cat) :
					// Add spacing for items 2 and 4
					$offset_class = ($i === 2 || $i === 4) ? 'lg:translate-y-12' : 'lg:transform-none'; ?>

					<a class="p-8 rounded-md overflow-hidden group text-dark-blue shadow-card relative group col-span-6 lg:col-span-3 gap-6 prose prose-darkBlue prose-White max-h-max <?php echo $offset_class ?>" href="<?php echo esc_url($link_cat); ?>">
						<div class="absolute z-0 top-0 left-0 w-full h-full">
							<canvas class="gradient-canvas h-full w-full z-0 relative left-0 top-0" style="--gradient-color-1: <?php echo esc_attr(get_sub_field('gradient_color_1')); ?>;	--gradient-color-2: <?php echo esc_attr(get_sub_field('gradient_color_2')); ?>; --gradient-color-3: <?php echo esc_attr(get_sub_field('gradient_color_3')); ?>;	--gradient-color-4: <?php echo esc_attr(get_sub_field('gradient_color_4')); ?>"></canvas>
							<img class="w-full h-full object-cover absolute top-0 left-0 z-20 opacity-0 transition-all ease-in-out group-hover:opacity-5" src="<?php echo get_template_directory_uri(); ?>/assets/media/heroOverlay.jpg" />
							<div class="w-full h-full group-hover:bg-blue group-hover:opacity-60 z-30 absolute top-0 left-0 opacity-100 bg-white transition-all ease-in-out"></div>
						</div>
						<?php
						$text_cat = get_sub_field('txt_cat');
						if ($text_cat) : ?>
							<article class="relative z-20 mb-11 prose text-dark-blue group-hover:!text-white group-hover:[&_span]:!text-white">
								<section class="space-y-6">
									<?php the_sub_field('txt_cat') ?>
								</section>
							</article>
						<?php endif; ?>
						<div class="relative z-10">
							<?php get_template_part('components/button', null, ['variant' => 'grey', 'custom-class' => 'leading-none']); ?>
						</div>
					</a>
		<?php $i++;
				endif;
			endwhile;
		endif; ?>
	</div>

</section>