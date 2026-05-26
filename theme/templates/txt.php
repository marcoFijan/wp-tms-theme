<section class="container grid grid-cols-12 gap-x-grid gap-y-12 my-10 lg:my-20">
	<div class="col-span-12 lg:col-span-7 lg:col-start-3">
		<article class="prose">
			<?php echo get_sub_field('txt'); ?>
		</article>

		<?php
		$link = get_sub_field('link');
		if (!empty($link)) :
			get_template_part(
				'components/button',
				null,
				[
					'variant'      => 'grey',
					'link'         => $link,
					'custom-class' => 'mt-8 lg:mt-14',
					'target'       => esc_attr($link['target'] ?: '_self'),
				]
			);
		endif;
		?>
	</div>
</section>