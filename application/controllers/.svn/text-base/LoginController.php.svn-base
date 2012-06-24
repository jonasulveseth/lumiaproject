<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
     {
      $auth = Zend_Auth::getInstance();
      $form = new Application_Form_Login();
      $this->view->form = $form;
      $request = $this->getRequest();
      if($request->isPost()){
       if ($form->isValid($request->getPost())) {

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $authAdapter = new Zend_Auth_Adapter_DbTable($db, 'member', 'email', 'password' ,'SHA1(?)');
                $authAdapter->setIdentity($form->getValue('email'));
                $authAdapter->setCredential($form->getValue('password'));

                $result = $auth->authenticate($authAdapter);
                if ($result->isValid()) {
                    $data = $authAdapter->getResultRowObject(null, 'password');
                    $auth->getStorage()->write($data);
                    $this->_helper->redirector('index','mypage');
    }
       }
      }
     }


}

