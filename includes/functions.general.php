<?php
/**
 * Defining some general functions.
 *
 * @author Matthias Loitsch <matthias@loitsch.com>
 * @copyright Copyright (c) 2010, Matthias Loitsch
 * @package ini
 */



/**
 * This function tries to load classes that are not set yet.
 * Don't call this yourself. It gets called by PHP automatically when trying to instantiate a
 * non-existing class.
 *
 * @param string $className
 */
function myAutoload($className) {
  if (strpos($className, 'Dao') !== false) {
    include LIBRARY_PATH . 'Dao/' . $className . '.php';
  }
}

spl_autoload_register('myAutoload');



