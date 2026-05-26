<?php

/**
 * Template part for news grid wrapper
 * Displays the grid of news cards and pagination
 *
 * @package YourTheme
 *
 * Expected variables:
 * @var WP_Query $query - The query object containing news posts
 */

$query = $args['query'] ?? $wp_query;
$prev_button_content = '<span class="font-icons-filled">arrow_left_alt</span> Vorige';
$next_button_content = 'Volgende <span class="font-icons-filled">arrow_right_alt</span>';

if ($query->have_posts()) : ?>
	<div class="grid grid-cols-12 gap-grid" id="news-grid">
		<?php while ($query->have_posts()) : $query->the_post(); ?>
			<?php get_template_part('templates/news-card'); ?>
		<?php endwhile; ?>
	</div>

	<nav class="navigation pagination hidden has-[.page-numbers]:flex gap-6 mt-20 lg:mt-30 justify-center flex-wrap" aria-label="Berichten paginering">
		<button disabled class="prevPlaceholder pointer-events-none opacity-20 -tracking-md bg-dark-blue text-light-grey box-border w-fit cursor-pointer items-center gap-2 rounded-full border border-transparent px-6 py-4 text-xs leading-none font-medium no-underline;">
			<?php echo $prev_button_content ?>
		</button>
		<?php
		$current_page = max(1, (int) ($query->get('paged') ?: 1));

		echo paginate_links([
			'base'      => add_query_arg('paged', '%#%'),
			'format'    => '',
			'current'   => $current_page,
			'total'     => $query->max_num_pages,
			'mid_size'  => 2,
			'prev_text' => $prev_button_content,
			'next_text' => $next_button_content,
			'type'      => 'list',
		]);
		?>
		<button disabled class="nextPlaceholder pointer-events-none opacity-20 -tracking-md bg-dark-blue text-light-grey box-border w-fit cursor-pointer items-center gap-2 rounded-full border border-transparent px-6 py-4 text-xs leading-none font-medium no-underline;">
			<?php echo $next_button_content ?>
		</button>
	</nav>

	<?php wp_reset_postdata(); ?>
<?php else : ?>
	<div class="text-center py-16">
		<p class="text-grey text-lg">Geen nieuwsberichten gevonden.</p>
	</div>
<?php endif; ?>