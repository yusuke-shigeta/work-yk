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
    'base/variables',
    'base/global',
    'header',
    'footer',
  ];

  // 共通のJavaScript
  wp_enqueue_script('jquery');
  $common_scripts = [
    'base/main',
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
    'archive-work' => is_post_type_archive('work'),
    'page-inquiry' => is_page('inquiry'),
    'single-work' => is_singular('work'),
    'taxonomy-work_tag' => is_tax(),
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
 * create_post_type_work
 *
 * @return void
 */
function create_post_type_work()
{
  // 新しい投稿タイプを追加
  register_post_type(
    'work', // 投稿タイプのスラッグ
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
      'taxonomies' => array('work_tag'),
      // URLリライトのルールを設定
      'rewrite' => ['slug' => 'works'],
      // 投稿編集画面でサポートする機能
      'supports' => ['title', 'editor', 'thumbnail', 'tags'],
      // 'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'author', 'custom-fields',]
      // 'show_in_rest' => true,
      // 'template' => [],
    ]
  );

  // タクソノミーの登録
  register_taxonomy(
    'work_tag',
    'work',
    array(
      'label' => 'タグ',
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_rest' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'works-tag'),
    )
  );
}
add_action('init', 'create_post_type_work');

define('WORK_CUSTOM_FIELDS', ['場所', '建物種別', '増築年数', '費用', '対象面積', '工期']);

function add_custom_fields_work()
{
  add_meta_box(
    'custom_fields_work',
    '施工実績詳細',
    'custom_fields_work_callback',
    'work',
    'normal',
    'default'
  );

  // 画像用のメタボックスを追加（施工前）
  add_meta_box(
    'work_images_meta_box',
    '施工実績画像（施工前）',
    'work_images_meta_box_callback',
    'work',
    'normal',
    'default'
  );

  // 画像用のメタボックスを追加（施工後）
  add_meta_box(
    'work_images_after_meta_box',
    '施工実績画像（施工後）',
    'work_images_after_meta_box_callback',
    'work',
    'normal',
    'default'
  );
}
add_action('add_meta_boxes', 'add_custom_fields_work');

/**
 * custom_fields_work_callback
 * カスタムフィールドの入力フォームを表示
 * @param WP_Post $post 現在の投稿オブジェクト
 * @return void
 */
function custom_fields_work_callback($post)
{
  wp_nonce_field(basename(__FILE__), 'custom_fields_work_nonce');

  $fields = WORK_CUSTOM_FIELDS; // Use the constant here
  foreach ($fields as $field_name) {
    $value = get_post_meta($post->ID, $field_name, true);
?>
    <p>
      <label for="<?php echo esc_attr($field_name); ?>"><?php echo esc_html(ucfirst(str_replace('_', ' ', $field_name))); ?>：</label>
      <input type="text" name="<?php echo esc_attr($field_name); ?>" id="<?php echo esc_attr($field_name); ?>" value="<?php echo esc_attr($value); ?>" />
    </p>
  <?php
  }
}

/**
 * work_images_meta_box_callback
 * 画像用のメタボックスの入力フォームを表示
 * @param WP_Post $post 現在の投稿オブジェクト
 * @return void
 */
function work_images_meta_box_callback($post)
{
  wp_nonce_field(basename(__FILE__), 'work_images_meta_box_nonce');

  // Image upload field
  $images = get_post_meta($post->ID, 'work_images', true);
  if (!is_array($images)) {
    $images = [];
  }
  ?>
  <label for="work_images">Images:</label>
  <input type="hidden" name="work_images" id="work_images" value="<?php echo esc_attr(json_encode($images)); ?>" />
  <div id="work_images_preview" style="max-width: 300px; height: auto;">
    <?php foreach ($images as $image) : ?>
      <div class="work_image_item" style="margin-bottom: 10px;">
        <img src="<?php echo esc_url($image); ?>" style="max-width: 300px; height: auto;" />
        <input type="button" class="remove_single_image_button button" value="Remove Image" />
      </div>
    <?php endforeach; ?>
  </div>
  <input type="button" id="upload_work_images_button" class="button" value="Upload Images" />
  <script>
    jQuery(document).ready(function($) {
      var mediaUploader;
      $('#upload_work_images_button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
          mediaUploader.open();
          return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
          title: 'Choose Images',
          button: {
            text: 'Choose Images'
          },
          multiple: true
        });
        mediaUploader.on('select', function() {
          var attachments = mediaUploader.state().get('selection').toJSON();
          var images = JSON.parse($('#work_images').val());
          attachments.forEach(function(attachment) {
            images.push(attachment.url);
            $('#work_images_preview').append('<div class="work_image_item" style="margin-bottom: 10px;"><img src="' + attachment.url + '" style="max-width: 100%; height: auto;" /><input type="button" class="remove_single_image_button button" value="Remove Image" /></div>');
          });
          $('#work_images').val(JSON.stringify(images));
        });
        mediaUploader.open();
      });

      $('#work_images_preview').on('click', '.remove_single_image_button', function(e) {
        e.preventDefault();
        var index = $(this).parent().index();
        var images = JSON.parse($('#work_images').val());
        images.splice(index, 1);
        $('#work_images').val(JSON.stringify(images));
        $(this).parent().remove();
      });
    });
  </script>
