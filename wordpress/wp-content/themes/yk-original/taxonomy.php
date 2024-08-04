<?php get_header(); ?>

<main id="main" class="site-main">

  <?php
  $tag = get_queried_object();
  echo $tag->name; // タグ名
  echo $tag->description; // タグの説明
  ?>

  <?php if (have_posts()) : ?>
    <div class="achievement-list">
      <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
          </header>

          <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
              <?php the_post_thumbnail('medium'); ?>
            </div>
          <?php endif; ?>

          <div class="entry-summary">
            <?php the_excerpt(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    </div>

    <?php the_posts_navigation(); ?>

  <?php else : ?>
    <p><?php _e('該当する投稿がありません。'); ?></p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>