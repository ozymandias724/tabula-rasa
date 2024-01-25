<?php

/**
 *  Borrowing from _s and twentytwentythree for clean best practices
 *  Modifications include:
 *  _S_ : _TR_            // db defined key:value, keep it short
 *  '_s : 'tabula-rasa    // must match the name of the theme folder
 * 
 * 
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */
// ? silence is golden
// ? code is poetry

if (!defined('_TR_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_TR_VERSION', '1.0.0');
}

require_once(get_template_directory() . '/classes/setup-theme.php');


function setup_theme()
{

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
    array(
      'menu-1' => esc_html__('Primary', 'tabula-rasa'),
    )
  );

  /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
  load_theme_textdomain('tabula-rasa', get_template_directory() . '/languages');


  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
  add_theme_support('title-tag');

  /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
  add_theme_support('post-thumbnails');

  /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    )
  );


  // Set up the WordPress core custom background feature.
  add_theme_support(
    'custom-background',
    apply_filters(
      'tabula-rasa_custom_background_args',
      array(
        'default-color' => 'ffffff',
        'default-image' => '',
      )
    )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support(
    'custom-logo',
    array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    )
  );


  /**
   *  theme supports related to the block editor
   */
  add_theme_support('disable-custom-font-sizes');        // disable wp core custom font sizes
  add_theme_support('disable-custom-colors');            // disable wp core custom colors
  add_theme_support('disable-custom-gradients');        // disable wp core custom gradients
  add_theme_support('align-wide');                      // enable wide alignment for blocks
  add_theme_support('custom-spacing');                  // opt-in to letting blocks set padding
  add_post_type_support('page', 'excerpt');						// let pages have excerpts
  add_theme_support('body-open');								// enable wp_body_open filter
  

  /**
   * 
   */
  remove_theme_support('core-block-patterns');           // remove the "patterns" library
  add_filter('should_load_remote_block_patterns', '__return_false');
  add_theme_support('editor-gradient-presets', []); // remove the preset gradients in wp core
  add_theme_support('editor-styles');
  // 
  add_editor_style(get_template_directory_uri() . '/_build/css/editor-styles.css');
}

add_action('after_setup_theme', 'setup_theme');


// Enable 'alignwide' and 'alignfull' for specific blocks (in this case, the Cover block)
function tr_enable_align_support($settings) {
  $settings['supports']['align'] = array('wide', 'full');
  return $settings;
}
add_filter('block_editor_settings', 'tr_enable_align_support');

