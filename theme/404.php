<?php get_header(); ?>

<section class="container lg:grid lg:grid-cols-12">
	<div class="lg:col-start-2 lg:col-end-12">
		<div class="prose">
			<?php the_field('txt', 'options_404'); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>