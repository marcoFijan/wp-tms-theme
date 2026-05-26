<?php
$img_left  = get_sub_field('img_left');
$img_right = get_sub_field('img_right');

if ($img_left || $img_right) :
?>
	<section class="container grid grid-cols-12 gap-x-grid gap-y-12">
		<?php if ($img_left) : ?>
			<div class="col-span-12 lg:col-span-4 lg:col-start-3 rounded-sm lg:rounded-md overflow-hidden">
				<?php echo wp_get_attachment_image($img_left, 'medium', false, ['class' => 'w-full h-auto object-cover']); ?>
			</div>
		<?php endif; ?>

		<?php if ($img_right) : ?>
			<div class="col-span-12 lg:col-span-4 lg:col-start-7 rounded-sm lg:rounded-md overflow-hidden">
				<?php echo wp_get_attachment_image($img_right, 'medium', false, ['class' => 'w-full h-auto object-cover']); ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>