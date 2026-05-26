<?php
$no_margin = $args['no-margin'] ?? false;
$margin_class = $no_margin ? '' : 'mb-6';
?>

<span class="text-normal text-white prose prose-white text-xs leading-none rounded-full bg-white/10 py-3 w-max px-4 text-center <?= esc_attr($margin_class); ?> backdrop-blur-(--blur-lg) flex justify-center items-center [&_p]:mb-0 [&_a]:no-underline [&_a:hover]:!underline [&_a:hover]:decoration-white [&_.last]:font-bold">
	<?php
	if (function_exists("rank_math_the_breadcrumbs")) {
		rank_math_the_breadcrumbs();
	}
	?>
</span>