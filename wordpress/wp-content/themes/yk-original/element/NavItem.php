<?php foreach ($menu_items as $key => $item) : ?>
  <li class="navItem">
    <a class="navLink footer-navLink" href="<?php echo esc_url(home_url($item['link'])); ?>/">
      <?php echo esc_html($item['text']); ?>
    </a>
  </li>
<?php endforeach; ?>