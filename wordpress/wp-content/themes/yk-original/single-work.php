<?php
get_header();

while (have_posts()) :
  the_post();
?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="entry-h1">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </h1>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <?php
    // タグの出力
    $tags = wp_get_post_terms(get_the_ID(), 'work_tag');
    if (!empty($tags) && !is_wp_error($tags)) :
    ?>
      <div class="entry-tags">
        <h3>タグ：</h3>
        <?php
        foreach ($tags as $tag) {
          echo '<a href="' . esc_url(get_term_link($tag)) . '">' . esc_html($tag->name) . '</a> ';
        }
        ?>
      </div>
    <?php endif; ?>

  </article>
<?php
endwhile;

get_footer();
?>