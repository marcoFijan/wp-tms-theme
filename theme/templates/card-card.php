<?php if (have_rows('cards')): ?>
	<section class="my-20 lg:my-40 lg:mb-60 container grid grid-cols-12 mx-auto gap-grid">
		<?php
		$counter = 0;
		while (have_rows('cards')): the_row();
			$counter++;
			$img = get_sub_field('img');
			$label = get_sub_field('label');
			$text  = get_sub_field('txt');
			$link  = get_sub_field('link');

			// Determine column classes
			$col_classes = 'col-span-12 lg:col-span-5';
			if ($counter % 2 !== 0) {
				$col_classes .= ' lg:col-start-2 lg:translate-y-20';
			}
		?>
			<div class="<?= esc_attr($col_classes); ?> bg-white shadow-card rounded-lg overflow-hidden p-4">
				<?php if ($img): ?>
					<?= wp_get_attachment_image($img, 'Afbeelding medium', "", array("class" => "w-full rounded-md")); ?>
				<?php endif; ?>

				<article class="px-4 py-8">
					<?php if ($label):
						get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]);
					endif; ?>

					<?php if ($text): ?>
						<div class="prose mb-4">
							<?php echo $text; ?>
						</div>
					<?php endif; ?>

					<?php if ($link):
						get_template_part('components/button', null, [
							'variant' => 'dark-blue',
							'link' => $link,
							'custom-class' => 'mt-9'
						]);
					endif; ?>
				</article>
			</div>
		<?php endwhile; ?>
	</section>
<?php endif; ?>