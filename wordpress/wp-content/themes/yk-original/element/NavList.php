<ul class="navList <?php echo $navList_unique_class ?>">
  <?php foreach ($menu_items as $key => $item) : ?>
    <li class="navItem">
      <a class="navLink" href="<?php echo esc_url(home_url($item['link'])); ?>/
      <?php echo !empty($item['anchor_link']) ? esc_html($item['anchor_link']) : ''; ?>">
        <?php echo esc_html($item['text']); ?>
        <?php if ($item['text_en']) : ?>
          <span class="navLink-text-en"><?php echo esc_html($item['text_en']); ?></span>
        <?php endif; ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>