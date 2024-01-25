<?php
// ? silence is golden
// ? code is poetry


/**
 * 
 */
class Factory {

  protected static $instances = [];
  public static function registerInstance($handle, $instance) {
    self::$instances[$handle] = $instance;
  }
  public static function getInstance($handle) {
    return self::$instances[$handle];
  }
}

$engine = Factory::getInstance('Engine');
