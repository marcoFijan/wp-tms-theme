<?php
$post_id = get_the_ID();

$title        = get_field('title', $post_id);
$local_video  = get_field('local_video', $post_id);
$video_file   = get_field('video_file', $post_id);
$video_url    = get_field('video_url', $post_id);
$thumbnail_id = get_field('thumbnail', $post_id);
$thumbnail_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : '';

$date       	= get_the_date();
$author_id 		= get_post_field('post_author', $post_id);
$author 			= get_the_author_meta('display_name', $author_id);
$categories 	= get_the_terms(get_the_ID(), 'category_news');

$video_offset	= '5rem';
?>

<section style="margin-bottom: -<?php echo $video_offset; ?>;">
	<div class="flex flex-col pb-20 pt-header-offset lg:pt-header-offset-lg relative">
		<div class="bg-dark-blue absolute z-0 top-0 left-0 w-full h-full">
			<canvas class="h-full w-full z-0 absolute left-0 top-0 gradient-canvas"
				style="
				--gradient-color-1: <?php echo esc_attr(get_field('gradient_color_1')); ?>;
				--gradient-color-2: <?php echo esc_attr(get_field('gradient_color_2')); ?>;
				--gradient-color-3: <?php echo esc_attr(get_field('gradient_color_3')); ?>;
				--gradient-color-4: <?php echo esc_attr(get_field('gradient_color_4')); ?>;
			">
			</canvas>

			<img
				class="w-full h-full object-cover absolute top-0 left-0 z-20 opacity-5"
				src="<?php echo get_template_directory_uri(); ?>/assets/media/heroOverlay.jpg"
				alt="" />
			<div class="w-full h-full bg-blue opacity-60 z-30 absolute top-0 left-0"></div>
		</div>

		<div class="container px-6 w-full relative z-10 grid grid-cols-12 gap-grid pt-16">
			<article class="col-span-12 lg:col-span-8 lg:col-start-3 text-white text-center flex flex-col items-center gap-6 prose" style="padding-bottom: <?php echo $video_offset; ?>;">
				<h1 class="text-white"><?php the_title(); ?></h1>
				<div class="flex flex-wrap gap-x-6 gap-y-2 w-full items-center justify-center text-white">
					<span class="flex gap-2 items-center justify-center"><span class="font-icons">history</span><span><?php echo esc_html($date); ?></span></span>
					<span class="flex gap-2 items-center justify-center"><span class="font-icons-filled">person_edit</span><span><?php echo esc_html($author); ?></span></span>
					<?php if ($categories): ?>
						<span class="flex gap-2 items-center justify-center"><span class="font-icons-filled">style</span>
							<span>
								<?php
								echo esc_html(
									implode(', ',	wp_list_pluck($categories, 'name'))
								);
								?>
							</span>
						</span>
					<?php endif; ?>
				</div>
			</article>
		</div>
	</div>

	<!-- Video -->
	<div class="container grid grid-cols-12 gap-grid " style="transform: translateY(-<?php echo $video_offset; ?>);">
		<div data-media-video class="col-span-12 lg:col-span-8 lg:col-start-3 rounded-md lg:rounded-lg overflow-hidden aspect-video bg-white shadow-card relative lg:mb-12">
			<?php if ($local_video && $video_file): ?>
				<?php if ($thumbnail_url): ?>
					<div class="video-thumbnail relative w-full h-full z-10 top-0 left-0">
						<button data-play title="Speel video af" class="z-10 rounded-full after:!border-0 transition-all after:bg-white hover:after:bg-dark-blue hover:text-white  w-min p-6 lg:p-10 gradient-border-yellow-blue cursor-pointer text-dark-blue absolute left-1/2 top-1/2 -translate-1/2">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 18" fill="none" class="relative z-20 aspect-square w-4 lg:w-6">
								<path d="M15 7.19916C16.3333 7.96896 16.3333 9.89346 15 10.6633L3 17.5915C1.66667 18.3613 -8.94676e-07 17.399 -8.27378e-07 15.8594L-2.21695e-07 2.00301C-1.54397e-07 0.463409 1.66667 -0.498841 3 0.270959L15 7.19916Z" fill="currentColor" />
							</svg>
						</button>
						<img
							src="<?php echo esc_url($thumbnail_url); ?>"
							alt="<?php echo esc_attr($title); ?>"
							class="absolute top-0 left-0 w-full h-full object-cover brightness-50" />
					</div>
				<?php endif; ?>
				<video
					class="w-full h-full object-cover"
					preload="metadata"
					<?php if ($thumbnail_url) : ?>poster="<?php echo esc_url($thumbnail_url); ?>" <?php endif; ?>>
					<source src="<?php echo esc_url($video_file); ?>" type="video/mp4">
					Your browser ondersteunt het videobestand niet.
				</video>

			<?php elseif ($video_url): ?>
				<div class="video-embed h-full w-full relative"
					data-video-url="<?php echo esc_url($video_url); ?>"
					data-video-loaded="false">
					<div class="video-consent text-center flex flex-col justify-center items-center prose h-full p-16 relative z-20 ">
						<p class="text-sm lg:text-3xl text-dark-blue font-bold">Voor deze video worden cookies ingeladen.</p>
						<p class="text-xs lg:text-md text-grey mb-4 lg:mb-8">Accepteer de cookies om de video te bekijken</p>

						<?php get_template_part(
							'components/button',
							null,
							[
								'variant' => 'dark-blue',
								'title'   => 'Accepteer optionele cookies',
								'data-attribute' => [
									'video-accept' => 'true'
								]
							]
						); ?>
					</div>

					<?php if ($thumbnail_url): ?>
						<div class="video-thumbnail relative w-full h-full z-10 top-0 left-0">
							<button data-play title="Speel video af" class="z-10 rounded-full after:!border-0 transition-all after:bg-white hover:after:bg-dark-blue hover:text-white  w-min p-6 lg:p-10 gradient-border-yellow-blue cursor-pointer text-dark-blue absolute left-1/2 top-1/2 -translate-1/2">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 18" fill="none" class="relative z-20 aspect-square w-4 lg:w-6">
									<path d="M15 7.19916C16.3333 7.96896 16.3333 9.89346 15 10.6633L3 17.5915C1.66667 18.3613 -8.94676e-07 17.399 -8.27378e-07 15.8594L-2.21695e-07 2.00301C-1.54397e-07 0.463409 1.66667 -0.498841 3 0.270959L15 7.19916Z" fill="currentColor" />
								</svg>
							</button>
							<img
								src="<?php echo esc_url($thumbnail_url); ?>"
								alt="<?php echo esc_attr($title); ?>"
								class="absolute top-0 left-0 w-full h-full object-cover brightness-50" />
						</div>
					<?php endif; ?>

				</div>
			<?php endif; ?>
		</div>
	</div>



</section>