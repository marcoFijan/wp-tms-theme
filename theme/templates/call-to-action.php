<section class="my-10 lg:my-20 container grid grid-cols-12 mx-auto gap-x-grid gap-y-20 ">
	<div class="col-span-12 lg:col-span-10 lg:col-start-2 bg-white rounded-md lg:rounded-xl overflow-hidden shadow-card grid grid-cols-10 gap-x-grid">
		<article class="col-span-8 col-start-2 lg:col-start-2 lg:col-span-4 my-12 lg:my-20">
			<?php
			$label = get_sub_field('label');
			if ($label): ?>
				<?php get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]); ?>
			<?php endif;

			$txt = get_sub_field('txt');
			if ($txt): ?>
				<div class="prose">
					<?php the_sub_field('txt'); ?>
				</div>
			<?php endif;

			$link = get_sub_field('link');
			if ($link) :
				get_template_part(
					'components/button',
					null,
					[
						'variant' => 'blue',
						'link' => $link,
						'target' => esc_attr($link['target'] ?: '_self'),
						'custom-class' => 'mt-11'
					]
				);
			?>
			<?php endif;

			if (have_rows('usps')) : ?>
				<div class="flex gap-x-6 gap-y-2 flex-wrap w-full mt-16">
					<?php while (have_rows('usps')) : the_row(); ?>
						<span class="flex gap-2 items-center">
							<?php $icon = get_sub_field('icon');
							if ($icon): ?>
								<span class="font-icons-filled text-black text-2xl">
									<?php the_sub_field('icon'); ?>
								</span>
							<?php endif; ?>
							<?php $txt = get_sub_field('usp');
							if ($txt): ?>
								<div class="prose">
									<?php the_sub_field('usp'); ?>
								</div>
							<?php endif; ?>
						</span>


					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</article>
		<div class="relative col-span-12 lg:col-span-4 overflow-visible aspect-3/2 lg:aspect-auto">
			<?php $img = get_sub_field('img'); ?>
			<?php if ($img) : ?>
				<?= wp_get_attachment_image($img, 'img-size', "", array("class" => "w-double absolute top-0 lg:top-12 lg:-left-1/5 left-1/10 max-w-full lg:max-w-double")); ?>
			<?php endif; ?>
		</div>

	</div>
</section>