<section class="container grid grid-cols-12 gap-x-grid gap-y-12 overflow-x-hidden my-20 lg:my-40">
	<?php
	$img = get_sub_field('img');
	?>

	<div class="col-span-12 lg:col-span-5 lg:col-start-2">
		<?php if ($img): ?>
			<?= wp_get_attachment_image($img, 'Medium-Groot', false, ['class' => 'w-full h-auto rounded-lg overflow-hidden']); ?>
		<?php endif; ?>
	</div>

	<div class="col-span-12 lg:col-span-4 lg:col-start-8">
		<?php
		$label = get_sub_field('label');
		if ($label):
			get_template_part('components/label', null, [
				'variant' => 'dark',
				'title' => $label,
			]);
		endif;

		$txt = get_sub_field('txt');
		if ($txt): ?>
			<article class="prose">
				<?php echo $txt; ?>
			</article>
		<?php endif;

		$link = get_sub_field('link');
		if ($link):
			get_template_part('components/button', null, [
				'variant' => 'dark-blue',
				'link' => $link,
				'target' => esc_attr($link['target'] ?: '_self'),
				'custom-class' => 'mt-4 !font-black',
				'icon' => 'fork_right',
			]);
		endif;
		?>


		<?php
		$opening_title = get_sub_field('opening_hours') ?: 'Openingstijden';
		$days = [
			['name' => get_sub_field('monday_name'), 'hours' => get_sub_field('monday_hours')],
			['name' => get_sub_field('tuesday_name'), 'hours' => get_sub_field('tuesday_hours')],
			['name' => get_sub_field('wednesday_name'), 'hours' => get_sub_field('wednesday_hours')],
			['name' => get_sub_field('thursday_name'), 'hours' => get_sub_field('thursday_hours')],
			['name' => get_sub_field('friday_name'), 'hours' => get_sub_field('friday_hours')],
		];


		// Get today's day number (1 = Monday, 5 = Friday)
		$today = (int) date('N'); // 1-7 (Mon-Sun)
		?>

		<div class="w-max mt-12">
			<h3 class="font-semibold text-md mb-2"><?= esc_html($opening_title); ?></h3>
			<ul class="grid grid-cols-[auto_1fr] gap-x-8 gap-y-1 text-sm">
				<?php foreach ($days as $index => $day): ?>
					<?php if ($day['name'] && $day['hours']): ?>
						<?php
						// Check if this day is today
						// $index = 0 => Monday, so add 1
						$is_today = ($today >= 1 && $today <= 5 && $index + 1 === $today);
						?>
						<li class="contents text-xs">
							<span class="<?= $is_today ? 'font-bold text-black' : 'font-normal text-grey' ?>">
								<?= esc_html($day['name']); ?>
							</span>
							<span class="text-right <?= $is_today ? 'font-bold text-black' : 'font-normal text-grey' ?>">
								<?= esc_html($day['hours']); ?>
							</span>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>