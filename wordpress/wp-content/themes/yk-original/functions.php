<?php // wp_head()の不要なタグを除去
// 外部ブログツールからの投稿を受け入れ
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
// バージョン表記
remove_action('wp_head', 'wp_generator');

/**
 * remove_recent_comment_css
 * ウィジェット「最近のコメント」の表示
 * @return void
 */
function remove_recent_comment_css()
{
  global $wp_widget_factory;
  remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comment_css');
?>

<?php // css, jsの読み込み
/**
 * wp_enqueue_styles
 * css読み込み
 * @return void
 */
function wp_enqueue_styles()
{
  $theme_version = wp_get_theme()->get('Version');

  $commons = ['reset', 'header', 'footer'];

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
    'page' => is_page()
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