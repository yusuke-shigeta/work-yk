<h2 class="title title-head2">
  <span class="title-head2-ja <?php if (isset($title_head2_color)) echo 'text-color-' . $title_head2_color; ?>">
    <?php echo $title_head2_ja; ?>
    <?php for ($i = 0; $i < 2; $i++): ?>
      <span class="title-head2-ja-parts <?php if (isset($title_head2_color)) echo 'title-head2-ja-parts-color-' . $title_head2_color; ?>"></span>
    <?php endfor; ?>
  </span>
  <span class="title-head2-en">
    <img class="title-head2-en-img" src="<?php echo get_template_directory_uri() ?>/assets/img/<?php echo $title_head2_img_en; ?>" alt="<?php echo $title_head2_ja; ?>" width="<?php echo $title_head2_img_en_width; ?>" height="<?php echo $title_head2_img_en_height; ?>">
  </span>
</h2>