<section class="bg-white mt-30 mb-40 pt-20 lg:pt-30 rounded-t-xl lg:rounded-t-2xl shadow-t-section">
	<div class="container prose grid grid-cols-12 gap-6 gap-y-4 lg:gap-y-6">
		<article class="flex flex-col lg:flex-row shrink-0 mb-10 lg:mb-16 items-start justify-between gap-6 col-span-12 lg:col-span-10 lg:col-start-2">
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
				'url' => get_post_type_archive_link('news'),
				'title' => get_sub_field("btn_txt"),
				'target' => '_self'
			];
			if ($link['url'] && $link['title']):
				get_template_part('components/button', null, ['variant' => 'dark-blue', 'link' => $link]);
			endif;
			?>
		</article>

		<?php
		$news_articles = get_sub_field('news_articles');

		if ($news_articles):
			foreach ($news_articles as $post):
				setup_postdata($post);

				// Use the news-card template
				get_template_part('templates/news-card');

			endforeach;

			wp_reset_postdata();
		endif;
		?>
	</div>
</section>