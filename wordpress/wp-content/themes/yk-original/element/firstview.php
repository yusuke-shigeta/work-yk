<?php
// firstview

$firstview_data = get_firstview_data();
?>

<section style="background-image: url(<?php echo $firstview_data['background_image']; ?>)" class="sec">
  <div class="sec-inner">
    <h1><?php echo $firstview_data['heading'];; ?></h1>
    <?php if ($firstview_data['text']) : ?>
      <p>
        <?php echo $firstview_data['text']; ?>
      </p>
    <?php endif; ?>
  </div>
</section>