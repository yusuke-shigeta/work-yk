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
  $pages = [
    'top' => [
      'heading' => 'トップページ',
      'text' => [
        'トップページの1行目',
        'トップページの2行目',
        'トップページの3行目'
      ],
    ],
    'inquiry' => [
      'heading' => 'お問い合わせ',
      'text' => [
        'お問い合わせの1行目',
        'お問い合わせの2行目',
        'お問い合わせの3行目',
      ],
    ],
    'achievements' => [
      'heading' => '施工実績',
      'text' => [
        '施工実績の1行目',
        '施工実績の2行目',
        '施工実績の3行目',
      ],
    ],
  ];

  foreach ($pages as $page => $content) {
    if (is_page($page)) {
      return [
        'background_image' => get_template_directory_uri() . "/assets/img/firstview-page-{$page}.jpg",
        'heading' => $content['heading'],
        'text' => implode("<br>", $content['text']),
      ];
    }
  }

  return null;
}
