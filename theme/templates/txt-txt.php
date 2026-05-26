<section class="container grid grid-cols-12 gap-x-grid gap-y-12 my-20 lg:my-40">
	<?php
	$columns = [
		[
			'txt'  => get_sub_field('txt_left'),
			'link' => get_sub_field('link_left'),
		],
		[
			'txt'  => get_sub_field('txt_right'),
			'link' => get_sub_field('link_right'),
		],
	];
	?>

	<div class="col-span-12 lg:mx-auto grid gap-x-grid gap-y-12 lg:grid-cols-4 lg:col-span-10 lg:col-start-2">
		<?php foreach ($columns as $column) : ?>
			<div class="col-span-1">
				<article class="prose">
					<?php echo $column['txt']; ?>
				</article>

				<?php if (!empty($column['link'])) :
					get_template_part(
						'components/button',
						null,
						[
							'variant'       => 'grey',
							'link'          => $column['link'],
							'custom-class'  => 'mt-8 lg:mt-14',
							'target'        => esc_attr($column['link']['target'] ?: '_self'),
						]
					);
				endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
</section>