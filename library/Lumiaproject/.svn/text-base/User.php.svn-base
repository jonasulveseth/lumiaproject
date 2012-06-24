<?php
/**
 * Lumiastock
 *
 * @category   Lumiastock
 * @package    Lumiastock
 * @copyright  Copyright (c) 2010 Lumia AB (http://www.lumia.se)
 * @version    $Id$
 */

class Lumiaproject_User extends Zend_Controller_Action {

  public static function fullName($id = null)
  {
    $usermodel = new Lumiamodel_Model_User();
    $user = $usermodel->fetchRow(array('id_member = ?' => $id));
    return $user->first_name . ' ' . $user->last_name;

  }

  public static function firstname()
  {
    return "firstname";

  }

  public static function id($id = null)
  {
    $auth = Zend_Auth::getInstance();
    return $auth->getIdentity()->id_member;


  }

  public static function isLoggeIn()
  {
    $auth = Zend_Auth::getInstance();
    if($auth->hasIdentity()==true);
    {return true;}

  }

  public static function getRole($id = null)
  {
    $usermodel = new Application_Model_DbTable_Member();
    $user = $usermodel->fetchRow(array('id_member = ?' => $id));
    return $user->id_role;
  }


  public static function mustBeLoggedIn()
  {
    if(Zend_Auth::getInstance()->hasIdentity() == FALSE){
    $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
    $redirector->goto('logged-out' , 'member');
    }
  }

  public static function companyId()
  {
    $membermodel = new Application_Model_DbTable_Member();
    $member = $membermodel->fetchRow(array('id_member = ?' => self::id()));
    return $member->id_company;
  }

}


