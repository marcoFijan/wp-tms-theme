<?php
if (! defined('ABSPATH')) {
  exit;
}

if (! defined('MF_THEME_VERSION')) {
  define('MF_THEME_VERSION', '1.0.0');
}

require_once get_template_directory() . '/inc/cpt.php';

/**
 * Enqueue scripts and styles.
 */
function custom_theme_scripts()
{
  $css_path = '/assets/css/main.css';
  $js_path  = '/assets/js/main.js';

  $css_version = file_exists(get_template_directory() . $css_path) ? filemtime(get_template_directory() . $css_path) : MF_THEME_VERSION;
  $js_version  = file_exists(get_template_directory() . $js_path) ? filemtime(get_template_directory() . $js_path) : MF_THEME_VERSION;

  wp_enqueue_style('main', get_template_directory_uri() . $css_path, [], $css_version);
  wp_enqueue_script('main', get_template_directory_uri() . $js_path, [], $js_version, true);

  // Localize script for AJAX (Migrated from old file)
  if (is_post_type_archive('news')) {
    wp_localize_script('main', 'newsArchiveData', [
      'ajaxUrl' => admin_url('admin-ajax.php'),
      'nonce'   => wp_create_nonce('filter_news_nonce')
    ]);
  }

  wp_dequeue_style('wp-block-library');
  wp_dequeue_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'custom_theme_scripts');

/**
 * Login page logo
 */