<?php
}

/**
 * work_images_after_meta_box_callback
 * 画像用のメタボックスの入力フォームを表示（施工後）
 * @param WP_Post $post 現在の投稿オブジェクト
 * @return void
 */
function work_images_after_meta_box_callback($post)
{
  wp_nonce_field(basename(__FILE__), 'work_images_after_meta_box_nonce');

  // Image upload field
  $images = get_post_meta($post->ID, 'work_images_after', true);
  if (!is_array($images)) {
    $images = [];
  }
?>
  <label for="work_images_after">Images:</label>
  <input type="hidden" name="work_images_after" id="work_images_after" value="<?php echo esc_attr(json_encode($images)); ?>" />
  <div id="work_images_after_preview" style="max-width: 300px; height: auto;">
    <?php foreach ($images as $image) : ?>
      <div class="work_image_item" style="margin-bottom: 10px;">
        <img src="<?php echo esc_url($image); ?>" style="max-width: 300px; height: auto;" />
        <input type="button" class="remove_single_image_button button" value="Remove Image" />
      </div>
    <?php endforeach; ?>
  </div>
  <input type="button" id="upload_work_images_after_button" class="button" value="Upload Images" />
  <script>
    jQuery(document).ready(function($) {
      var mediaUploader;
      $('#upload_work_images_after_button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
          mediaUploader.open();
          return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
          title: 'Choose Images',
          button: {
            text: 'Choose Images'
          },
          multiple: true
        });
        mediaUploader.on('select', function() {
          var attachments = mediaUploader.state().get('selection').toJSON();
          var images = JSON.parse($('#work_images_after').val());
          attachments.forEach(function(attachment) {
            images.push(attachment.url);
            $('#work_images_after_preview').append('<div class="work_image_item" style="margin-bottom: 10px;"><img src="' + attachment.url + '" style="max-width: 100%; height: auto;" /><input type="button" class="remove_single_image_button button" value="Remove Image" /></div>');
          });
          $('#work_images_after').val(JSON.stringify(images));
        });
        mediaUploader.open();
      });

      $('#work_images_after_preview').on('click', '.remove_single_image_button', function(e) {
        e.preventDefault();
        var index = $(this).parent().index();
        var images = JSON.parse($('#work_images_after').val());
        images.splice(index, 1);
        $('#work_images_after').val(JSON.stringify(images));
        $(this).parent().remove();
      });
    });
  </script>
<?php
}

/**
 * save_custom_fields_work
 * カスタムフィールドの値を保存
 * @param int $post_id 投稿ID
 * @return void
 */
function save_custom_fields_work($post_id)
{
  if (!isset($_POST['custom_fields_work_nonce']) || !wp_verify_nonce($_POST['custom_fields_work_nonce'], basename(__FILE__))) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  $fields = WORK_CUSTOM_FIELDS;
  foreach ($fields as $field) {
    if (isset($_POST[$field])) {
      update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
    }
  }
}

function save_work_images_meta_box($post_id)
{
  if (!isset($_POST['work_images_meta_box_nonce']) || !wp_verify_nonce($_POST['work_images_meta_box_nonce'], basename(__FILE__))) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (array_key_exists('work_images', $_POST)) {
    $images = json_decode(stripslashes($_POST['work_images']), true);
    if (is_array($images)) {
      update_post_meta($post_id, 'work_images', array_map('esc_url_raw', $images));
    }
  }

  if (array_key_exists('work_images_after', $_POST)) {
    $images = json_decode(stripslashes($_POST['work_images_after']), true);
    if (is_array($images)) {
      update_post_meta($post_id, 'work_images_after', array_map('esc_url_raw', $images));
    }
  }
}
add_action('save_post_work', 'save_custom_fields_work');
add_action('save_post_work', 'save_work_images_meta_box');

/**
 * get_work_data
 * 施工実績のカスタムフィールド値を取得
 * @param int $post_id 投稿ID
 * @return array カスタムフィールドの値
 */
function get_work_data($post_id = null)
{
  if (!$post_id) {
    $post_id = get_the_ID();
  }

  $fields = WORK_CUSTOM_FIELDS;
  $result = [];

  foreach ($fields as $field) {
    $result[$field] = get_post_meta($post_id, $field, true);
  }

  return $result;
}

/**
 * get_work_images_before
 * 施工実績の画像を取得
 * @param int $post_id 投稿ID
 * @return array 画像URLの配列
 */
