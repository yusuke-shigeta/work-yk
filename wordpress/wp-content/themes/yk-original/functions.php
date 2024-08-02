<?php // css, jsの読み込み
/**
 * wp_enqueue_styles
 * css読み込み
 * @return void
 */
function wp_enqueue_styles()
{
  $theme_version = wp_get_theme()->get('Version');

  $commons = ['reset'];

  foreach ($commons as $common) {
    wp_enqueue_style(
      $common,
      get_template_directory_uri() . "/assets/css/{$common}.css",
      array(),
      $theme_version
    );
  }

  $page_types = [
    'front-page' => is_front_page(),
    'page-achievements' => is_page('achievements'),
    'page-inquiry' => is_page('inquiry'),
  ];

  foreach ($page_types as $type => $condition) {
    if ($condition) {
      wp_enqueue_style(
        $type,
        get_template_directory_uri() . "/assets/css/{$type}.css",
        array('reset'),
        $theme_version
      );
    }
  }
}
add_action('wp_enqueue_scripts', 'wp_enqueue_styles');

/**
 * enqueue_jquery
 * jQueryの読み込み
 * @return void
 */
function enqueue_jquery()
{
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');
?>

<?php // firstviewを各ページで出しわけ
function get_firstview_background_image()
{
  if (is_front_page()) {
    return get_template_directory_uri() . '/assets/img/firstview-front-page.jpg';
  } elseif (is_page('inquiry')) {
    return get_template_directory_uri() . '/assets/img/firstview-inquiry.jpg';
  } else {
    return get_template_directory_uri() . '/assets/img/firstview-default.jpg';
  }
}
?>