<?php
// ? silence is golden
// ? code is poetry

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}



class SetupTheme
{

  /**
   * Holds the instance.
   */
  private static $instance;


  /**
   * Init Main Instance.
   *
   * Insures that only one instance exists in memory at any one
   * time. Also prevents needing to define globals all over the place.
   */
  public static function instance()
  {

    // manage state to keep only one instace in memory
    if (!isset(self::$instance) && !(self::$instance instanceof SetupTheme)) {

      self::$instance = new SetupTheme();
      self::$instance->includes();
      self::$instance->enqueueStyles();
      self::$instance->enqueueScripts();
    }

    // return new instance
    return self::$instance;
  }

  private function enqueueStyles()
  {
    // 
    add_action('wp_enqueue_scripts', function(){
      wp_register_style(
        'main',
        get_template_directory_uri() . '/_build/css/styles.css',
        array(),
        filemtime(get_template_directory() . '/_build/css/styles.css')
      );
      // 
      wp_enqueue_script('main');
    });
    
  }
  private function enqueueScripts()
  {
    add_action('wp_enqueue_scripts', function(){

      // 
      wp_register_script(
        'main',
        get_template_directory_uri() . '/_build/js/scripts.js',
        array('jquery'),
        filemtime(get_template_directory() . '/_build/js/scripts.js'),
        true
      );

      // 
      wp_enqueue_style('main');
    });

  }
  private function includes()
  {

    // ... require_once template files here
    require_once(get_template_directory() . '/functions/utility.php');
    require_once(get_template_directory() . '/functions/apply-filters.php');
    require_once(get_template_directory() . '/post-types/register-post-types.php');
    require_once(get_template_directory() . '/functions/acf-blocks.php');
  }
}

SetupTheme::instance();
