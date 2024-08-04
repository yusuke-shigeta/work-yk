<?php get_header(); ?>

<main id="page-inquiry" class="main">

  <?php
  @include(get_template_directory() . '/element/firstview.php');
  ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('achievement-single'); ?>>
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
    ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <?php
        // 投稿日時を表示する場合
        echo '<p class="post-date">投稿日: ' . get_the_date() . '</p>';

        $tags = wp_get_post_terms(get_the_ID(), 'achievement_tag');
        if ($tags && !is_wp_error($tags)) {
          echo '<div class="post-tags">';
          echo '<span>タグ: </span>';
          foreach ($tags as $tag) {
            echo '<a href="' . esc_url(get_term_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a> ';
          }
          echo '</div>';
        } else {
          echo '<div class="post-tags">タグはありません。</div>';
        }
        ?>
    <?php
      endwhile;
    else :
      echo '<p>この実績は見つかりませんでした。</p>';
    endif;
    ?>
  </article>

</main>

<?php get_footer(); ?>