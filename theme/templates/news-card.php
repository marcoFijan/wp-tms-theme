<?php

/**
 * Template part for displaying news card
 */

$excerpt = get_field('excerpt');
$categories = get_the_terms(get_the_ID(), 'category_news');
$category_names = (!empty($categories) && !is_wp_error($categories))
	? wp_list_pluck($categories, 'name')
	: [];
?>

<a href="<?php the_permalink(); ?>"
	class="prose group cursor-pointer transition-all col-span-12 lg:col-span-4
	no-underline shadow-card lg:shadow-card/0 hover:shadow-card px-2 pt-2 lg:pt-4 lg:px-4 pb-8
	rounded-lg lg:rounded-xl flex flex-col">

	<?php if (has_post_thumbnail()): ?>
		<div class="overflow-hidden rounded-md lg:rounded-lg prose aspect-video">
			<?php echo get_the_post_thumbnail(get_the_ID(), 'medium', [
				'class' => 'w-full h-full object-cover'
			]); ?>
		</div>
	<?php endif; ?>

	<article class="prose mb-9 mx-4 lg:mx-6">
		<?php if ($category_names): ?>
			<span class="block text-grey group-hover:text-dark-blue transition-colors mt-8 text-xs">
				<?php echo esc_html(implode(', ', $category_names)); ?>
			</span>
		<?php endif; ?>

		<h3 class="mt-3 text-lm"><?php the_title(); ?></h3>

		<?php if ($excerpt): ?>
			<p class="text-xs text-grey group-hover:text-dark-blue transition-colors"><?php echo esc_html($excerpt); ?></p>
		<?php endif; ?>
	</article>

	<div class="mt-auto flex gap-4 items-center prose mx-4 lg:mx-6">
		<span class="hidden lg:inline">
			<?php get_template_part('components/button', null, ['variant' => 'grey', 'custom-class' => 'leading-none']); ?>
		</span>
		<span class="inline lg:hidden">
			<?php get_template_part('components/button', null, ['variant' => 'dark-blue', 'custom-class' => 'leading-none']); ?>
		</span>

		<span class="text-grey block leading-none text-xxs">
			Bewerkt • <?php echo get_the_modified_time('j F Y'); ?>
		</span>
	</div>
</a>