function custom_login_logo()
{ ?>
  <style type="text/css">
    #login h1 a {
      background-size: 0px 0px;
      width: 0px;
      height: 0px;
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');

/**
 * Custom setup
 */
function custom_theme_setup()
{
  register_nav_menu('primary', 'Primary Menu');
  register_nav_menu('footer', 'Footer Menu');

  add_editor_style('assets/css/editor.css');
  add_theme_support('admin-bar', ['callback' => '__return_false']);

  // Base image sizes
  add_image_size('landscape', 1920, 1080, true);
  add_image_size('landscape-wide', 1440, 680, true);
  add_image_size('square-sm', 500, 500, true);
  add_image_size('landscape-xs', 519, 224, true);
  add_image_size('landscape-sm', 550, 240, true);

  // Migrated image sizes from old file
  add_image_size('medium', 300, 300, true);
  add_image_size('Medium-Groot', 600, 600, true);
  add_image_size('Afbeelding small', 306, 170, true);
  add_image_size('Afbeelding medium', 700, 380, true);
  add_image_size('Afbeelding wide', 1100, 450, true);
}
add_action('after_setup_theme', 'custom_theme_setup');

/**
 * Menu function
 *
 * @param string $menu_location The theme location identifier.
 * @return array Hierarchical array of menu items.
 */
function get_menu($menu_location)
{
  $locations = get_nav_menu_locations();
  if (empty($locations[$menu_location])) {
    return [];
  }

  $menu = wp_get_nav_menu_object($locations[$menu_location]);
  if (!$menu || is_wp_error($menu)) {
    return [];
  }

  $items = wp_get_nav_menu_items($menu->term_id);
  if (!$items || is_wp_error($items)) {
    return [];
  }

  $current_object_id = get_queried_object_id();
  $current_post_type = get_post_type($current_object_id);

  if (is_tax()) {
    $queried_object = get_queried_object();
    if (!empty($queried_object->taxonomy)) {
      $taxonomy = get_taxonomy($queried_object->taxonomy);
      if (!empty($taxonomy->object_type)) {
        $current_post_type = $taxonomy->object_type[0];
      }
    }
  }

  $archive_url = $current_post_type ? get_post_type_archive_link($current_post_type) : false;

  $menu_array = [];
  $items_dict = [];

  foreach ($items as $item) {
    $is_current = (!is_archive() && (int) $item->object_id === (int) $current_object_id)
      || ($archive_url && $item->url === $archive_url);

    $classes = array_filter((array) $item->classes);
    if ($is_current) {
      $classes[] = 'current-menu-item';
    }
    $classes_str = implode(' ', array_unique($classes));

    $items_dict[$item->ID] = [
      'ID'        => $item->ID,
      'object_id' => $item->object_id,
      'title'     => $item->title,
      'url'       => $item->url,
      'target'    => !empty($item->target) ? "target={$item->target}" : '',
      'classes'   => $classes_str ? " {$classes_str}" : '',
      'icon'      => function_exists('get_field') ? get_field('icon', $item) : '',
      'children'  => []
    ];
  }

  foreach ($items as $item) {
    if (empty($item->menu_item_parent)) {
      $menu_array[$item->ID] = &$items_dict[$item->ID];
    } else {
      if (isset($items_dict[$item->menu_item_parent])) {
        $items_dict[$item->menu_item_parent]['children'][] = &$items_dict[$item->ID];
      }
    }
  }

  return $menu_array;
}

/**
 * Remove function that removes admin bar margin
 */
remove_action('get_header', 'remove_admin_bar_spacing');

/**
 * Remove media upload button
 */
remove_action('media_buttons', 'media_buttons');

/**
 * Text editor customization (Merged logic)
 */
function custom_tinymce_settings($settings)
{
  $settings['body_class'] = 'prose font-sans';
  $settings['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6';

  // Styles formats from old file
  $style_formats = [
    [
      'title' => 'Paragraaf grootte',
      'items' => [
        ['title' => 'Medium', 'selector' => 'p, li', 'attributes' => ['class' => 'text-md']],
        ['title' => 'Klein', 'selector' => 'p, li', 'attributes' => ['class' => 'text-xs']],
        ['title' => 'Extra klein', 'selector' => 'p, li', 'attributes' => ['class' => 'text-xxs']],
        ['title' => 'Medium - Geen alinea afstand', 'selector' => 'p, li', 'attributes' => ['class' => 'text-md mb-0']],
        ['title' => 'Klein - Geen alinea afstand', 'selector' => 'p, li', 'attributes' => ['class' => 'text-xs mb-0']],
        ['title' => 'Extra klein - Geen alinea afstand', 'selector' => 'p, li', 'attributes' => ['class' => 'text-xxs mb-0']],
      ]
    ],
    [
      'title' => 'Kleur',
      'items' => [
        ['title' => 'Zwart', 'inline' => 'span', 'attributes' => ['class' => 'text-black']],
        ['title' => 'Donkerblauw', 'inline' => 'span', 'attributes' => ['class' => 'text-dark-blue']],
        ['title' => 'Grijs', 'inline' => 'span', 'attributes' => ['class' => 'text-grey']],
        ['title' => 'Wit', 'inline' => 'span', 'attributes' => ['class' => 'text-white']],
        ['title' => 'Paars gradient', 'inline' => 'span', 'attributes' => ['class' => 'bg-(image:--purple-gradient) block bg-clip-text bg-clip-text--fix text-transparent w-fit']],
        ['title' => 'Groen gradient', 'inline' => 'span', 'attributes' => ['class' => 'bg-(image:--green-gradient) block bg-clip-text bg-clip-text--fix text-transparent w-fit']],
      ]
    ],
    [
      'title' => 'Lijst vormgeving',
      'items' => [
        ['title' => 'USP met opvulling', 'selector' => 'ul', 'attributes' => ['class' => 'usp-filled']],
        ['title' => 'USP met uitlijning', 'selector' => 'ul', 'attributes' => ['class' => 'usp']],
      ]
    ],
  ];

  $settings['style_formats'] = json_encode($style_formats);

  return $settings;
}
add_filter('tiny_mce_before_init', 'custom_tinymce_settings');

/**
 * Change default page template name
 */
add_filter('default_page_template_title', function () {
  return 'Selecteer een template in de rechter zijbalk';
});

/**
 * ACF JSON Save Point
 */
function theme_acf_json_save_point($path)
{
  return get_stylesheet_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'theme_acf_json_save_point');

/**
 * ACF JSON Load Point
 */
function theme_acf_json_load_point($paths)
{
  unset($paths[0]);
  $paths[] = get_stylesheet_directory() . '/acf-json';
  return $paths;
}
add_filter('acf/settings/load_json', 'theme_acf_json_load_point');

/**
 * Modify ACF/ACFE modules
 */
function custom_remove_acfe_modules()
{
  acf_update_setting('acfe/modules/post_types', false);
  acf_update_setting('acfe/modules/taxonomies', false);
  acf_update_setting('acfe/modules/block_types', false);
  acf_update_setting('acfe/modules/categories', false);
  acf_update_setting('acfe/modules/forms', false);
  acf_update_setting('acfe/modules/options_pages', false);
  acf_update_setting('acfe/modules/performance', true);
}
add_action('acf/init', 'custom_remove_acfe_modules');

add_filter('acf/settings/enable_post_types', '__return_false');

/**
 * Flexible content thumbnails
 */
function custom_acf_layout_thumbnail($thumbnail, $field, $layout)
{
  $image_name = str_replace('_', '-', $layout['name']);
  return get_stylesheet_directory_uri() . '/assets/images/blocks/' . $image_name . '.webp';
}
add_filter('acfe/flexible/thumbnail/name=flexible_content', 'custom_acf_layout_thumbnail', 10, 3);

/* --------------------------------------------------------------------------
 * MIGRATED LOGIC FROM OLD FUNCTIONS.PHP
 * -------------------------------------------------------------------------- */

/**
 * Fetch news posts with category filtering
 */
add_action('pre_get_posts', function ($query) {
  if (!is_admin() && $query->is_main_query() && is_post_type_archive('news')) {
    $query->set('posts_per_page', 6);
    $query->set('orderby', 'date');
    $query->set('order', 'DESC');

    // Handle category filter
    if (isset($_GET['cat_news']) && !empty($_GET['cat_news'])) {
      $category_ids = explode(',', sanitize_text_field($_GET['cat_news']));
      $category_ids = array_map('intval', $category_ids);

      if (!empty($category_ids)) {
        $query->set('tax_query', [
          [
            'taxonomy' => 'category_news',
            'field'    => 'term_id',
            'terms'    => $category_ids,
            'operator' => 'IN'
          ]
        ]);
      }
    }
  }
});

/**
 * AJAX handler for news filtering
 */
add_action('wp_ajax_filter_news', 'ajax_filter_news');
add_action('wp_ajax_nopriv_filter_news', 'ajax_filter_news');

function ajax_filter_news()
{
  check_ajax_referer('filter_news_nonce', 'nonce');

  $categories = isset($_POST['categories']) ? sanitize_text_field($_POST['categories']) : '';
  $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

  $args = [
    'post_type' => 'news',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged
  ];

  // Add category filter if categories are selected
  if (!empty($categories)) {
    $category_ids = explode(',', $categories);
    $category_ids = array_map('intval', $category_ids);

    if (!empty($category_ids)) {
      $args['tax_query'] = [
        [
          'taxonomy' => 'category_news',
          'field'    => 'term_id',
          'terms'    => $category_ids,
          'operator' => 'IN'
        ]
      ];
    }
  }

  $query = new WP_Query($args);

  // Capture template output
  ob_start();
  get_template_part('templates/news-grid', null, ['query' => $query]);
  $html = ob_get_clean();

  wp_send_json_success(['html' => $html]);
}

/**
 * Rank Math breadcrumb separator
 */
add_filter('rank_math/frontend/breadcrumb/settings', function ($settings) {
  $settings['separator'] = '<span class="font-icons-filled -translate-y-4">chevron_right</span>';
  return $settings;
});

/**
 * WPML floating language switcher
 */
function wpml_floating_language_switcher()
{
  if (!function_exists('icl_get_languages')) return;
  $languages = icl_get_languages('skip_missing=0&orderby=code');
  if (empty($languages)) return;

  $active_lang = null;
  foreach ($languages as $lang) {
    if ($lang['active']) {
      $active_lang = $lang;
      break;
    }
  }
  include get_template_directory() . '/components/languageToggle.php';
}

/**
 * Custom breadcrumbs for NextUp TMS
 */
add_filter('rank_math/frontend/breadcrumb/items', function ($crumbs, $class) {

  if (is_singular('nextup_tms')) {
    global $post;

    $crumbs[1][0] = __("NextUp TMS", "NextUp");
    $crumbs[1][1] = get_post_type_archive_link('nextup_tms');

    $terms = get_the_terms($post->ID, 'nextup_tms_category');
    if ($terms && !is_wp_error($terms)) {
      $main_term = $terms[0];
      $term_crumbs = [];

      if ($main_term->parent) {
        $parent = get_term($main_term->parent, 'nextup_tms_category');
        if ($parent && !is_wp_error($parent)) {
          $term_crumbs[] = [$parent->name, get_term_link($parent)];
        }
      }

      $term_crumbs[] = [$main_term->name, get_term_link($main_term)];
      array_splice($crumbs, -1, 0, $term_crumbs);
    }
  }

  if (is_tax('nextup_tms_category')) {
    $term = get_queried_object();
    $crumbs[1][0] = __("NextUp TMS", "NextUp");
    $crumbs[1][1] = get_post_type_archive_link('nextup_tms');

    $term_crumbs = [];
    if ($term->parent) {
      $parent = get_term($term->parent, 'nextup_tms_category');
      if ($parent && !is_wp_error($parent)) {
        $term_crumbs[] = [$parent->name, get_term_link($parent)];
      }
    }
    $term_crumbs[] = [$term->name, get_term_link($term)];
    array_pop($crumbs);

    $crumbs = array_merge($crumbs, $term_crumbs);
  }

  return $crumbs;
}, 10, 2);
