<?php
$hero_text         = get_field('txt');
$show_breadcrumbs  = get_field('breadcrumbs');
$gradient1         = get_field('gradient_color_1') ?: '#0070BA';
$gradient2         = get_field('gradient_color_2') ?: '#0070BA';
$gradient3         = get_field('gradient_color_3') ?: '#0070BA';
$gradient4         = get_field('gradient_color_4') ?: '#0070BA';
$contact_label     = get_field('contact_label');
$contact_txt       = get_field('contact_txt');
$contact_form      = get_field('contact_form');

$contact_offset 	 = '5.25rem'
?>

<section class="flex flex-col" style="margin-bottom: -<?php echo $contact_offset; ?>;">
	<div class="pb-20 pt-header-offset lg:pt-header-offset-lg relative">
		<div class="absolute z-0 top-0 left-0 w-full h-full">
			<canvas class="h-full w-full z-0 absolute left-0 top-0 gradient-canvas" style="
            --gradient-color-1: <?php echo esc_attr($gradient1); ?>;
            --gradient-color-2: <?php echo esc_attr($gradient2); ?>;
            --gradient-color-3: <?php echo esc_attr($gradient3); ?>;
            --gradient-color-4: <?php echo esc_attr($gradient4); ?>"></canvas>
			<img class="w-full h-full object-cover absolute top-0 left-0 z-20 opacity-5" src="<?php echo get_template_directory_uri(); ?>/assets/media/heroOverlay.jpg" />
			<div class="w-full h-full bg-blue opacity-60 z-30 absolute top-0 left-0"></div>
		</div>

		<article class="container px-6 w-full min-h-1/2 relative z-10 prose grid grid-cols-12 gap-grid pt-16 text-white text-center">
			<?php if ($hero_text): ?>
				<div class="col-span-12 lg:col-span-8 lg:col-start-3 text-white prose-white">
					<?php echo wp_kses_post($hero_text); ?>
				</div>
			<?php endif; ?>
		</article>
		<?php if ($show_breadcrumbs): ?>
			<div class="col-span-12 flex justify-center text-white prose prose-white" style="padding-bottom: <?php echo $contact_offset; ?>;">
				<?php $show_breadcumbs = get_field('breadcrumbs');
				if ($show_breadcumbs) :
					get_template_part('components/breadcrumbs', null, ['no-margin' => true]);
				endif; ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="container grid grid-cols-12 gap-x-grid" style="transform: translateY(-<?php echo $contact_offset; ?>);">
		<?php if ($contact_form): ?>
			<div class="col-span-12 lg:col-span-8 lg:col-start-3 grid grid-cols-12 lg:grid-cols-8 gap-grid bg-white rounded-md lg:rounded-xl py-10 lg:py-20  text-black shadow-card">
				<div class="col-span-10 col-start-2 lg:col-span-6 lg:col-start-2 text-center flex flex-col items-center">
					<?php
					if ($contact_label): ?>
						<?php get_template_part('components/label', null,  ['title' => $contact_label]); ?>
					<?php endif;

					if ($contact_txt): ?>
						<div class="prose">
							<?php echo wp_kses_post($contact_txt); ?>
						</div>
					<?php endif; ?>

					<div class="mt-14 primary-contact">
						<?php echo do_shortcode($contact_form); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>