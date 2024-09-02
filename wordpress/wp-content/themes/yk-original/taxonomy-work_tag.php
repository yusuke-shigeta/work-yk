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

        if (have_posts()) :
          while (have_posts()) : the_post();
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