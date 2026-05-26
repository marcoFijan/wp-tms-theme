<?php
// Get ACF fields
$quote  = get_sub_field('quote');   // Textarea field
$author = get_sub_field('author');  // Text field

// Only render if there is content
if ($quote || $author) :
?>
	<section class="container grid grid-cols-12 gap-x-grid">
		<div class="col-span-12 lg:col-span-8 lg:col-start-3 p-6 lg:px-8 lg:py-10 bg-white shadow-card rounded-sm border-l-4 border-green">
			<blockquote class="prose mb-2 text-md font-medium">
				<?php echo esc_html($quote); ?>
			</blockquote>
			<?php if ($author) : ?>
				<span class="font-icons-filled translate-y-1.5 inline-block text-xl">format_quote</span>
				<p class="font-bold text-md inline-block"><?php echo esc_html($author); ?></p>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>