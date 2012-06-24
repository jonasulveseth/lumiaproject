<?php

class MemberController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function inviteAction()
    {
        //get all contracts to pass into form
        $contractmodel = new Application_Model_DbTable_Contract();
        $contracts = $contractmodel->fetchAll(array('id_member = ?' => Lumiaproject_User::id()));
        $form = new Application_Form_Invite($contracts->toArray());
        
        
        $this->view->form = $form;
        $request = $this->getRequest();

        if($request->isPost())
        {
          if($form->isValid($request->getPost()))
          {

          }

        }
    }

    public function loggedOutAction()
    {
        // action body
    }


}





