<?php
get_header();
?>

<main>
  <?php
  $fistview_bg = "firstview-archive-work.jpg";
  $firstview_title = get_the_title();
  @include(get_template_directory() . '/element/Firstview.php');
  ?>

  <?php
  while (have_posts()) :
    the_post();
    $work_images_before = get_work_images_before();
    $work_images_after = get_work_images_after();
  ?>
    <?php if (!empty($work_images_before) or !empty($work_images_after)): ?>
      <section class="sec work-image">
        <div class="inner inner-sec work-image-inner">

          <div class="l-tab">
            <?php if (!empty($work_images_before)): ?>
              <button class="btn btn-color-gray tab js-tab is-active" id="btn-work-image-before">施工前・中</button>
            <?php endif; ?>
            <?php if (!empty($work_images_after)): ?>
              <button class="btn btn-color-gray tab js-tab" id="btn-work-image-after">施工後</button>
            <?php endif; ?>
          </div>

          <!-- 施工前 -->
          <?php if (!empty($work_images_before)): ?>
            <div class="work-image-before" id="work-image-before">
              <div class="slider">
                <div class="slides">
                  <?php foreach ($work_images_before as $image) : ?>
                    <div class="slide">
                      <img src="<?php echo $image; ?>" />
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="pagination">
                  <?php foreach ($work_images_before as $index => $image) : ?>
                    <button class="pagination-btn <?php echo $index === 0 ? 'is-active' : ''; ?>" data-index="<?php echo $index; ?>" data-index="<?php echo $index; ?>">
                      <img src="<?php echo $image; ?>" alt="Thumbnail <?php echo $index + 1; ?>" />
                    </button>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <!-- 施工後 -->
          <?php if (!empty($work_images_after)): ?>
            <div class="work-image-after" id="work-image-after" style="display: none;">
              <div class="slider">
                <div class="slides">
                  <?php foreach ($work_images_after as $image) : ?>
                    <div class="slide">
                      <img src="<?php echo $image; ?>" />
                    </div>
                  <?php endforeach; ?>
                </div>
                <div class="pagination">
                  <?php foreach ($work_images_after as $index => $image) : ?>
                    <button class="pagination-btn <?php echo $index === 0 ? 'is-active' : ''; ?>" data-index="<?php echo $index; ?>" data-index="<?php echo $index; ?>">
                      <img src="<?php echo $image; ?>" alt="Thumbnail <?php echo $index + 1; ?>" />
                    </button>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </section>
    <?php endif; ?>

    <section class="sec work-data">
      <div class="inner inner-sec work-data-inner">
        <h2 class="work-data-title">施工実績情報</h2>
        <ul class="work-data-list">
          <?php
          $work_data = get_work_data();
          $data_keys = ['場所', '建物種別', '増築年数', '費用', '対象面積', '工期'];

          foreach ($data_keys as $key): ?>
            <?php if ($work_data[$key]): ?>

              <li class="work-data-item">
                <h3 class="work-data-item-title">
                  <?php echo esc_html($key); ?>
                </h3>
                <p class="work-data-item-text">
                  <?php echo esc_html($work_data[$key]); ?>
                </p>
              </li>

            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>

    <article class="sec article work-article">
      <div class="inner inner-sec">
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>
    </article>

    <article class="sec work-tag">
      <div class="inner inner-sec">
        <?php
        $work_tags = wp_get_post_terms(get_the_ID(), 'work_tag');
        if (!empty($work_tags) && !is_wp_error($work_tags)) :
          @include(get_template_directory() . '/element/TagList.php');
        endif;
        ?>
      </div>
    </article>

  <?php
  endwhile;
  ?>
</main>

<?php
get_footer();
?>