<?php
$variant = $args['variant'] ?? 'dark';
$title = $args['title'] ?? '';
$custom_class = $args['custom-class'] ?? '';
$label_classes = '';

switch ($variant) {
	case 'light':
		$variant_classes =
			' text-normal text-white text-xs leading-none rounded-full bg-white/10 py-2.5 px-4 inline-block text-center mb-6 backdrop-blur-(--blur-lg)';
		break;

	case 'dark':
		$variant_classes =
			' text-dark-blue text-xs leading-none rounded-full bg-white/10 px-4 py-3 inline-block text-center mb-6 backdrop-blur-(--blur-lg) border border-grey/20';
		break;
}

$base_classes = trim("$variant_classes $custom_class");

?>

<span class="<?= esc_attr($base_classes); ?>">
	<?= esc_html($title) ?>
</span>