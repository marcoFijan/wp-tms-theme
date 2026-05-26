<?php
get_header();

$post_type = get_post_type();
$archive_id = $post_type . '_archive';

$categories = get_terms([
	'taxonomy' => 'category_news',
	'hide_empty' => true,
]);

$selected_cats = isset($_GET['cat_news']) ? explode(',', sanitize_text_field($_GET['cat_news'])) : [];
?>

<section class="container grid grid-cols-12 gap-x-grid mb-10 lg:mb-34">
	<span class="col-span-12 lg:col-span-10 lg:col-start-2">
		<?php $label = get_field('news_label', $archive_id);
		if ($label): ?>
			<?php get_template_part('components/label', null, ['variant' => 'dark', 'title' => $label]); ?>
		<?php endif; ?>
	</span>
	<article class="col-span-12 lg:col-span-4 lg:col-start-2 mb-12 lg:mb-0">
		<?php $txt = get_field('news_txt_left', $archive_id);
		if ($txt): ?>
			<article class="prose">
				<?php the_field('news_txt_left', $archive_id); ?>
			</article>
		<?php endif; ?>
	</article>

	<!-- Category Filter -->
	<section class="col-span-12 lg:col-span-5 lg:col-start-7">
		<article>
			<?php $txt = get_field('news_txt_right', $archive_id);
			if ($txt): ?>
				<article class="prose">
					<?php the_field('news_txt_right', $archive_id); ?>
				</article>
			<?php endif; ?>
		</article>
		<ul class="flex flex-wrap gap-2 p-6 rounded-md shadow-card mt-8" id="news-category-filters">
			<li>
				<input
					type="checkbox"
					id="filter-all"
					class="category-filter-checkbox hidden peer"
					value="all"
					<?php checked(empty($selected_cats)); ?> />

				<label
					for="filter-all"
					class="flex items-center gap-2 cursor-pointer px-6 py-4 after:bg-light-grey hover:after:border-dark-blue rounded-full peer-checked:after:border-0 peer-checked:after:bg-white peer-checked:font-bold font-medium gradient-border-button bg-(image:--green-gradient)/0 peer-checked:bg-(image:--green-gradient)">
					<span class="text-xs text-dark-blue relative z-10">Alle categorieën</span>
				</label>

			</li>

			<?php if (!empty($categories) && !is_wp_error($categories)): ?>
				<?php foreach ($categories as $category): ?>
					<li>
						<input
							type="checkbox"
							id="category-<?php echo esc_attr($category->term_id); ?>"
							class="category-filter-checkbox hidden peer"
							value="<?php echo esc_attr($category->term_id); ?>"
							<?php checked(in_array((string) $category->term_id, $selected_cats, true)); ?> />

						<label
							for="category-<?php echo esc_attr($category->term_id); ?>"
							class="flex items-center gap-2 cursor-pointer px-6 py-4 after:bg-light-grey hover:after:border-dark-blue rounded-full peer-checked:after:border-0 peer-checked:after:bg-white peer-checked:font-bold font-medium gradient-border-button bg-(image:--green-gradient)/0 peer-checked:bg-(image:--green-gradient)">
							<span class=" text-dark-blue relative z-10 text-xxs">
								<?php echo esc_html($category->name); ?>
								<span class="text-xs text-dark-blue relative z-10">(<?php echo $category->count; ?>)</span>
							</span>
						</label>

					</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</section>
</section>


<!-- News Archive Grid -->
<section class="container px-6 py-8">
	<?php
	// Fetch news posts on initial page load
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$initial_args = [
		'post_type'      => 'news',
		'posts_per_page' => 6,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'paged'          => $paged,
	];

	// If categories are pre-selected via GET
	if (!empty($selected_cats)) {
		$category_ids = array_map('intval', $selected_cats);
		$initial_args['tax_query'] = [
			[
				'taxonomy' => 'category_news',
				'field'    => 'term_id',
				'terms'    => $category_ids,
				'operator' => 'IN',
			]
		];
	}

	$initial_query = new WP_Query($initial_args);
	?>

	<div id="news-grid-container">
		<?php get_template_part('templates/news-grid', null, ['query' => $initial_query]); ?>
	</div>

	<div id="news-loading" class="hidden text-center py-16">
		<p class="text-grey text-lg">Laden...</p>
	</div>
</section>

<?php get_footer(); ?>