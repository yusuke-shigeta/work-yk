<ul class="postList">
  <?php
  $args = array(
    'post_type' => 'work',
    'posts_per_page' => $posts_per_page,
  );
  $works_query = new WP_Query($args);

  if ($works_query->have_posts()) :
    while ($works_query->have_posts()) : $works_query->the_post();
      $work_data = get_work_data();
      $work_images_before = get_work_images_before();
      $work_images_after = get_work_images_after();
      $work_thumbnail = $work_images_after[0];
      $work_before = $work_images_before[0];
  ?>
      <li class="postItem">
        <a href="<?php echo get_permalink(); ?>">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full', ['class' => 'postItem-thumbnail', 'alt' => 'サムネイル']); ?>
          <?php elseif ($work_thumbnail) : ?>
            <img class="postItem-thumbnail" src="<?php echo $work_thumbnail; ?>" alt="サムネイル">
          <?php else : ?>
            <img class="postItem-thumbnail" src="<?php echo get_template_directory_uri() ?>/assets/img/firstview-archive-work.jpg" alt="サムネイル">
          <?php endif; ?>
          <h3 class="postItem-title"><?php the_title(); ?></h3>
          <p class="postItem-text">場所: <?php echo esc_html($work_data['場所']); ?></p>
          <p class="postItem-text">建物種別: <?php echo esc_html($work_data['建物種別']); ?></p>
          <p class="postItem-text">増築年数: <?php echo esc_html($work_data['増築年数']); ?></p>
          <p class="postItem-text">費用: <?php echo esc_html($work_data['費用']); ?></p>
          <p class="postItem-text">対象面積: <?php echo esc_html($work_data['対象面積']); ?></p>
          <p class="postItem-text">工期: <?php echo esc_html($work_data['工期']); ?></p>
          <?php
          $btn_color = "white";
          $btn_unique_class = "postItem-link";
          $btn_text = "詳細を見る";
          $btn_link = get_permalink();
          @include(get_template_directory() . '/element/Btn.php');
          ?>
        </a>
      </li>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
  <?php else: ?>
    <p>施工実績がありません。</p>
  <?php endif; ?>
</ul>