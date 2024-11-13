<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body>
  <header class="header">
    <div class="inner header-inner">

      <a class="logo l-header-logo" href="<?php echo home_url() ?>">
        <span class="header-logo"><img src="<?php echo get_template_directory_uri() ?>/assets/img/header-logo.png" alt="Logo" width="30" height="30"></span>
        <span class="header-logo-text"><img src="<?php echo get_template_directory_uri() ?>/assets/img/header-logo-text.png" alt="株式会社YK" width="120" height="70"></span>
      </a>

      <nav class="header-nav">

        <?php
        $navList_unique_class = "header-navList";
        $menu_items = [
          "top" => [
            "link" => '',
            "text" => "トップ",
          ],
          "works" => [
            "link" => 'works',
            "text" => "施工実績",
          ],
          "company" => [
            "link" => '',
            "anchor_link" => '#company',
            "text" => "会社概要",
          ],
        ];
        @include(get_template_directory() . '/element/NavList.php')
        ?>

        <ul class="header-snsList">
          <li class="header-snsItem">
            <a class="link header-snsLink" href="https://www.instagram.com/yk_design_inc/"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-instagram-gray.png" alt="Instagram"></a>
          </li>
        </ul>

        <?php
        $btn_color = "gray";
        $btn_unique_class = "header-btn";
        $btn_text = "お問い合わせ";
        $btn_link = esc_url(home_url("contact"));
        @include(get_template_directory() . '/element/Btn.php');
        ?>

      </nav>

    </div>
  </header>