<?php
$has_cameleon = get_sub_field('has_cameleon');
?>

<section class="shadow-section rounded-xl lg:rounded-2xl py-20 lg:pb-30 lg:container mx-auto relative mb-20 lg:mb-40 <?php if ($has_cameleon) : ?>mt-32 lg:mt-52<?php else : ?>mt-20 lg:mt-40<?php endif; ?>">
	<?php
	if ($has_cameleon) :  ?>
		<img class="object-cover absolute -top-12 z-20 h-16 w-36 left-1/2 -translate-x-1/2 lg:translate-none lg:left-3/12" src="<?php echo get_template_directory_uri(); ?>/assets/media/cameleon.png" />
	<?php endif; ?>
	<div class="grid grid-cols-12 gap-x-6 gap-y-lg lg:gap-y-xl container">
		<div class="flex flex-col lg:flex-row shrink-0 items-start justify-between gap-6 col-span-12 lg:col-span-10 lg:col-start-2">
			<div class="mb-5 lg:mb-0">
				<?php
				$label = get_sub_field('label');
				if ($label): ?>
					<?php get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]); ?>
				<?php endif;

				$txt = get_sub_field('txt');
				if ($txt): ?>
					<article class="prose">
						<?php the_sub_field('txt'); ?>
					</article>
				<?php endif; ?>
			</div>
			<?php
			$link = [
				'url' => get_post_type_archive_link('successstories'),
				'title' => get_sub_field("btn_txt"),
				'target' => '_self'
			];
			if ($link['url'] && $link['title']) :
				get_template_part('components/button', null, ['variant' => 'dark-blue', 'link' => $link]);
			endif;
			?>
		</div>

		<?php
		$successstories = get_sub_field('successtories');

		if ($successstories):
			foreach ($successstories as $post):
				setup_postdata($post); ?>
				<a href="<?php the_permalink(); ?>" class="group no-underline cursor-pointer relative col-span-12 lg:col-span-10 lg:col-start-2 grid grid-cols-12 lg:grid-cols-10 gap-x-6 gap-y-md lg:gap-y-lg after:absolute after:-top-8 lg:after:-top-10 after:w-full after:h-px after:bg-gradient-to-r after:from-grey/0 after:via-grey/10 after:to-grey/0">
					<article class="prose prose-small order-2 lg:order-1 col-span-12 lg:col-span-4">
						<h3 class="lg:mt-8"><?php the_title(); ?></h3>
						<p class="text-grey text-xs mb-10">
							<?php the_field('excerpt'); ?>
						</p>
						<?php get_template_part('components/button', null, ['variant' => 'grey', 'custom-class' => 'leading-none']) ?>
					</article>
					<div class="order-1 lg:order-2 overflow-hidden rounded-md lg:rounded-lg col-span-12 lg:col-span-4 lg:col-start-7">
						<?php if (has_post_thumbnail()): ?>
							<?php
							echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium', false, ['class' => 'w-full h-full object-cover group-hover:brightness-70 transition-all']); ?>
						<?php endif; ?>
					</div>
				</a>

			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

	</div>
</section>