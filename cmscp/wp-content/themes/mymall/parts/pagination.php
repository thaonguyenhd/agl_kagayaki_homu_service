<?php
  global $wp_query;
  $pages = $wp_query->max_num_pages;
?>
<?php if ($pages > 1) : if (function_exists("pagination")) : ?>
<div class="com-mt-l com-pagination"><?php pagination() ?></div>
<?php endif; endif; ?>
