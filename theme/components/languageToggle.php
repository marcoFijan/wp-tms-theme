<?php if (!defined('ABSPATH')) exit; ?>

<div class="wpml-floating-language-switcher relative">
	<input type="checkbox" id="lang-switcher-toggle" class="hidden peer">
	<label for="lang-switcher-toggle" class="lg:text-white relative z-50 text-dark-blue text-xxs flex items-center peer-checked:rounded-b-sm peer-checked:rounded-t-none peer-checked:lg:rounded-t-sm peer-checked:lg:rounded-b-none transition-all duration-300 justify-center gap-1 leading-none rounded-sm bg-light-grey lg:bg-white/10 py-4 px-6 lg:py-2.5 lg:px-4 text-center backdrop-blur-(--blur-lg) cursor-pointer">
		<span class="font-icons-filled">public</span>
		<span class="font-bold text-xxs uppercase leading-(--line-height-loose)"><?php echo esc_html($active_lang['language_code']); ?></span>
		<span class="font-icons-filled">expand_more</span>
	</label>

	<ul class="max-h-0 invisible peer-checked:max-h-20 peer-checked:visible transition-all duration-200 absolute bottom-full lg:bottom-auto lg:top-full right-0 bg-light-grey lg:bg-white/10 rounded-sm rounded-b-none lg:rounded-b-sm lg:rounded-tr-none shadow-sm overflow-hidden min-w-8 z-40">
		<?php foreach ($languages as $lang): ?>
			<li class="<?php echo $lang['active'] ? 'text-bold' : ''; ?>">
				<a href="<?php echo esc_url($lang['url']); ?>" class="block px-4 py-2.5 text-dark-blue lg:text-white text-xs hover:bg-white hover:text-dark-blue transition-colors">
					<?php echo esc_html($lang['native_name']); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>