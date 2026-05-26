<section class="container my-20 lg:my-24 grid grid-cols-12 gap-6 items-center justify-center place-content-center">
	<?php $title = get_sub_field('title');
	if ($title): ?>
		<p class="col-span-12 lg:col-span-2 lg:col-start-2 text-center text-xs text-dark-blue"><?php echo $title; ?></p>
	<?php endif;

	if (have_rows('partners')) : ?>
		<?php while (have_rows('partners')) : the_row(); ?>
			<a title="Bekijk partner" class="col-span-6 lg:col-span-2 flex items-center justify-center bg-white/0 lg:px-8 lg:py-8 px-6 py-4 rounded-full hover:bg-white/100 hover:shadow-card lg:opacity-15 hover:opacity-100 transition-all duration-300" href="<?php the_sub_field('link'); ?>">
				<?php
				$img = get_sub_field('img');
				if ($img) :
					echo wp_get_attachment_image(
						$img,
						'thumbnail',
						false,
						array('class' => 'w-auto h-6  object-contain')
					);
				endif;
				?>
			</a>
		<?php endwhile; ?>
	<?php endif; ?>

</section>