<?php get_header(); ?>

<?php
$page_slug = 'front-page'; // 取得したいページのスラッグを指定
$page = get_page_by_path($page_slug);

if ($page) {
  $post_id = $page->ID;
  $background_images = get_post_meta($post_id, 'background_images', true);

  if (is_array($background_images)) {
    foreach ($background_images as $image) {
      // echo '<img src="' . esc_url($image) . '" style="max-width: 100%; height: auto;" />';
    }
  } else {
    echo 'No images found.';
  }
} else {
  echo 'Page not found.';
}
?>

<main id="front-page" class="main">

  <section class="frontPage-firstview">
    <div class="frontPage-firstview-bg">
      <?php foreach ($background_images as $index => $image) : ?>
        <img class="frontPage-firstview-bg-img-<?php echo $index; ?>>" src="<?php echo esc_url($image) ?>" alt="Image <?php echo $index + 1; ?>" width="1440" height="700">
      <?php endforeach; ?>
    </div>
    <div class="frontPage-firstview-inner">
      <div class="frontPage-firstview-contents">
        <h2 class="frontPage-firstview-title">
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
      施工実績
    </div>
  </section>

  <?php
  // companyoverview
  ?>
  <section class="sec">
    <div class="sec-inner">
      会社概要
    </div>
  </section>

  <?php
  // inquiry
  ?>
  <section class="sec">
    <div class="sec-inner">
      お問い合わせ
    </div>
  </section>

</main>

<?php get_footer(); ?>