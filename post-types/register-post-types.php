<?php
// ? silence is golden
// ? code is poetry

function km_register_cpts()
{
  register_post_type(
    'portfolio-items',
    array(
      'labels'      => array(
        'name'          => __('Portfolio Items', 'textdomain'),
        'singular_name' => __('Portfolio Item', 'textdomain'),
      ),
      'public'      => true,
      'has_archive' => true,
      'show_in_rest' => true,
    )
  );
}

// 
add_action('init', 'km_register_cpts');
