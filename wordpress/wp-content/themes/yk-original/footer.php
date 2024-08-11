<?php
// ヘッダナビゲーション用
$menu_items = get_menu_items_header();
?>

<footer class="footer">
  <div class="footer-inner ">
    <a class="logo footer-logo" href="<?php echo home_url() ?>">
      <img src="<?php echo get_template_directory_uri() ?>/assets/img/header-logo.png" alt="Logo" width="61" height="24">
    </a>
    <nav class="nav">
      <ul class="navList">
        <?php foreach ($menu_items as $key => $item) : ?>
          <li class="navItem">
            <a class="navLink footer-navLink" href="<?php echo esc_url(home_url($item['link'])); ?>/">
              <?php echo esc_html($item['text']); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
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
      <?php
      printf(esc_html__('© %1$s %2$s', 'yk-original'), date('Y'), get_bloginfo('name'));
      ?>
    </p>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>