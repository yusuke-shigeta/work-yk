<footer class="footer">
  <div class="footer-inner">

    <a href="<?php echo home_url() ?>" class="logo footer-logo">
      <img src="<?php echo get_template_directory_uri() ?>/assets/img/header-logo.png" alt="Logo" width="61" height="24">
    </a>

    <ul class="footer-companyList">
      <li class="footer-companyList-item">株式会社YK</li>
      <li class="footer-companyList-item">〒157-0062</li>
      <li class="footer-companyList-item">東京都世田谷区南鳥山 7-16-102</li>
    </ul>

    <ul class="footer-snsList">
      <li class="footer-snsItem">
        <a class="link footer-snsLink" href="https://www.instagram.com/yk_design_inc/"><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-instagram-gray.png" alt="Instagram"></a>
      </li>
    </ul>

    <nav class="footer-nav">
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
          "anchor_link" => '#company',
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