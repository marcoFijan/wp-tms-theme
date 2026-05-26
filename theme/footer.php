</main>

<footer class="relative lg:pt-20 pb-12 after:bg-dark-blue after:bottom-0 after:left-0 after:h-[calc(100%-15.75rem)] after:w-full after:-z-10 after:absolute after:lg:[clip-path:circle(6000px_at_50%_calc(0%+6000px))]">
	<section class="container grid grid-cols-12 gap-6 relative mb-20 ">
		<div class="col-span-12 w-full lg:col-span-10 lg:col-start-2 bg-linear-90 from-white to-light-grey shadow-card rounded-xl grid gap-6 grid-cols-12 lg:grid-cols-10 overflow-hidden relative">
			<?php $footer_block = get_field('footer_block', 'option');
			if ($footer_block) :
				$block_txt = $footer_block['footer_block_txt'];
				$block_link  = $footer_block['footer_block_link'];
				$block_img  = $footer_block['footer_block_img'];
				$block_cameleon  = $footer_block['footer_block_cameleon'];

				if ($block_txt): ?>
					<article class="relative z-10 text-dark-blue lg:text-left mb-8 lg:mb-0 col-span-10 col-start-2 md:col-span-5 lg:col-span-3 lg:col-start-2 md:col-start-2 prose pt-14 pb-64 lg:py-26">
						<svg xmlns="http://www.w3.org/2000/svg" width="131" height="32" viewBox="0 0 131 32" fill="none" class="mb-10">
							<g clip-path="url(#clip0_1474_3284)">
								<path d="M26.8785 8.96C26.8785 4.01051 22.868 0 17.9209 0C12.9738 0 8.96094 4.01051 8.96094 8.96H26.8809H26.8785Z" fill="#D8D900" />
								<path d="M17.9199 17.92C17.9199 12.9705 21.9304 8.96 26.8799 8.96H17.9199V17.92Z" fill="#00953F" />
								<path d="M8.96 8.96C4.01051 8.96 0 12.9705 0 17.92C0 22.8695 4.01051 26.88 8.96 26.88V8.96Z" fill="#009D66" />
								<path d="M17.9209 17.92H8.96094V26.88H17.9209V17.92Z" fill="#61AEA6" />
								<path d="M0 17.92H8.96V26.88C4.01051 26.8776 0 22.8671 0 17.92Z" fill="#00965A" />
								<path d="M17.9209 17.92C12.9714 17.92 8.96094 13.9095 8.96094 8.96V17.92H17.9209Z" fill="#009DA9" />
								<path d="M8.96094 8.96C8.96094 13.9095 12.9714 17.92 17.9209 17.92V8.96H8.96094Z" fill="#6DB52C" />
								<path d="M26.877 8.96V26.88C31.8264 26.88 35.837 22.8695 35.837 17.92C35.837 12.9705 31.8264 8.96 26.877 8.96Z" fill="#00A8DF" />
								<path d="M26.8799 17.92H17.9199V26.88H26.8799V17.92Z" fill="#00A0DF" />
								<path d="M17.9199 17.92H26.8799V8.96C21.9304 8.96 17.9199 12.9705 17.9199 17.92Z" fill="#0070BA" />
								<path d="M17.9199 0V8.96H26.8799C26.8775 4.01051 22.867 0 17.9199 0Z" fill="#00953F" />
								<path d="M35.837 17.92H26.877V26.88C31.8264 26.88 35.837 22.8695 35.837 17.92Z" fill="#0090C3" />
								<path d="M44.7969 26.8776V8.96H49.8184L56.6243 21.2413H56.7636V8.96H60.618V26.8776H55.6084L48.7906 14.5939H48.6657V26.8776H44.7993H44.7969ZM68.9176 27.1274C66.8427 27.1274 65.2096 26.5102 64.0209 25.2782C62.8321 24.0462 62.2366 22.3195 62.2366 20.0982C62.2366 17.8768 62.8321 16.1501 64.0209 14.9133C65.2096 13.6741 66.8403 13.057 68.9176 13.057C70.9949 13.057 72.479 13.6886 73.6773 14.9493C74.8733 16.2125 75.4736 17.8432 75.4736 19.8412L75.3464 21.2413H65.9661C66.2759 23.0328 67.2605 23.9262 68.9176 23.9262C69.5708 23.9262 70.0679 23.8253 70.4113 23.6212C70.7547 23.417 71.0717 23.0952 71.3671 22.6534H75.2215C74.8853 23.9165 74.1552 25.0428 73.137 25.8642C72.1067 26.7047 70.7019 27.1274 68.9176 27.1274ZM65.9661 18.5564H71.7417C71.6168 17.9224 71.2878 17.3484 70.8051 16.9186C70.3152 16.4767 69.686 16.2582 68.9152 16.2582C67.4094 16.2582 66.4248 17.0242 65.9637 18.5564H65.9661ZM75.4712 26.8776L79.842 19.8436L75.7234 13.3211H79.7027L82.1522 17.531L84.6018 13.3211H88.581L84.4625 19.8436L88.8308 26.8776H84.8515L82.1522 22.2667L79.4529 26.8776H75.4736H75.4712ZM96.177 26.8776C93.348 26.8776 91.9335 25.5568 91.9335 22.9175V16.6448H89.7482V13.3211H91.9335L92.4475 9.73568H95.5358V13.3211H98.749V16.6448H95.5358V22.2667C95.5358 22.6413 95.6511 22.9511 95.8816 23.1913C96.1122 23.4338 96.4219 23.5539 96.8158 23.5539H98.749V26.8776H96.1746H96.177ZM113.679 25.0284C112.322 26.4285 110.48 27.1274 108.148 27.1274C105.817 27.1274 103.97 26.4261 102.606 25.0212C101.242 23.6188 100.56 21.6783 100.56 19.2048V8.9576H104.414V19.2048C104.414 20.6361 104.753 21.7408 105.432 22.5165C106.11 23.2898 107.015 23.6788 108.146 23.6788C109.277 23.6788 110.18 23.2898 110.857 22.5165C111.535 21.7408 111.876 20.6385 111.876 19.2048V8.9576H115.73V19.2048C115.73 21.6783 115.048 23.6188 113.684 25.026L113.679 25.0284ZM124.8 13.057C126.585 13.057 128.014 13.6669 129.094 14.8869C130.173 16.1069 130.713 17.8456 130.713 20.0958C130.713 22.346 130.173 24.0847 129.094 25.2998C128.014 26.5174 126.582 27.1249 124.8 27.1249C123.211 27.1249 121.967 26.5726 121.071 25.4631H120.946V31.9976H117.341V13.3211H120.43L120.807 14.8461H120.946C121.974 13.6549 123.259 13.0594 124.8 13.0594V13.057ZM124.03 16.2582C123.139 16.2582 122.401 16.5776 121.82 17.2212C121.239 17.8648 120.948 18.823 120.948 20.1006C120.948 21.3782 121.237 22.3412 121.815 22.98C122.401 23.614 123.139 23.931 124.032 23.931C124.925 23.931 125.66 23.6116 126.241 22.9752C126.823 22.3364 127.113 21.3806 127.113 20.1006C127.113 18.8206 126.823 17.86 126.241 17.2212C125.658 16.58 124.923 16.2582 124.032 16.2582H124.03Z" fill="#092A41" />
							</g>
							<defs>
								<clipPath id="clip0_1474_3284">
									<rect width="130.716" height="32" fill="white" />
								</clipPath>
							</defs>
						</svg>
						<?php echo $block_txt; ?>
						<?php if ($block_link) :
							$link_url = $block_link['url'];
							$link_title = $block_link['title'];
							$link_target = $block_link['target'] ? $block_link['target'] : '_self';

							if ($link_url && $link_title) :
								get_template_part('components/button', null, ['variant' => 'blue', 'link' => $block_link, 'title' => $link_title, 'target' => $link_target, 'custom-class' => 'mt-13']);
							endif;
						endif; ?>
					</article>
				<?php endif;
				if ($block_cameleon) : ?>
					<div class="absolute z-10 top-0 left-0 col-span-3 col-start-8 lg:col-start-5 h-20 lg:h-40">
						<img class="w-full h-full object-contain z-20" src="<?php echo get_template_directory_uri(); ?>/assets/media/tail.png" />
					</div>
				<?php endif;
				if ($block_img): ?>
					<div class="absolute top-1/2 lg:top-0 right-0 w-3/4 lg:w-1/2 rotate-15 z-0 flex flex-col gap-5">
						<?= wp_get_attachment_image($block_img, 'footer-img', "", array("class" => "w-full rounded-sm lg:rounded-md relative shadow-card")); ?>
						<?= wp_get_attachment_image($block_img, 'footer-img', "", array("class" => "w-full rounded-sm lg:rounded-md relative shadow-card")); ?>
					</div>
			<?php endif;
			endif; ?>
		</div>
	</section>
	<section class="container grid grid-cols-12 gap-x-6 gap-y-16 lg:gap-y-21 relative overflow-hidden">
		<div class="col-span-12 md:col-span-6 lg:col-span-3 lg:col-start-2 flex flex-col items-center md:items-start">
			<svg xmlns="http://www.w3.org/2000/svg" width="131" height="32" viewBox="0 0 131 32" fill="none">
				<g clip-path="url(#clip0_1474_3284)">
					<path d="M26.8785 8.96C26.8785 4.01051 22.868 0 17.9209 0C12.9738 0 8.96094 4.01051 8.96094 8.96H26.8809H26.8785Z" fill="#D8D900" />
					<path d="M17.9199 17.92C17.9199 12.9705 21.9304 8.96 26.8799 8.96H17.9199V17.92Z" fill="#00953F" />
					<path d="M8.96 8.96C4.01051 8.96 0 12.9705 0 17.92C0 22.8695 4.01051 26.88 8.96 26.88V8.96Z" fill="#009D66" />
					<path d="M17.9209 17.92H8.96094V26.88H17.9209V17.92Z" fill="#61AEA6" />
					<path d="M0 17.92H8.96V26.88C4.01051 26.8776 0 22.8671 0 17.92Z" fill="#00965A" />
					<path d="M17.9209 17.92C12.9714 17.92 8.96094 13.9095 8.96094 8.96V17.92H17.9209Z" fill="#009DA9" />
					<path d="M8.96094 8.96C8.96094 13.9095 12.9714 17.92 17.9209 17.92V8.96H8.96094Z" fill="#6DB52C" />
					<path d="M26.877 8.96V26.88C31.8264 26.88 35.837 22.8695 35.837 17.92C35.837 12.9705 31.8264 8.96 26.877 8.96Z" fill="#00A8DF" />
					<path d="M26.8799 17.92H17.9199V26.88H26.8799V17.92Z" fill="#00A0DF" />
					<path d="M17.9199 17.92H26.8799V8.96C21.9304 8.96 17.9199 12.9705 17.9199 17.92Z" fill="#0070BA" />
					<path d="M17.9199 0V8.96H26.8799C26.8775 4.01051 22.867 0 17.9199 0Z" fill="#00953F" />
					<path d="M35.837 17.92H26.877V26.88C31.8264 26.88 35.837 22.8695 35.837 17.92Z" fill="#0090C3" />
					<path d="M44.7969 26.8776V8.96H49.8184L56.6243 21.2413H56.7636V8.96H60.618V26.8776H55.6084L48.7906 14.5939H48.6657V26.8776H44.7993H44.7969ZM68.9176 27.1274C66.8427 27.1274 65.2096 26.5102 64.0209 25.2782C62.8321 24.0462 62.2366 22.3195 62.2366 20.0982C62.2366 17.8768 62.8321 16.1501 64.0209 14.9133C65.2096 13.6741 66.8403 13.057 68.9176 13.057C70.9949 13.057 72.479 13.6886 73.6773 14.9493C74.8733 16.2125 75.4736 17.8432 75.4736 19.8412L75.3464 21.2413H65.9661C66.2759 23.0328 67.2605 23.9262 68.9176 23.9262C69.5708 23.9262 70.0679 23.8253 70.4113 23.6212C70.7547 23.417 71.0717 23.0952 71.3671 22.6534H75.2215C74.8853 23.9165 74.1552 25.0428 73.137 25.8642C72.1067 26.7047 70.7019 27.1274 68.9176 27.1274ZM65.9661 18.5564H71.7417C71.6168 17.9224 71.2878 17.3484 70.8051 16.9186C70.3152 16.4767 69.686 16.2582 68.9152 16.2582C67.4094 16.2582 66.4248 17.0242 65.9637 18.5564H65.9661ZM75.4712 26.8776L79.842 19.8436L75.7234 13.3211H79.7027L82.1522 17.531L84.6018 13.3211H88.581L84.4625 19.8436L88.8308 26.8776H84.8515L82.1522 22.2667L79.4529 26.8776H75.4736H75.4712ZM96.177 26.8776C93.348 26.8776 91.9335 25.5568 91.9335 22.9175V16.6448H89.7482V13.3211H91.9335L92.4475 9.73568H95.5358V13.3211H98.749V16.6448H95.5358V22.2667C95.5358 22.6413 95.6511 22.9511 95.8816 23.1913C96.1122 23.4338 96.4219 23.5539 96.8158 23.5539H98.749V26.8776H96.1746H96.177ZM113.679 25.0284C112.322 26.4285 110.48 27.1274 108.148 27.1274C105.817 27.1274 103.97 26.4261 102.606 25.0212C101.242 23.6188 100.56 21.6783 100.56 19.2048V8.9576H104.414V19.2048C104.414 20.6361 104.753 21.7408 105.432 22.5165C106.11 23.2898 107.015 23.6788 108.146 23.6788C109.277 23.6788 110.18 23.2898 110.857 22.5165C111.535 21.7408 111.876 20.6385 111.876 19.2048V8.9576H115.73V19.2048C115.73 21.6783 115.048 23.6188 113.684 25.026L113.679 25.0284ZM124.8 13.057C126.585 13.057 128.014 13.6669 129.094 14.8869C130.173 16.1069 130.713 17.8456 130.713 20.0958C130.713 22.346 130.173 24.0847 129.094 25.2998C128.014 26.5174 126.582 27.1249 124.8 27.1249C123.211 27.1249 121.967 26.5726 121.071 25.4631H120.946V31.9976H117.341V13.3211H120.43L120.807 14.8461H120.946C121.974 13.6549 123.259 13.0594 124.8 13.0594V13.057ZM124.03 16.2582C123.139 16.2582 122.401 16.5776 121.82 17.2212C121.239 17.8648 120.948 18.823 120.948 20.1006C120.948 21.3782 121.237 22.3412 121.815 22.98C122.401 23.614 123.139 23.931 124.032 23.931C124.925 23.931 125.66 23.6116 126.241 22.9752C126.823 22.3364 127.113 21.3806 127.113 20.1006C127.113 18.8206 126.823 17.86 126.241 17.2212C125.658 16.58 124.923 16.2582 124.032 16.2582H124.03Z" fill="white" />
				</g>
				<defs>
					<clipPath id="clip0_1474_3284">
						<rect width="130.716" height="32" fill="white" />
					</clipPath>
				</defs>
			</svg>
			<?php $address = get_field('footer_address', 'option');
			if ($address) : ?>
				<article class="prose text-xs text-grey text-center md:text-left mb-11 mt-8">
					<?php the_field('footer_address', 'option'); ?>
				</article>
			<?php endif ?>

			<?php
			$footer_contact = get_field('footer_contact', 'option');
			if ($footer_contact) :
				$contact_phone = $footer_contact['contact_phone'];
				$contact_mail  = $footer_contact['contact_mail'];
			?>
				<?php if (!empty($contact_phone)) : ?>
					<a href="tel:+31<?php echo esc_attr($contact_phone); ?>" class="flex group gap-3 mb-3 items-center text-xs">
						<span class="font-icons-filled text-green">call</span>
						<span class="text-white text-bold group-hover:text-green transition-colors duration-300"><?php echo esc_html($contact_phone); ?></span>
					</a>
				<?php endif; ?>

				<?php if (!empty($contact_mail)) : ?>
					<a href="mailto:<?php echo esc_attr($contact_mail); ?>" class="flex group gap-3 items-center text-xs">
						<span class="font-icons-filled text-green">forward_to_inbox</span>
						<span class="text-white text-bold group-hover:text-green transition-colors duration-300"><?php echo esc_html($contact_mail); ?></span>
					</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="col-span-12 md:col-span-6 lg:col-span-2 lg:col-start-5">
			<?php
			// Get all nextup_tms categories
			$tms_categories = get_terms([
				'taxonomy' => 'nextup_tms_category',
				'hide_empty' => true, // Only show categories that have posts
			]);

			if ($tms_categories && !is_wp_error($tms_categories)) : ?>
				<div data-accordion data-single="true" class="space-y-2">
					<?php
					$i = 1;
					foreach ($tms_categories as $term) :
						$title = $term->name;

						// Fetch posts in this category
						$posts_args = [
							'post_type'      => 'nextup_tms',
							'posts_per_page' => -1,
							'post_status'    => 'publish',
							'tax_query'      => [
								[
									'taxonomy' => 'nextup_tms_category',
									'field'    => 'term_id',
									'terms'    => $term->term_id,
								],
							],
						];
						$posts = get_posts($posts_args);
					?>
						<div class="text-white m-0 -mt-2">
							<span
								role="button"
								tabindex="0"
								class="group w-full flex justify-between md:justify-start items-center p-0 gap-4 py-3 text-left cursor-pointer select-none relative md:after:hidden after:absolute after:w-double-screen-height after:left-1/2 after:-translate-1/2 after:bottom-1 after:h-px after:bg-white/10"
								data-panel>
								<span class="font-bold text-sm py-3 lg:py-0"><?php echo esc_html($title); ?></span>

								<div class="relative aspect-square h-footer-accordion flex items-center justify-center">
									<span class="absolute block w-full h-2px transition-all duration-200 bg-green"></span>
									<span class="absolute block w-full h-2px transition-all duration-200 rotate-90 group-aria-expanded:rotate-0 bg-green group-aria-expanded:bg-red"></span>
								</div>
							</span>

							<div
								id="panel-<?php echo $i; ?>"
								role="region"
								aria-labelledby="accordion-<?php echo $i; ?>"
								class="overflow-hidden transition-all duration-300"
								style="max-height: 0px;">
								<div class="py-3 text-sm text-grey space-y-1">
									<?php if ($posts) : ?>
										<ul class="grid gap-2 mb-5 lg:gap-y-1 grid-cols-(--grid-cols-auto-fit-12)">
											<?php foreach ($posts as $post) : setup_postdata($post); ?>
												<li class="group">
													<a href="<?php the_permalink(); ?>"
														class="block w-full text-xs group-hover:translate-x-1 group-hover:text-white cursor-pointer transition-all duration-300"
														target="_self">
														<?php echo esc_html(get_the_title()); ?>
													</a>
												</li>
											<?php endforeach;
											wp_reset_postdata(); ?>
										</ul>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php
						$i++;
					endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-span-12 md:col-span-6 lg:col-span-2 lg:col-start-7">
			<?php $footer_nav = get_field('footer_nav', 'option');
			if ($footer_nav) : ?>
				<div data-accordion data-single="true" class="space-y-2 grid grid-cols-[repeat(auto-fill,minmax(10rem,1fr))]">
					<?php
					$i = 1;
					foreach ($footer_nav as $nav) :
						$title = $nav['nav_title'];
						$links = $nav['nav_links'];
					?>

						<div class=" text-white m-0">
							<span class="text-white font-bold text-sm"><?php echo esc_html($title); ?></span>
							<div class="py-4 text-xs text-grey">
								<?php if ($links) : ?>
									<ul class="lg:mb-6 lg:py-1">
										<?php foreach ($links as $row) :
											$link = $row['nav_link'];
											if ($link) : ?>
												<li class="group">
													<a
														href="<?php echo esc_url($link['url']); ?>"
														class="block w-full group-hover:translate-x-1 py-1 lg:py-0.5 group-hover:text-white cursor-pointer transition-all duration-300"
														target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
														<?php echo esc_html($link['title']); ?>
													</a>
												</li>
										<?php endif;
										endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						</div>
					<?php
						$i++;
					endforeach; ?>

				</div>
			<?php endif; ?>
		</div>
		<div class="col-span-12 lg:col-span-3 lg:col-start-9">
			<div class="w-full bg-white rounded-md px-8 pb-12 pt-10">
				<?php $txt = get_field('footer_cta_txt', "option");
				if ($txt): ?>
					<article class="prose mb-8 text-dark-blue">
						<?php the_field("footer_cta_txt", "option"); ?>
					</article>
				<?php endif; ?>

				<?php $link = get_field('footer_cta_link', "option");
				if ($link) :
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';

					if ($link_url && $link_title) :
						get_template_part('components/button', null, ['variant' => 'green', 'link' => $link, 'title' => $link_title, 'target' => $link_target]);
					endif;
				endif; ?>
			</div>
		</div>
	</section>
	<section class="container grid grid-cols-12 gap-6 mt-17">
		<div class="col-span-12 col-start-1 lg:col-span-10 lg:col-start-2 flex justify-between items-center flex-wrap gap-4">
			<?php
			$footer_bottom = get_field('footer_bottom', 'option');
			if ($footer_bottom) :
				$footer_company = $footer_bottom['footer_company'];
				$footer_links = $footer_bottom['footer_bottom_links'];
			?>

				<?php if ($footer_company) : ?>
					<span class="text-grey text-xs">&copy; <?php echo date('Y'); ?> <?php echo esc_html($footer_company); ?></span>
				<?php endif; ?>


				<?php if ($footer_links) : ?>
					<ul class="flex gap-6">
						<?php foreach ($footer_links as $link) :
							$link = $link['link'];
							if ($link) : ?>
								<li class="group">
									<a
										href="<?php echo esc_url($link['url']); ?>"
										class="block text-xs w-full text-grey group-hover:text-white cursor-pointer transition-colors duration-300"
										target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
										<?php echo esc_html($link['title']); ?>
									</a>
								</li>
						<?php endif;
						endforeach; ?>
					</ul>
				<?php endif; ?>
			<?php endif ?>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>
</body>

</html>