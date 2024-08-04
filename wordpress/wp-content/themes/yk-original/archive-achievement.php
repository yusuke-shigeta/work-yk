<?php get_header(); ?>

<main id="page-inquiry" class="main">

  <?php
  @include(get_template_directory() . '/element/firstview.php');
  ?>

  <div class="">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php the_excerpt(); ?>
        </article>
    <?php
      endwhile;
      the_posts_navigation();
    else :
      echo '<p>実績はまだありませaaaん。</p>';
    endif;
    ?>
  </div>

</main>

<?php get_footer(); ?>