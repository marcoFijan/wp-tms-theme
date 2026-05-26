<section class="container grid grid-cols-12 gap-x-6 gap-y-12 my-20 lg:my-40">
	<?php
	$label = get_sub_field('label');
	$txt = get_sub_field('txt');
	?>
	<div class="col-span-12 lg:col-span-3 lg:col-start-2">
		<?php if ($label): ?>
			<?php get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]); ?>
		<?php endif; ?>
		<?php if ($txt): ?>
			<article class="prose">
				<?php echo $txt; ?>
			</article>
		<?php endif; ?>
	</div>

	<?php
	$tabs = get_sub_field('tabs');
	if ($tabs):
		$tab_index = 0;
	?>
		<div class="col-span-12 lg:col-span-6 lg:col-start-6">
			<div class="tabs-wrapper bg-white rounded-md shadow-card p-6 pb-20">
				<div class="grid grid-cols-1 lg:grid-cols-3 gap-3 pb-6 mb-12 justify-between relative after:absolute after:bottom-0 after:w-full after:h-px after:bg-gradient-to-r after:from-grey/0 after:via-grey/10 after:to-grey/0" role="tablist">
					<?php foreach ($tabs as $tab): ?>
						<button
							class="tab-button flex items-center justify-center gap-2 cursor-pointer px-6 py-4 after:bg-light-grey hover:after:border-dark-blue rounded-full aria-selected:after:border-0 aria-selected:after:bg-white aria-selected:font-bold font-medium gradient-border-button bg-(image:--green-gradient)/0 aria-selected:bg-(image:--green-gradient)"
							data-tab="<?= $tab_index; ?>"
							role="tab"
							aria-selected="<?= ($tab_index === 0) ? 'true' : 'false'; ?>">
							<?php if ($tab['tab_icon']): ?>
								<span class="font-icons-filled relative z-10 font-medium"><?= esc_html($tab['tab_icon']); ?></span>
							<?php endif; ?>
							<span class="relative z-10"><?= esc_html($tab['tab_cat']); ?></span>
						</button>
					<?php $tab_index++;
					endforeach; ?>
				</div>

				<div class="tab-contents">
					<?php $tab_index = 0;
					foreach ($tabs as $tab):
						$hidden_class = ($tab_index === 0) ? '' : 'hidden';
					?>
						<article class="tab-content px-4 lg:px-10 <?= $hidden_class; ?>" data-tab="<?= $tab_index; ?>">
							<?php echo $tab['tab_content']; ?>
						</article>
					<?php $tab_index++;
					endforeach; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</section>