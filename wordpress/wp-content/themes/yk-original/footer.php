<footer class="footer">
  <div class="footer-inner">

    <div class="footer-info">
      <a class="logo footer-info-logo" href="<?php echo home_url() ?>">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/header-logo.png" alt="Logo" width="61" height="24">
      </a>
      <p class="footer-info-text">株式会社YK</p>
      <p class="footer-info-text">〒000-0000</p>
      <p class="footer-info-text">住所テキストテキストテキストテキストテキスト</p>
      <a class="footer-info-sns" href="">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-instagram-gray.png" alt="Instagram">
      </a>
    </div>

    <nav class="nav">
      <?php
      $navList_unique_class = "footer-navList";
      $menu_items = [
        "top" => [
          "link" => '',
          "text" => 'トップ',
          "text_en" => 'Top'
        ],
        "works" => [
          "link" => 'works',
          "text" => "施工実績",
          "text_en" => "Works",
        ],
        "company" => [
          "link" => '',
          "text" => "会社概要",
          "text_en" => "Company",
        ],
      ];

      @include(get_template_directory() . '/element/NavList.php')
      ?>
    </nav>

    <p class="footer-copyright">
      <?php printf(esc_html__('© %1$s %2$s', 'yk-original'), date('Y'), get_bloginfo('name')); ?>
    </p>

  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>