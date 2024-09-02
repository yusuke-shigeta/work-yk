<?php get_header(); ?>

<main id="archive-work" class="main">

  <?php
  $fistview_bg = "firstview-archive-work.jpg";
  $firstview_title = "施工実績";
  @include(get_template_directory() . '/element/Firstview.php');
  ?>

  <article class="tag">
    <div class="inner tag-inner">
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
  </article>

  <section class="sec">
    <div class="inner inner-sec">
      <ul class="postList">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'work',
          'posts_per_page' => 6,
          'paged' => $paged
        );
        $works_query = new WP_Query($args);

        if ($works_query->have_posts()) :
          while ($works_query->have_posts()) : $works_query->the_post();
            @include(get_template_directory() . '/element/PostList.php');
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </ul>
      <?php
      @include(get_template_directory() . '/element/Pagination.php');
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>