<?php
// ヘッダナビゲーション用
$menu_items = [
  ['link' => '', 'text' => 'TOP'],
  ['link' => 'achievement', 'text' => '施工実績'],
  ['link' => '', 'text' => '会社概要'],
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
  <header class="header">
    <div class="inner-header">

      <div class="logo logo-header">
        <img src="" alt="Logo" width="160" height="60">
      </div>

      <nav class="nav-header">

        <ul class="navList navList-header">

          <?php foreach ($menu_items as $item) : ?>
            <li class="navItem navItem-header">
              <a class="navLink navLink-header" href="<?php echo esc_url(home_url($item['link'])); ?>/">
                <?php echo esc_html($item['text']); ?>
              </a>
            </li>
          <?php endforeach; ?>

        </ul>

        <a href="<?php echo esc_url(home_url("inquiry")); ?>/" class="btn btn-inquiry">
          お問い合わせ
        </a>

      </nav>

    </div>
  </header>