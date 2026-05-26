<section class="my-20 lg:my-40 container grid grid-cols-12 mx-auto gap-x-grid gap-y-8 lg:gap-y-0">
	<div class="col-span-12 lg:col-span-10 lg:col-start-2 flex flex-col items-center justify-center">
		<?php
		$label = get_sub_field('label');
		if ($label): ?>
			<?php get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]); ?>
		<?php endif;

		$txt = get_sub_field('txt_top');
		if ($txt): ?>
			<div class="prose">
				<?php the_sub_field('txt_top'); ?>
			</div>
		<?php endif;

		$img = get_sub_field('img');
		if ($img): ?>
			<?= wp_get_attachment_image($img, 'Afbeelding wide', "", array("class" => "w-full rounded-md mt-12 mb-0 lg:mb-16")); ?>
		<?php endif; ?>
	</div>
	<article class="col-span-12 lg:col-span-4 lg:col-start-2">
		<?php $txt_left = get_sub_field('txt_bottom_left');
		if ($txt_left): ?>
			<div class="prose">
				<?php the_sub_field('txt_bottom_left'); ?>
			</div>
		<?php endif; ?>
	</article>
	<article class="col-span-12 lg:col-span-5 lg:col-start-7">
		<?php $txt_right = get_sub_field('txt_bottom_right');
		if ($txt_right): ?>
			<div class="prose">
				<?php the_sub_field('txt_bottom_right'); ?>
			</div>
		<?php endif; ?>
		<?php $link = get_field('link');
		if (!empty($link['url']) && !empty($link['title'])) {
			get_template_part(
				'components/button',
				null,
				[
					'variant' => 'dark-blue',
					'link' => $link,
					'custom-class' => 'mt-8'
				]
			);
		}	?>
	</article>

</section>