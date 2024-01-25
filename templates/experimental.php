<?php
// Template Name: Experimental
// Template Post Type: page

  wp_head();

  $menu = wp_nav_menu(['menu'=> 4, 'echo' => false]);

  var_dump($menu);

?>



<?php
  wp_footer();
?>