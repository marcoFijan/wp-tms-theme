<section class="my-20 lg:my-60 container grid grid-cols-12 mx-auto gap-x-6 gap-y-20 ">
	<div class="col-span-12 lg:col-span-4 xl:col-span-3 lg:col-start-8 xl:col-start-9 order-1 lg:order-2">
		<?php $label = get_sub_field('label');
		if ($label): ?>
			<?php get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]); ?>
		<?php endif;

		$txt = get_sub_field('txt');
		if ($txt): ?>
			<article class="prose prose-purple">
				<?php the_sub_field('txt'); ?>
			</article>
		<?php endif; ?>


		<?php if (have_rows('links')) : ?>
			<ul class="my-10 lg:my-12">
				<?php while (have_rows('links')) : the_row(); ?>
					<li class="mb-4 last:mb-0">
						<?php
						$link = get_sub_field('link');
						if ($link) :
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<?php
							get_template_part('components/link', null, [
								'link_url'    => get_sub_field('link_url'),
								'link_title'  => $link_title,
								'link_target' => get_sub_field('link_target') ?: '_self',
							]);
							?>

						<?php endif; ?>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>

		<?php
		$link = get_sub_field('link_btn');
		if ($link) :
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
		endif;
		if ($link_url && $link_title) :
			get_template_part('components/button', null, ['variant' => 'grey', 'link' => $link, 'title' => $link_title, 'target' => $link_target]);
		endif; ?>
	</div>
	<div class="col-span-12 lg:col-span-5 xl:col-span-6 lg:col-start-2 xl:col-start-2 order-2 lg:order-1 grid grid-cols-12 xl:grid-cols-6 lg:grid-cols-5  gap-x-6 relative aspect-(--aspect-support) xl:aspect-auto">
		<?php if (get_sub_field('img')) : ?>
			<div class="col-span-12 lg:col-span-5 xl:col-span-5 rounded-lg lg:rounded-xl overflow-hidden shadow-card aspect-(--aspect-support)">
				<?php echo wp_get_attachment_image(
					get_sub_field('img'),
					'medium',
					false,
					array('class' => 'w-full h-full object-cover')
				); ?>
			</div>
		<?php endif; ?>

		<div class="absolute left-1/2 -translate-x-1/2 -bottom-8 xl:left-auto xl:translate-0 xl:right-0 xl:bottom-18 w-max rounded-xs xl:rounded-sm py-4 px-6 bg-white shadow-card flex items-center gap-4 justify-between">
			<div class="w-8 h-8 lg:w-12 lg:h-12 flex items-center justify-center bg-light-grey rounded-full text-dark-blue fill-dark-blue">
				<?php $icon = get_sub_field('icon');
				if ($icon) : ?>
					<span class="font-icons-filled text-dark-blue text-2xl"><?php echo esc_html($icon); ?></span>
				<?php endif; ?>
			</div>

			<div class="prose prose-gradient_link prose-purple prose-small text-xs leading-none	">
				<?php $chapeau = get_sub_field('chapeau');
				if ($chapeau) : ?>
					<p class="max-w-none m-0"><?= $chapeau; ?></p>
				<?php endif;

				$mail = get_sub_field('mail');
				if ($mail) : ?>
					<a href="mailto:<?= $mail; ?>" class="font-bold bg-(image:--purple-gradient) leading-(--line-height-tight) bg-clip-text bg-clip-text--fix text-transparent w-fit relative after:absolute after:w-full after:h-0 hover:after:h-0.5 after:bg-gradient-to-r after:from-blue after:via-purple after:to-red after:left-0 after:bottom-0"><?= $mail; ?></a>
				<?php endif; ?>
			</div>
		</div>
</section>