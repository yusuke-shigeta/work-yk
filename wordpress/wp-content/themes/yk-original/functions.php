<?php

/**
 * remove_default_post_type_menu
 * デフォルトの「投稿」と「コメント」メニューを非表示にする
 * @return void
 */
function remove_default_post_type_menu()
{
  remove_menu_page('edit.php');  // 「投稿」メニューを削除
  remove_menu_page('edit-comments.php');  // 「コメント」メニューを削除
}
add_action('admin_menu', 'remove_default_post_type_menu');

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

/**
 * theme_setup
 *
 * @return void
 */
function theme_setup()
{
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

/**
 * create_post_type_achievement
 *
 * @return void
 */
function create_post_type_achievement()
{
  // 新しい投稿タイプを追加
  register_post_type(
    'achievement', // 投稿タイプのスラッグ
    [
      // 管理画面での表示名を設定する配列
      'labels' => [
        'name' => __('施工実績'),
        'singular_name' => __('施工実績')
      ],
      // 投稿タイプを一般公開するかどうか
      'public' => true,
      // アーカイブページを持つかどうか
      'has_archive' => true,
      // タグを出力
      'taxonomies' => array('achievement_tag'),
      // URLリライトのルールを設定
      'rewrite' => ['slug' => 'achievements'],
      // 投稿編集画面でサポートする機能
      'supports' => ['title', 'editor', 'thumbnail', 'custom-fields', 'tags'], // 修正: tagsを追加
      // 'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'author', 'custom-fields',]
      // 'show_in_rest' => true,
      // 'template' => [],
    ]
  );

  // タクソノミーの登録
  register_taxonomy(
    'achievement_tag',
    'achievement',
    array(
      'label' => 'タグ',
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'achievement-tag'),
    )
  );
}
add_action('init', 'create_post_type_achievement');
