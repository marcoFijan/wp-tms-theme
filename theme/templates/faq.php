<section class="my-20 lg:my-40 container grid grid-cols-12 mx-auto gap-x-grid gap-y-20">
	<article class="col-span-12 lg:col-span-4 xl:col-span-3 lg:col-start-2 xl:col-start-2">
		<?php $label = get_sub_field('label');
		if ($label): ?>
			<?php get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]); ?>
		<?php endif;

		$txt = get_sub_field('txt');
		if ($txt): ?>
			<div class="prose">
				<?php the_sub_field('txt'); ?>
			</div>
		<?php endif; ?>

		<section class="rounded-sm shadow-card mt-8 flex flex-col text-center justify-center items-center pt-12">
			<?php $txt_help = get_sub_field('txt_help');
			if ($txt_help): ?>
				<p class="font-bold text-md mb-6">
					<?php the_sub_field('txt_help'); ?>
				</p>
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
						'custom-class' => 'mb-8'
					]
				);
			?>
			<?php endif;

			$img = get_sub_field('img');
			if ($img) : ?>
				<?= wp_get_attachment_image($img, 'Afbeelding (306 x 170)', "", array("class" => "w-full block")); ?>
			<?php endif; ?>
		</section>
	</article>
	<div class="col-span-12 lg:col-span-5 xl:col-span-6 lg:col-start-7 xl:col-start-6 ">
		<?php $faqs = get_sub_field('faq');
		if ($faqs) : ?>
			<div data-accordion data-single="true" class="space-y-2">
				<?php
				$i = 1;
				foreach ($faqs as $faq) :
					$header = $faq['header'];
					$content = $faq['content'];
					$link = $faq['link'];
				?>
					<div class="relative">
						<div class="absolute w-full h-full rounded-md shadow-card top-0 left-0 -z-10"></div>
						<div class="text-dark-blue font-bold rounded-sm px-10 bg-white peer-aria-expanded:rounded-lg transition-all duration-300 relative z-20">
							<span
								role="button"
								tabindex="0"
								class="peer group w-full flex items-center justify-between p-0 gap-4 py-6 text-left cursor-pointer select-none relative"
								data-panel>
								<span class="font-bold text-md py-0"><?php echo esc_html($header); ?></span>

								<div class="relative aspect-square w-10 h-10 flex items-center justify-center rounded-full group-aria-expanded:bg-dark-blue group-hover:bg-dark-blue bg-light-grey transition-colors duration-300">
									<span class="absolute block w-faq-accordion h-px transition-all duration-300 bg-dark-blue group-hover:bg-light-grey"></span>
									<span class="absolute block w-faq-accordion h-px transition-all duration-300 rotate-90 group-aria-expanded:rotate-0 bg-dark-blue group-aria-expanded:bg-light-grey group-hover:bg-light-grey"></span>
								</div>
							</span>

							<div
								id="panel-<?php echo $i; ?>"
								role="region"
								aria-labelledby="accordion-<?php echo $i; ?>"
								class="overflow-hidden transition-all duration-300"
								style="max-height: 0px;">
								<div class="text-sm text-grey space-y-1 font-normal pb-12">
									<?php if ($content) : ?>
										<div class="mb-2">
											<?php echo $content; // WYSIWYG content
											?>
										</div>
									<?php endif; ?>

									<?php if ($link) :
										get_template_part(
											'components/button',
											null,
											[
												'variant' => 'green',
												'link' => $link,
												'target' => esc_attr($link['target'] ?: '_self'),
												'custom-class' => 'mt-11'
											]
										);
									?>
									<?php endif; ?>

								</div>
							</div>
						</div>
					</div>
				<?php
					$i++;
				endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>