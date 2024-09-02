<?php get_header(); ?>

<main id="main" class="site-main">
  <?php
  $tag = get_queried_object();
  $tag_name = $tag->name;
  $tag_description = $tag->description;
  ?>

  <?php
  $fistview_bg = "firstview-archive-work.jpg";
  $firstview_title = $tag_name;
  @include(get_template_directory() . '/element/Firstview.php');
  ?>

  <section class="sec">
    <div class="inner inner-sec">

      <ul class="postList">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'work',
          'posts_per_page' => 6,
          'paged' => $paged,
          'tax_query' => array(
            array(
              'taxonomy' => 'work_tag',
              'field'    => 'slug',
              'terms'    => $tag->slug,
            ),
          ),
        );
        $work_query = new WP_Query($args);

        if ($work_query->have_posts()) :
          while ($work_query->have_posts()) : $work_query->the_post();
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