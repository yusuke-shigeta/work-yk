<?php get_header(); ?>

<main id="front-page" class="main">

  <?php
  // firstview
  ?>
  <div class="firstview">
    <div class="firstview-bg">

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

      <?php foreach ($background_images as $index => $image) : ?>
        <img class="firstview-bg-img-<?php echo $index; ?>>" src="<?php echo esc_url($image) ?>" alt="Image <?php echo $index + 1; ?>" width="1440" height="700">
        <p class="firstview-bgIndex">(00<span class="firstview-bgIndex-number"><?php echo $index + 1; ?></span>/00<?php echo count($background_images); ?>)</p>
      <?php endforeach; ?>

    </div>
    <p class="firstview-catchphrase">Design Your Life ｜ YK Co., Ltd.</p>
    <div class="firstview-inner">
      <div class="firstview-contents">
        <h2 class="firstview-title">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/title-weAreYk.png" alt="We are YK" width="385" height="151">
        </h2>
        <p class="firstview-text">
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
  </div>

  <?php
  // works
  ?>

  <section class="works">
    <div class="inner inner-sec works-inner">

      <?php
      $title_head2_ja = "施工実績";
      $title_head2_color = "main";
      $title_head2_img_en = "title-works.svg";
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
        $work_query = new WP_Query($args);

        if ($work_query->have_posts()) :
          while ($work_query->have_posts()) : $work_query->the_post();
            @include(get_template_directory() . '/element/PostList.php');
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </ul>

      <div class="l-works-btn">
        <?php
        $btn_color = "gray";
        $btn_unique_class = "works-btn";
        $btn_text = "全ての施工実績を見る";
        $btn_link = esc_url(home_url("works"));

        @include(get_template_directory() . '/element/Btn.php');
        ?>
      </div>

    </div>
  </section>

  <?php
  // company
  ?>

  <section id="company" class="company">
    <div class="inner inner-sec company-inner">
      <?php
      $title_head2_ja = "会社概要";
      $title_head2_color = "main";
      $title_head2_img_en = "title-company.svg";
      $title_head2_img_en_width = "123";
      $title_head2_img_en_height = "67";

      @include(get_template_directory() . '/element/Title-head2.php');
      ?>
      <ul class="company-list">

        <?php
        $company_list = [
          '商号' => '株式会社 YK',
          '代表取締役' => '山内　直義',
          '所在地' => '〒157-0062<br>東京都世田谷区南鳥山 7-16-102',
          'Tel' => '03-6795-8733',
          'Fax' => '03-6795-8733',
        ];
        ?>

        <?php foreach ($company_list as $title => $text) : ?>
          <li class="company-item">
            <h3 class="company-item-title"><?php echo $title; ?></h3>
            <p class="company-item-text"><?php echo $text; ?></p>
          </li>
        <?php endforeach; ?>

      </ul>
    </div>
  </section>

  <?php
  // contact
  ?>

  <section class="contact">
    <div class="inner inner-sec contact-inner">
      <?php
      $title_head2_ja = "お問い合わせ";
      $title_head2_color = "white";
      $title_head2_img_en = "title-contact.svg";
      $title_head2_img_en_width = "353";
      $title_head2_img_en_height = "50";

      @include(get_template_directory() . '/element/Title-head2.php');
      ?>

      <?php
      $btn_color = "white";
      $btn_unique_class = "contact-btn";
      $btn_text = "お問い合わせする";
      $btn_link = esc_url(home_url("contact"));

      @include(get_template_directory() . '/element/Btn.php');
      ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>