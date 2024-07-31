<?php
// ヘッダナビゲーション用
$menu_items = [
  ['link' => '#link1', 'text' => 'Link1'],
  ['link' => '#link2', 'text' => 'Link2'],
  ['link' => '#link3', 'text' => 'Link3'],
];
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body>
  <header class="ly_header bl_header">
    <div class="ly_header_inner bl_header_inner">

      <div class="ly_header_logo bl_header_logo">
        <img src="" alt="Logo" width="160" height="60">
      </div>

      <nav class="ly_header_nav">

        <ul class="ly_header_nav_list">

          <?php foreach ($menu_items as $item) : ?>
            <li class="ly_header_nav_list_item">
              <a class="bl_header_nav_list_item_link" href="<?php echo $item['link']; ?>">
                <?php echo $item['text'] ?>
              </a>
            </li>
          <?php endforeach; ?>

        </ul>

        <a href="/" class="el_btn bl_header_nav_btn_inquiry">
          お問い合わせ
        </a>

      </nav>

    </div>
  </header>