<?php
// firstview

$firstview_data = get_firstview_data();
$firstview_bg_image = $firstview_data['background_image'];
$firstview_heading = $firstview_data['heading'];
$firstview_text = $firstview_data['text'];
?>

<section style="background-image: url(<?php echo $firstview_bg_image; ?>)" class="sec">
  <div class="sec-inner">
    <h1><?php echo $firstview_heading; ?></h1>
    <?php if ($firstview_text) : ?>
      <p>
        <?php echo $firstview_text; ?>
      </p>
    <?php endif; ?>
  </div>
</section>