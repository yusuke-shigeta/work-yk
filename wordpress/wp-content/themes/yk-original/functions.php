<?php

/**
 * wp_enqueue_styles
 * css読み込み
 * @return void
 */
function wp_enqueue_styles()
{
  $theme_version = wp_get_theme()->get('Version');

  $commons = [
    'base/reset',
    'element/nav',
    'element/btn',
    'header',
    'footer',
    'layout/main',
    'layout/sec',
  ];

  foreach ($commons as $common) {
    wp_enqueue_style(
      $common,
      get_template_directory_uri() . "/assets/css/{$common}.css",
      array(),
      $theme_version
    );
  }

  $page_types = [
    'page-top' => is_page('top'),
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

/**
 * get_firstview_data
 * // firstviewのコンテンツを出しわけ
 * @return void
 */
function get_firstview_data()
{
  $pages = ['top', 'inquiry', 'achievements'];
  $data = [];

  foreach ($pages as $page) {
    $data[$page] = [
      'image' => "firstview-page-{$page}.jpg",
      'heading' => [
        'top' => 'トップページ',
        'inquiry' => 'お問い合わせ',
        'achievements' => '施工実績',
      ][$page],
      'text' => [
        'top' => [
          'トップページの1行目',
          'トップページの2行目',
          'トップページの3行目',
        ],
        'inquiry' => [
          'お問い合わせの1行目',
          'お問い合わせの2行目',
          'お問い合わせの3行目',
        ],
        'achievements' => [
          '施工実績の1行目',
          '施工実績の2行目',
          '施工実績の3行目',
        ],
      ][$page],
    ];
  }

  $current_page = '';
  foreach ($pages as $page) {
    if (is_page($page)) {
      $current_page = $page;
      break;
    }
  }

  if (isset($data[$current_page])) {
    return [
      'background_image' => get_template_directory_uri() . '/assets/img/' . $data[$current_page]['image'],
      'heading' => $data[$current_page]['heading'],
      'text' => implode("<br>", $data[$current_page]['text']),
    ];
  }

  return null;
}
