<?php
get_header();
?>

<?php
$fistview_bg = "firstview-archive-work.jpg";
$firstview_title = get_the_title();
@include(get_template_directory() . '/element/Firstview.php');
?>

<?php
while (have_posts()) :
  the_post();
?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <?php
    $work_tags = wp_get_post_terms(get_the_ID(), 'work_tag');
    if (!empty($work_tags) && !is_wp_error($work_tags)) :
    ?>
      <?php @include(get_template_directory() . '/element/TagList.php'); ?>
    <?php endif; ?>

  </article>
<?php
endwhile;
?>

<?php
get_footer();
?>