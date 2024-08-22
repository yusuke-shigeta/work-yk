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
    <div class="inner header-inner">

      <a class="logo header-logo" href="<?php echo home_url() ?>">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/header-logo.png" alt="Logo" width="61" height="24">
      </a>

      <nav class="header-nav">

        <?php
        $navList_unique_class = "header-navList";
        $menu_items = [
          "top" => [
            "link" => '',
            "text" => "TOP",
          ],
          "works" => [
            "link" => 'works',
            "text" => "施工実績",
          ],
          "company" => [
            "link" => '',
            "text" => "会社概要",
          ],
        ];
        @include(get_template_directory() . '/element/NavList.php')
        ?>

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