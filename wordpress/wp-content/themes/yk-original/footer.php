<footer class="footer">
  <div class="footer-inner ">
    <a class="logo footer-logo" href="<?php echo home_url() ?>">
      <img src="<?php echo get_template_directory_uri() ?>/assets/img/header-logo.png" alt="Logo" width="61" height="24">
    </a>
    <nav class="nav">

      <?php
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

    </nav>
    <div class="footer-info">
      <p class="footer-info-text">株式会社YK</p>
      <p class="footer-info-text">〒000-0000</p>
      <p class="footer-info-text">住所テキストテキストテキストテキストテキスト</p>
    </div>
    <nav class="nav footer-nav">
      <ul class="navList">
        <li class="navLink navLink-sns">
          <a href=""><img src="<?php echo get_template_directory_uri() ?>/assets/img/icon-instagram-gray.png" alt="Instagram"></a>
        </li>
      </ul>
    </nav>
    <p class="footer-copyright">
      <?php printf(esc_html__('© %1$s %2$s', 'yk-original'), date('Y'), get_bloginfo('name')); ?>
    </p>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>