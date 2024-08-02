<?php get_header(); ?>

<main id="front-page" class="main">

  <?php
  @include(get_template_directory() . '/element/firstview.php');
  ?>

  <?php
  // achievements
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