<?php
$work_data = get_work_data();
$work_images_before = get_work_images_before();
$work_images_after = get_work_images_after();
$work_thumbnail = $work_images_after[0];
$work_before = $work_images_before[0];
?>
<li class="postItem">
  <a class="postItem-inner js-post-link" href="<?php echo get_permalink(); ?>">
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('full', ['class' => 'postItem-thumbnail', 'alt' => 'サムネイル']); ?>
    <?php elseif ($work_thumbnail) : ?>
      <img class="postItem-thumbnail" src="<?php echo $work_thumbnail; ?>" alt="サムネイル">
    <?php else : ?>
      <img class="postItem-thumbnail" src="<?php echo get_template_directory_uri() ?>/assets/img/firstview-archive-work.jpg" alt="サムネイル">
    <?php endif; ?>
    <h3 class="postItem-title"><?php the_title(); ?></h3>
    <ul class="postItem-dataList">
      <?php
      $data_keys = ['場所', '建物種別', '増築年数', '費用', '対象面積', '工期'];
      foreach ($data_keys as $key): ?>
        <?php if ($work_data[$key]): ?>
          <li class="postItem-dataItem"><?php echo esc_html($key); ?>: <?php echo esc_html($work_data[$key]); ?></li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
    <?php
    $btn_color = "white";
    $btn_unique_class = "postItem-btn";
    $btn_text = "詳細を見る";
    $btn_link = get_permalink();
    @include(get_template_directory() . '/element/Btn.php');
    ?>
  </a>
</li>