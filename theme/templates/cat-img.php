<section class="container grid grid-cols-12 gap-x-6 gap-y-12 overflow-x-hidden my-20 lg:my-40">

	<?php
	$order = get_sub_field('order')['value'];
	$text_col = 4;
	$img_col  = 5;
	?>

	<div class="col-span-12 lg:col-span-<?php echo $text_col; ?><?php if ($order == 'img_txt') { ?> lg:order-2 lg:col-start-<?php echo 12 - $text_col; ?><?php	} else { ?> lg:col-start-2<?php } ?>">
		<?php $term = get_sub_field('category'); ?>
		<?php if ($term): ?>
			<?php get_template_part('components/label', null, [
				'variant' => 'dark',
				'title' => $term->name,
			]); ?>
		<?php endif; ?>

		<article class="prose ">
			<?php the_sub_field('txt'); ?>
		</article>

		<?php
		if ($term):
			$args = [
				'post_type' => 'nextup_tms',
				'tax_query' => [
					[
						'taxonomy' => 'nextup_tms_category',
						'field'    => 'term_id',
						'terms'    => $term->term_id,
					],
				],
				'posts_per_page' => -1,
				'post_status' => 'publish',
			];

			$posts = get_posts($args);

			if ($posts): ?>
				<ul class="grid grid-cols-2 gap-2 list-none m-0 p-0 mt-10">
					<?php foreach ($posts as $post):
						setup_postdata($post); ?>
						<li class="m-0 p-0">
							<?php get_template_part(
								'components/button',
								null,
								[
									'variant' => 'white-border',
									'url'     => get_permalink(),
									'title'   => get_the_title(),
									'custom-class' => 'flex-row-reverse border border-light-grey w-full justify-end'
								]
							); ?>
						</li>
					<?php endforeach;
					wp_reset_postdata(); ?>
					<li class="mt-0">
						<?php get_template_part(
							'components/button',
							null,
							[
								'variant' => 'dark-blue',
								'url'     => get_term_link($term),
								'title'   => 'Bekijk alles',
								'custom-class' => 'border border-dark-blue w-full justify-between hover:border-light-grey'
							]
						); ?>
					</li>
				</ul>
		<?php endif;
		endif; ?>
	</div>

	<div class="col-span-12 lg:col-span-<?php echo $img_col; ?><?php if ($order == 'img_txt') {	?> lg:order-1 lg:col-start-2<?php	} else { ?> lg:col-start-<?php echo 12 - $img_col; ?><?php } ?>">
		<?php $img = get_sub_field('img');
		if ($img): ?>
			<?php echo wp_get_attachment_image($img, 'Medium-Groot', '', ['class' => 'w-full h-auto rounded-lg overflow-hidden']); ?>
		<?php endif; ?>
	</div>

</section>