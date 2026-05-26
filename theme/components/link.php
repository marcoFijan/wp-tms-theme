<?php
$link_url     = $args['link_url'] ?? '#';
$link_title   = $args['link_title'] ?? '';
$link_target  = $args['link_target'] ?? '_self';
?>

<a
	href="<?= esc_url($link_url); ?>"
	target="<?= esc_attr($link_target); ?>"
	title="<?= esc_html($link_title); ?>"
	style="--subtitle: '<?= esc_html($link_title); ?>';"
	class="group text-dark-blue hover:text-blue flex gap-4 items-baseline transition-all relative px-0 py-0 lg:px-0 lg:py-0 no-underline w-max">
	<div class="inline-block">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 117 64" fill="none" class="h-2.5 -translate-x-2 group-hover:translate-x-0 transition-all">
			<rect y="26" width="78" height="11" fill="currentColor" class="transition-transform duration-300 transform origin-right group-hover:scale-x-130" />
			<path d="M84.1074 31.3291L84.1045 31.3311L84.3291 31.5557L52.7783 63.1074L45 55.3291L68.7754 31.5537L45 7.77832L52.7783 0L84.1074 31.3291Z" fill="currentColor" />
		</svg>
	</div>
	<span class="relative font-bold text-md text-transparent -translate-x-2 group-hover:translate-x-0 transition no-underline group-hover:text-blue after:content-[var(--subtitle)] group-hover:after:text-transparent after:absolute after:top-0 after:left-0 after:font-medium after:text-dark-blue after:group-hover:text-transparent">
		<?= esc_html($link_title); ?>
	</span>
</a>