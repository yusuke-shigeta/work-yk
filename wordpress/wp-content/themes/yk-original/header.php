<?php
// ヘッダナビゲーション用
$menu_items = get_menu_items_header();
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
    <div class="header-inner">

      <a class="logo header-logo" href="<?php echo home_url() ?>">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/header-logo.png" alt="Logo" width="61" height="24">
      </a>

      <nav class="header-nav">

        <ul class="navList header-navList">

          <?php foreach ($menu_items as $key => $item) : ?>
            <li class="navItem">
              <a class="navLink footer-navLink" href="<?php echo esc_url(home_url($item['link'])); ?>/">
                <?php echo esc_html($item['text']); ?>
              </a>
            </li>
          <?php endforeach; ?>

        </ul>

        <a href="<?php echo esc_url(home_url("inquiry")); ?>/" class="btn btn-arrow btn-color-gray header-btn">
          お問い合わせ
        </a>

      </nav>

    </div>
  </header>