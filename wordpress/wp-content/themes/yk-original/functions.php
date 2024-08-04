<?php

/**
 * remove_default_post_type_menu
 * デフォルトのメニューを非表示にする
 * @return void
 */
function remove_default_post_type_menu()
{
  // 「投稿」メニューを削除
  remove_menu_page('edit.php');
  // 「コメント」メニューを削除
  remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_default_post_type_menu');

/**
 * theme_setup
 * アイキャッチ画像を有効化
 * @return void
 */
function theme_setup()
{
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

/**
 * enqueue_styles_and_scripts
 * CSSとJavaScriptの読み込み
 * @return void
 */
function enqueue_styles_and_scripts()
{
  // 共通のCSS
  $common_styles = [
    'base/reset',
    'element/nav',
    'element/btn',
    'element/header',
    'element/footer',
    'layout/main',
    'layout/sec',
  ];

  // 共通のJavaScript
  wp_enqueue_script('jquery');
  $common_scripts = [
    'base/main',
    // 'element/header',
  ];

  foreach ($common_styles as $style) {
    wp_enqueue_style(
      $style,
      get_template_directory_uri() . "/assets/css/{$style}.css",
    );
  }

  foreach ($common_scripts as $script) {
    wp_enqueue_script(
      $script,
      get_template_directory_uri() . "/assets/js/{$script}.js",
    );
  }


  // ページ特有のアセット（CSSとJS）
  $page_specific_assets = [
    'front-page' => is_front_page(),
    'archive-achievement' => is_post_type_archive('achievement'),
    'page-inquiry' => is_page('inquiry'),
    'single-achievement' => is_singular('achievement'),
    'taxonomy-achievement_tag' => is_tax(),
  ];

  foreach ($page_specific_assets as $asset => $condition) {
    if ($condition) {
      wp_enqueue_style(
        $asset,
        get_template_directory_uri() . "/assets/css/{$asset}.css"
      );
      wp_enqueue_script(
        $asset,
        get_template_directory_uri() . "/assets/js/{$asset}.js",
      );
    }
  }
}
add_action('wp_enqueue_scripts', 'enqueue_styles_and_scripts');

/**
 * get_firstview_data
 * firstviewのコンテンツを出しわけ
 * @return void
 */
function get_firstview_data()
{
  $pages = [
    'front-page' => [
      'condition' => is_front_page(),
      'background_image' => 'firstview-front-page.jpg',
      'heading' => 'トップページ',
      'text' => [
        'トップページ1',
        'トップページ2',
        'トップページ3',
      ],
    ],
    'archive-achievement' => [
      'condition' => is_post_type_archive('achievement'),
      'background_image' => 'firstview-archive-achievement.jpg',
      'heading' => '施工実績',
      'text' => [
        '施工実績1',
        '施工実績2',
        '施工実績3',
      ],
    ],
    'page-inquiry' => [
      'condition' => is_page('inquiry'),
      'background_image' => 'firstview-page-inquiry.jpg',
      'heading' => 'お問い合わせ',
      'text' => [
        'お問い合わせ1',
        'お問い合わせ2',
        'お問い合わせ3',
      ],
    ],
  ];

  foreach ($pages as $page => $data) {
    if ($data['condition']) {
      return [
        'background_image' => get_template_directory_uri() . "/assets/img/{$data['background_image']}",
        'heading' => $data['heading'],
        'text' => implode('<br>', $data['text']),
      ];
    }
  }

  return null;
}

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
      'supports' => ['title', 'editor', 'thumbnail', 'tags'],
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
      'rewrite' => array('slug' => 'achievements-tag'),
    )
  );
}
add_action('init', 'create_post_type_achievement');


/**
 * add_custom_fields_achievement
 * 施工実績のカスタムフィールドを追加
 * @return void
 */
function add_custom_fields_achievement()
{
  add_meta_box(
    'custom_fields_achievement',
    '施工実績詳細',
    'custom_fields_achievement_callback',
    'achievement',
    'normal',
    'default'
  );
}
add_action('add_meta_boxes', 'add_custom_fields_achievement');

