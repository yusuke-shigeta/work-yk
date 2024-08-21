<ul class="tagList">
  <?php foreach ($work_tags as $tag) : ?>
    <li class="tagItem">
      <a href="<?php echo get_term_link($tag->term_id); ?>" class="btn-color-gray tagLink">
        <?php echo $tag->name; ?>
        (<?php echo $tag->count; ?>)
      </a>
    </li>
  <?php endforeach; ?>
</ul>