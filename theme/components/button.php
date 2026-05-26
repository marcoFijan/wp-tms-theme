<?php
$variant       	= $args['variant'] ?? '';
$link_arg      	= $args['link'] ?? null;
$url           	= $args['url']  ?? '';
$title         	= $args['title'] ?? '';
$custom_class  	= $args['custom-class'] ?? '';
$custom_icon   	= $args['icon'] ?? '';
$data_attribute = $args['data-attribute'] ?? '';


if (is_array($link_arg)) {
	$url    = $link_arg['url']    ?? $url;
	$title  = $link_arg['title']  ?? $title;
	$target = $link_arg['target'] ?? '_self';
} elseif (is_string($link_arg) && !empty($link_arg)) {
	$url    = $link_arg;
	$target = $args['target'] ?? '_self';
} else {
	$target = $args['target'] ?? '_self';
}

if (empty($title) && is_array($link_arg)) {
	$title = $link_arg['title'] ?? '';
}

// --- Variants ---
switch ($variant) {
	case 'dark-blue':
		$button_classes = 'bg-dark-blue text-light-grey group-hover:bg-light-grey group-hover:text-dark-blue hover:bg-light-grey hover:text-dark-blue';
		break;
	case 'white':
		$button_classes = 'bg-white text-dark-blue group-hover:bg-dark-blue group-hover:text-white hover:bg-dark-blue hover:text-white';
		break;
	case 'white-border':
		$button_classes = 'bg-white text-dark-blue group-hover:bg-light-grey hover:bg-light-grey border border-light-grey';
		break;
	case 'grey':
		$button_classes = 'bg-light-grey text-dark-blue group-hover:bg-dark-blue group-hover:text-light-grey hover:bg-dark-blue hover:text-light-grey';
		break;
	case 'green':
		$button_classes = 'bg-green text-white group-hover:contrast-125 hover:contrast-125';
		break;
	case 'blue':
		$button_classes = 'bg-blue text-white group-hover:bg-dark-blue hover:bg-dark-blue hover:contrast-125';
		break;
	default:
		$button_classes = '';
}

$padding = empty($title) ? 'px-4' : 'px-6';
$grouping = empty($title) && empty($url) ? '' : 'group';
$base_classes = trim("text-md leading-(--line-height-loose) py-4 {$padding} {$grouping} gap-2 -tracking-md box-border rounded-full cursor-pointer flex items-center w-fit no-underline font-medium transition-colors  {$button_classes} {$custom_class}");

// Build data attribute string
$data_attr_str = '';
if (!empty($data_attribute) && is_array($data_attribute)) {
	foreach ($data_attribute as $attr => $value) {
		$data_attr_str .= ' data-' . esc_attr($attr) . '="' . esc_attr($value) . '"';
	}
}
?>


<?php if (empty($url)): ?>
	<button class="<?= esc_attr($base_classes); ?>" <?= $data_attr_str; ?>>
		<?= esc_html($title) ?>
		<span class="font-icons-filled transition-transform block text-md">
			<?= $custom_icon ? esc_html($custom_icon) : 'arrow_right_alt'; ?>
		</span>
	</button>
<?php else: ?>
	<a href="<?= esc_url($url); ?>"
		target="<?= esc_attr($target); ?>"
		class="<?= esc_attr($base_classes); ?>"
		title="<?= esc_attr($title); ?>" <?= $data_attr_str; ?>>
		<?= esc_html($title) ?>
		<span class="font-icons-filled transition-transform  block text-md">
			<?= $custom_icon ? esc_html($custom_icon) : 'arrow_right_alt'; ?>
		</span>
	</a>
<?php endif; ?>