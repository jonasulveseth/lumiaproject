<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

  protected function init()
  {
		$this->bootstrap('db');
		$db = Zend_Db_Table_Abstract::getDefaultAdapter();

		$db->setFetchMode(Zend_Db::FETCH_OBJ);

		// make the MySQL server work in GMT
		// Makes NOW() and other datetime function work in GMT
		$db->query("SET SESSION time_zone = '+0:00'");
	}

}
Zend_Layout::startMvc();
$view = Zend_Layout::getMvcInstance()->getView();
$view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');