<?php


/**
 * The file for the Dao
 *
 * @author Matthias Loitsch <matthias@loitsch.com>
 * @copyright Copyright (c) 2010, Matthias Loitsch
 * @package Dao
 **/

/**
 * Including the PostgresqlDao
 */
if ( ! class_exists('PostgresqlDao', false)) include(RINCEWIND_PATH . 'Dao/PostgresqlDao.php');


/**
 * Simple Dao
 *
 * @author Matthias Loitsch <matthias@loitsch.com>
 * @copyright Copyright (c) 2010, Matthias Loitsch
 * @package Dao
 */
class UserDao extends PostgresqlDao {

  protected $resourceName = 'users';

  protected $attributes = array(
      'id'=>Dao::INT,
      'login'=>Dao::TEXT,
      'password'=>Dao::TEXT,
      'fname'=>Dao::TEXT,
      'name'=>Dao::TEXT,
      'email'=>Dao::TEXT,
  );

  public function getByLoginAndPassword($login, $password) {
    return $this->getIterator(array('login'=>$login, 'password'=>$password));
  }
  public function getByLogin($login) {
    return $this->get(array('login'=>$login));
  }
  public function getByEmail($email) {
    return $this->getIterator(array('email'=>$email));
  }
}

