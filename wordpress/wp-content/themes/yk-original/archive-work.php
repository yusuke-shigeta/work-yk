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
        'orderby' => 'count',
        'order' => 'DESC',
        'number' => 10,
      ));
      ?>
      <?php if ($work_tags) : ?>
        <?php @include(get_template_directory() . '/element/TagList.php'); ?>
      <?php else: ?>
        タグは未設定です。
      <?php endif; ?>
    </div>
  </section>

  <section class="sec">
    <div class="sec-inner">
      <?php
      $posts_per_page = 6;
      @include(get_template_directory() . '/element/PostList.php');
      @include(get_template_directory() . '/element/Pagination.php');
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>