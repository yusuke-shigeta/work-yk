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

        // カスタムフィールドがある場合の例
        $client = get_post_meta(get_the_ID(), 'client', true);
        if ($client) {
          echo '<p class="client">クライアント: ' . esc_html($client) . '</p>';
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