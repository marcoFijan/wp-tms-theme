<section class="bg-white  mt-30 pt-20 lg:pt-30 rounded-t-xl lg:rounded-t-2xl shadow-t-section">
	<article class="container prose prose-purple grid grid-cols-12 gap-6">
		<div class="col-span-12 text-center flex flex-col items-center mb-8 lg:mb-24">
			<?php
			$label = get_sub_field('label');
			if ($label):
				get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]);
			endif;

			$txt = get_sub_field('txt');
			if ($txt): ?>
				<?php the_sub_field("txt"); ?>
			<?php endif; ?>
		</div>

		<?php if (have_rows('usps')) : ?>
			<?php $i = 1; ?>
			<?php while (have_rows('usps')) : the_row(); ?>
				<?php $start_pos = ($i === 2 || $i === 4) ? 'lg:col-start-7' : 'lg:col-start-2'; ?>
				<div class="col-span-12 lg:col-span-4 gap-[1.62rem] text-left flex shrink-0 items-start mb-5 lg:mb-18 last:mb-0 lg:[&:nth-last-child(2)]:mb-0 <?php echo $start_pos ?>">
					<?php
					$icon = get_sub_field('icon');
					if ($icon): ?>
						<div class="bg-light-grey rounded-full aspect-square h-18 w-18 flex justify-center items-center">
							<span class="font-icons-filled text-blue text-2xl"><?php echo esc_html($icon); ?></span>
						</div>
					<?php endif;

					$txt = get_sub_field('txt');
					if ($txt) : ?>
						<div class="space-y-4">
							<?php echo $txt; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php $i++; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</article>
</section>