function get_work_images_before($post_id = null)
{
  if (!$post_id) {
    $post_id = get_the_ID();
  }

  $images = get_post_meta($post_id, 'work_images', true);
  if (!is_array($images)) {
    $images = [];
  }

  return $images;
}

function get_work_images_after($post_id = null)
{
  if (!$post_id) {
    $post_id = get_the_ID();
  }

  $images = get_post_meta($post_id, 'work_images_after', true);
  if (!is_array($images)) {
    $images = [];
  }

  return $images;
}

/**
 * add_custom_fields_specific_page
 *
 * @return void
 */
function add_custom_fields_specific_page()
{
  // 特定のページスラッグを指定
  $specific_page_slug = 'front-page'; // ここにページスラッグを指定

  // 現在の投稿オブジェクトを取得
  global $post;

  if ($post && $post->post_name === $specific_page_slug) {
    add_meta_box(
      'background_image_meta_box', // ID
      'Background Images', // タイトル
      'show_background_image_meta_box', // コールバック関数
      'page', // 投稿タイプ
      'normal', // コンテキスト
      'high', // 優先度
      null, // コールバック引数
      ['__block_editor_compatible_meta_box' => true] // Gutenberg対応
    );
  }
}
add_action('add_meta_boxes', 'add_custom_fields_specific_page');

/**
 * show_background_image_meta_box
 *
 * @param  mixed $post
 * @return void
 */
function show_background_image_meta_box($post)
{
  $background_images = get_post_meta($post->ID, 'background_images', true);
  if (!is_array($background_images)) {
    $background_images = [];
  }
?>
  <label for="background_images">Background Images:</label>
  <input type="hidden" name="background_images" id="background_images" value="<?php echo esc_attr(json_encode($background_images)); ?>" />
  <div id="background_images_preview" style="max-width: 300px; height: auto;">
    <?php foreach ($background_images as $image) : ?>
      <div class="background_image_item" style="margin-bottom: 10px;">
        <img src="<?php echo esc_url($image); ?>" style="max-width: 300px; height: auto;" />
        <input type="button" class="remove_single_image_button button" value="Remove Image" />
      </div>
    <?php endforeach; ?>
  </div>
  <input type="button" id="upload_background_images_button" class="button" value="Upload Images" />
  <script>
    jQuery(document).ready(function($) {
      var mediaUploader;
      $('#upload_background_images_button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
          mediaUploader.open();
          return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
          title: 'Choose Images',
          button: {
            text: 'Choose Images'
          },
          multiple: true
        });
        mediaUploader.on('select', function() {
          var attachments = mediaUploader.state().get('selection').toJSON();
          var images = JSON.parse($('#background_images').val());
          attachments.forEach(function(attachment) {
            images.push(attachment.url);
            $('#background_images_preview').append('<div class="background_image_item" style="margin-bottom: 10px;"><img src="' + attachment.url + '" style="max-width: 100%; height: auto;" /><input type="button" class="remove_single_image_button button" value="Remove Image" /></div>');
          });
          $('#background_images').val(JSON.stringify(images));
        });
        mediaUploader.open();
      });

      $('#background_images_preview').on('click', '.remove_single_image_button', function(e) {
        e.preventDefault();
        var index = $(this).parent().index();
        var images = JSON.parse($('#background_images').val());
        images.splice(index, 1);
        $('#background_images').val(JSON.stringify(images));
        $(this).parent().remove();
      });
    });
  </script>
<?php
}

/**
 * save_background_image_meta_box
 *
 * @param  mixed $post_id
 * @return void
 */
function save_background_image_meta_box($post_id)
{
  if (array_key_exists('background_images', $_POST)) {
    $images = json_decode(stripslashes($_POST['background_images']), true);
    if (is_array($images)) {
      update_post_meta(
        $post_id,
        'background_images',
        array_map('esc_url_raw', $images)
      );
    }
  }
}
add_action('save_post', 'save_background_image_meta_box');

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
    echo "is_front_page";
  } elseif (is_home()) {
    echo "is_home";
  } elseif (is_single()) {
    echo "is_single";
    echo " (投稿タイプ: " . get_post_type() . ")";
  } elseif (is_page()) {
    echo "is_page";
  } elseif (is_category()) {
    echo "is_category";
  } elseif (is_tag()) {
    echo "is_tag";
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
      echo "is_archive";
      echo " (is_post_type_archive: " . get_post_type() . ")";
    } else {
      echo "is_archive";
    }
  } elseif (is_search()) {
    echo "is_search";
  } elseif (is_404()) {
    echo "is_404";
  } else {
    echo "その他のページタイプ";
  }
}

// 使用例：
add_action('wp_footer', function () {
  if (is_user_logged_in()) {
    echo '<div style="background: #f0f0f0; color: #333; padding: 10px; position: fixed; bottom: 0; right: 0; z-index: 9999;">';
    debug_page_type();
    echo '</div>';
  }
});
