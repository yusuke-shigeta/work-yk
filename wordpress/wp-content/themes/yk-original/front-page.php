<?php get_header(); ?>

<?php
$page_slug = 'front-page'; // 取得したいページのスラッグを指定
$page = get_page_by_path($page_slug);

if ($page) {
  $post_id = $page->ID;
  $background_images = get_post_meta($post_id, 'background_images', true);
}
// デフォルトの背景画像を設定
if (empty($background_images)) {
  $background_images = [
    get_template_directory_uri() . '/assets/img/firstview-archive-work.jpg',
    get_template_directory_uri() . '/assets/img/firstview-front-page.jpg',
    get_template_directory_uri() . '/assets/img/firstview-page-contact.jpg',
  ];
}
?>

<main id="front-page" class="main">

  <section class="frontPage-firstview">
    <div class="frontPage-firstview-bg">
      <?php foreach ($background_images as $index => $image) : ?>
        <img class="frontPage-firstview-bg-img-<?php echo $index; ?>>" src="<?php echo esc_url($image) ?>" alt="Image <?php echo $index + 1; ?>" width="1440" height="700">
        <p class="frontPage-firstview-bgIndex">(00<span class="frontPage-firstview-bgIndex-number"><?php echo $index + 1; ?></span>/00<?php echo count($background_images); ?>)</p>
      <?php endforeach; ?>
    </div>
    <p class="frontPage-firstview-catchphrase">Design Your Life ｜ YK Co., Ltd.</p>
    <div class="frontPage-firstview-inner">
      <div class="frontPage-firstview-contents">
        <h2 class="frontPage-firstview-title">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/title-weAreYk.png" alt="We are YK" width="385" height="151">
        </h2>
        <p class="frontPage-firstview-text">
          私達は、持てる全てを以ってお客様にとって<br>
          ベストな解決を提案いたします。<br>
          私達が提供できるサービスは、工事関係全般...<br>
          リノベーション、アートワーク、原状回復、店舗改修、<br>
          その他日常小修繕など、小さなことでもお伺いしており、<br>
          有り難いことに今日まで多くの管理会社、<br>
          オーナー様にご愛顧いただいております。<br>
          私達の解決、デザインがお客様の生活の一助となりますように。<br>
          私達は株式会社YKです。
        </p>
      </div>
    </div>
  </section>

  <?php
  // works
  ?>
  <section class="sec">
    <div class="sec-inner">
      <?php
      $title_head2_img_en = "title-works.png";
      $title_head2_ja = "施工実績";
      $title_head2_img_en_width = "239";
      $title_head2_img_en_height = "50";
      @include(get_template_directory() . '/element/Title-head2.php');
      ?>
      <ul class="postList">
        <?php
        $args = array(
          'post_type' => 'work',
          'posts_per_page' => 3,
        );
        $works_query = new WP_Query($args);

        if ($works_query->have_posts()) :
          while ($works_query->have_posts()) : $works_query->the_post();
            $work_data = get_work_data();
            $work_images = get_work_images();
            $work_thumbnail = $work_images[0];
        ?>
            <li class="postItem">
              <img src="<?php echo  $work_thumbnail; ?>" alt="サムネイル">
              <h3 class=""><?php the_title(); ?></h3>
              <p>場所: <?php echo esc_html($custom_fields['場所']); ?></p>
              <p>建物種別: <?php echo esc_html($custom_fields['建物種別']); ?></p>
              <p>増築年数: <?php echo esc_html($custom_fields['増築年数']); ?></p>
              <p>費用: <?php echo esc_html($custom_fields['費用']); ?></p>
              <p>対象面積: <?php echo esc_html($custom_fields['対象面積']); ?></p>
              <p>工期: <?php echo esc_html($custom_fields['工期']); ?></p>
              <a href="<?php echo get_permalink(); ?>">詳細を見る</a>
            </li>
          <?php
          endwhile;
          wp_reset_postdata();
          ?>
        <?php else: ?>
          <p>施工実績がありません。</p>
        <?php endif; ?>
      </ul>
    </div>
  </section>

  <?php
  // company
  ?>
  <section class="sec">
    <div class="sec-inner">
      <?php
      $title_head2_img_en = "title-company.png";
      $title_head2_ja = "会社概要";
      $title_head2_img_en_width = "352";
      $title_head2_img_en_height = "50";
      @include(get_template_directory() . '/element/Title-head2.php');
      ?>
    </div>
  </section>

  <?php
  // contact
  ?>
  <section class="sec frontPage-contact">
    <div class="sec-inner">
      <?php
      $title_head2_img_en = "title-contact.png";
      $title_head2_ja = "お問い合わせ";
      $title_head2_img_en_width = "353";
      $title_head2_img_en_height = "50";
      @include(get_template_directory() . '/element/Title-head2.php');
      ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>