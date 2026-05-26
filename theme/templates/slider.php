<?php
$gallery = get_sub_field('images'); // ACF gallery field
if ($gallery && is_array($gallery)) :
?>
	<section class="relative overflow-x-hidden py-20 lg:py-40 -my-20 lg:-my-40">
		<div class="w-[200vw] -translate-x-1/4  lg:w-[140vw] lg:-translate-x-1/7 overflow-visible xl:w-[150vw] xl:-translate-x-1/6 2xl:w-[140vw] 2xl:-translate-x-1/7 3xl:w-full 3xl:-translate-x-0">
			<div class="swiper-container gallery w-full" aria-label="Afbeeldingen slider">
				<div class="swiper-wrapper">
					<?php foreach ($gallery as $image_url) : ?>
						<div class="swiper-slide rounded-md lg:rounded-xl overflow-hidden aspect-[21/11]">
							<img src="<?php echo esc_url($image_url); ?>" alt="" class="object-cover object-center h-full w-full" />
						</div>
					<?php endforeach; ?>
				</div>

				<div class="w-full flex justify-center absolute bottom-26 z-10">
					<div class="swiper-pagination"></div>
				</div>

				<div class="w-full flex justify-center gap-6 mt-8">
					<?php get_template_part(
						'components/button',
						null,
						[
							'variant' => 'grey',
							'title' => 'Vorige slide',
							'custom-class' => 'swiper-button-prev flex-row-reverse',
							'icon' => 'arrow_left_alt'
						]
					);
					get_template_part(
						'components/button',
						null,
						[
							'variant'      => 'grey',
							'title'        => 'Volgende slide',
							'custom-class' => 'swiper-button-next'
						]
					); ?>
				</div>

			</div>
		</div>
	</section>

<?php endif; ?>