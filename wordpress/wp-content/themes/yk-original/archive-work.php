<?php get_header(); ?>

<main id="archive-work" class="main">

  <?php
  $fistview_bg = "firstview-archive-work.jpg";
  $firstview_title = "施工実績";
  @include(get_template_directory() . '/element/Firstview.php');
  ?>

  <section class="sec tag">
    <div class="sec-inner tag-inner">
      <?php
      $work_tags = get_terms(array(
        'taxonomy' => 'work_tag',
        'hide_empty' => false,
      ));
      ?>
      <?php if ($work_tags) : ?>
        <ul class="tag-list">
          <?php foreach ($work_tags as $tag) : ?>
            <li class="tag-item">
              <a href="<?php echo get_term_link($tag->term_id); ?>" class="tag-link"><?php echo $tag->name; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        タグは未設定です。
      <?php endif; ?>
    </div>
  </section>

  <section class="sec">
    <div class="sec-inner">
      <?php
      $posts_per_page = 6;
      @include(get_template_directory() . '/element/PostList.php')
      ?>
      <?php
      echo paginate_links(array(
        'total' => $works_query->max_num_pages,
        'current' => $paged,
        'format' => 'page/%#%/',
        'show_all' => false,
        'end_size' => 1,
        'mid_size' => 2,
        'prev_next' => true,
        'prev_text' => __('« 前へ'),
        'next_text' => __('次へ »'),
        'type' => 'plain',
        'add_args' => false,
        'add_fragment' => '',
      ));
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>