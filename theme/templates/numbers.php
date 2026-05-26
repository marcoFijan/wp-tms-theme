<section class="container grid grid-cols-12 gap-6 items-center justify-center my-30 lg:my-40 overflow-x-hidden ">
	<div class="col-span-10 col-start-2 sm:col-span-8 sm:col-start-3 md:col-span-6 md:col-start-4 lg:col-span-10 lg:col-start-2 flex flex-col lg:flex-row items-start lg:justify-between gap-6">
		<?php if (have_rows('numbers')) : ?>
			<?php while (have_rows('numbers')) : the_row(); ?>
				<div class="w-full lg:max-w-49 prose prose-no_margin">
					<?php
					$number = get_sub_field('number');
					$unit = get_sub_field('unit');

					if ($number) : ?>
						<span class="text-3xl block leading-(--line-height-tight) mb-2 font-bold tracking-[-0.03375rem] bg-clip-text bg-clip-text--fix text-transparent w-fit bg-(image:--green-gradient) m-0"><?php echo $number ?><?php if ($unit) echo $unit ?></span>
					<?php endif;

					$txt = get_sub_field('txt');
					if ($txt) : ?>
						<div class="prose text-grey space-y-2">
							<?php echo $txt; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>