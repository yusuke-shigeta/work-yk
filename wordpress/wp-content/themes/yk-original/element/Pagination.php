<div class="pagination">
  <?php
  echo paginate_links(array(
    'total' => $works_query->max_num_pages,
    'current' => $paged,
    'format' => 'page/%#%/',
    'show_all' => false,
    'end_size' => 1,
    'mid_size' => 2,
    'prev_next' => true,
    'prev_text' => __('前へ'),
    'next_text' => __('次へ'),
    'type' => 'list',
    'add_args' => false,
    'add_fragment' => '',
  ));
  ?>
</div>

<?php
// <ul class="page-numbers">
//   <li><a class="prev page-numbers" href="http://localhost:8001/works/">« 前へ</a></li>
//   <li><a class="page-numbers" href="http://localhost:8001/works/">1</a></li>
//   <li><span aria-current="page" class="page-numbers current">2</span></li>
// </ul>
?>