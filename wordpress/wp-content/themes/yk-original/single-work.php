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
  <article class="sec">
    <div class="sec-inner">

      <?php
      $work_images_before = get_work_images_before();
      $work_images_after = get_work_images_after();
      $work_data = get_work_data();

      // echo "<pre>";
      // print_r($work_images_before);
      // echo "<pre>";
      // print_r($work_images_after);
      // echo "<pre>";
      // print_r($work_data);
      ?>

      <div class="tab">
        <button class="btn btn-color-gray" id="btn-work-image-before">施工前</button>
        <button class="btn btn-color-gray" id="btn-work-image-after">施工後</button>
      </div>

      <!-- 施工前 -->
      <div id="work-image-before">
        <div class="swiper mySwiper2">
          <div class="swiper-wrapper">
            <?php foreach ($work_images_before as $image) : ?>
              <div class="swiper-slide">
                <img src="<?php echo $image; ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div thumbsSlider="" class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php foreach ($work_images_before as $image) : ?>
              <div class="swiper-slide">
                <img src="<?php echo $image; ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- 施工後 -->
      <div id="work-image-after" style="display: none;">
        <div class="swiper mySwiper4">
          <div class="swiper-wrapper">
            <?php foreach ($work_images_after as $image) : ?>
              <div class="swiper-slide">
                <img src="<?php echo $image; ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div thumbsSlider="" class="swiper mySwiper3">
          <div class="swiper-wrapper">
            <?php foreach ($work_images_after as $image) : ?>
              <div class="swiper-slide">
                <img src="<?php echo $image; ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <?php
      $work_tags = wp_get_post_terms(get_the_ID(), 'work_tag');
      if (!empty($work_tags) && !is_wp_error($work_tags)) :
        @include(get_template_directory() . '/element/TagList.php');
      endif;
      ?>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

    </div>
  </article>
<?php
endwhile;
?>

<?php
get_footer();
?>