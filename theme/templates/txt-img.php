<section class="container grid grid-cols-12 gap-x-6 gap-y-12 overflow-x-hidden my-20 lg:my-40">
	<?php
	$img_big = get_sub_field('img_big') ? true : false;
	$order = get_sub_field('order')['value'];

	// Base column sizes
	$text_col = 5;
	$img_col  = 4;

	// Adjust if image should be bigger
	if ($img_big) {
		$text_col -= 1; // shrink text by 1
		$img_col  += 1; // grow image by 1
	}
	?>

	<div class="col-span-12 lg:col-span-<?php echo $text_col; ?>
        <?php
				if ($order == 'img_txt') {
					echo ' lg:order-2 lg:col-start-' . (12 - $text_col); // make text start after image
				} else {
					echo ' lg:col-start-2'; // text start for txt_img
				}
				?>">
		<?php $label = get_sub_field('label');
		if ($label):
			get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label,]);
		endif; ?>
		<article class="prose">
			<?php the_sub_field('txt'); ?>
		</article>
		<?php
		$link = get_sub_field('link');
		if ($link) :
			get_template_part(
				'components/button',
				null,
				[
					'variant' => 'dark-blue',
					'link' => $link,
					'target' => esc_attr($link['target'] ?: '_self'),
					'custom-class' => 'mt-9'
				]
			);
		?>
		<?php endif; ?>
	</div>

	<div class="col-span-12 lg:col-span-<?php echo $img_col; ?>
        <?php
				if ($order == 'img_txt') {
					echo ' lg:order-1 lg:col-start-2';
				} else {
					echo ' lg:col-start-' . (12 - $img_col); // image start after text
				}
				?>">
		<?= wp_get_attachment_image(get_sub_field('img'), 'Medium-Groot', "", array("class" => "w-full h-auto rounded-lg overflow-hidden")); ?>
	</div>
</section>