/**
 * custom_fields_achievement_callback
 * カスタムフィールドの入力フォームを表示
 * @param WP_Post $post 現在の投稿オブジェクト
 * @return void
 */
function custom_fields_achievement_callback($post)
{
  wp_nonce_field(basename(__FILE__), 'custom_fields_achievement_nonce');

  $fields = [
    'client_name' => [
      'label' => 'クライアント名',
      'type' => 'text'
    ],
    'project_date' => [
      'label' => 'プロジェクト日付',
      'type' => 'date'
    ]
  ];

  foreach ($fields as $field_name => $field_data) {
    $value = get_post_meta($post->ID, $field_name, true);
?>
    <p>
      <label for="<?php echo esc_attr($field_name); ?>"><?php echo esc_html($field_data['label']); ?>：</label>
      <input type="<?php echo esc_attr($field_data['type']); ?>" name="<?php echo esc_attr($field_name); ?>" id="<?php echo esc_attr($field_name); ?>" value="<?php echo esc_attr($value); ?>" />
    </p>
<?php
  }
}

/**
 * save_custom_fields_achievement
 * カスタムフィールドの値を保存
 * @param int $post_id 投稿ID
 * @return void
 */
function save_custom_fields_achievement($post_id)
{
  if (!isset($_POST['custom_fields_achievement_nonce']) || !wp_verify_nonce($_POST['custom_fields_achievement_nonce'], basename(__FILE__))) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  $fields = ['client_name', 'project_date'];

  foreach ($fields as $field) {
    if (isset($_POST[$field])) {
      update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
    }
  }
}
add_action('save_post_achievement', 'save_custom_fields_achievement');

/**
 * get_custom_fields_achievement
 * 施工実績のカスタムフィールド値を取得
 * @param int $post_id 投稿ID
 * @return array カスタムフィールドの値
 */
function get_custom_fields_achievement($post_id = null)
{
  if (!$post_id) {
    $post_id = get_the_ID();
  }

  $fields = ['client_name', 'project_date'];
  $result = [];

  foreach ($fields as $field) {
    $result[$field] = get_post_meta($post_id, $field, true);
  }

  return $result;
}

/**
 * debug_page_type
 * ログイン時、開いているページのページタイプを出力
 * @return void
 */
function debug_page_type()
{
  if (is_front_page() && is_home()) {
    echo "デフォルトのホームページ";
  } elseif (is_front_page()) {
    echo "静的フロントページ";
  } elseif (is_home()) {
    echo "ブログページ";
  } elseif (is_single()) {
    echo "単一投稿ページ";
    echo " (投稿タイプ: " . get_post_type() . ")";
  } elseif (is_page()) {
    echo "固定ページ";
  } elseif (is_category()) {
    echo "カテゴリーアーカイブページ";
  } elseif (is_tag()) {
    echo "タグアーカイブページ";
  } elseif (is_tax()) {
    echo "タクソノミーアーカイブページ";
    if (is_post_type_tax()) {
      echo "タクソノミーアーカイブページ";
      $term = get_queried_object();
      $taxonomy = get_taxonomy($term->taxonomy);
      if ($taxonomy) {
        echo " (タクソノミー: " . $term->taxonomy . ", 投稿タイプ: " . implode(', ', $taxonomy->object_type) . ")";
      }
    }
  } elseif (is_archive()) {
    if (is_post_type_archive()) {
      echo "カスタム投稿タイプのアーカイブページ";
      echo " (投稿タイプ: " . get_post_type() . ")";
    } else {
      echo "アーカイブページ";
    }
  } elseif (is_search()) {
    echo "検索結果ページ";
  } elseif (is_404()) {
    echo "404ページ";
  } else {
    echo "その他のページタイプ";
  }
}

// 使用例：
add_action('wp_footer', function () {
  if (is_user_logged_in()) {
    echo '<div style="background: #f0f0f0; color: #333; padding: 10px; position: fixed; bottom: 0; right: 0; z-index: 9999;">';
    echo "現在のページタイプ: ";
    debug_page_type();
    echo '</div>';
  }
});
