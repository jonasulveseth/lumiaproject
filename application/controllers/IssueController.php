<?php

class IssueController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function newAction()
    {
        // action body
    }
    
    public function editAction()
    {
        $form = new Application_Form_Issue();
        
        $issueId= $this->_getParam('issueId');
        $issue = Application_Model_DbTable_Issue::getIssuBasedOnId($issueId);
        $form->populate($issue->toArray());
        $this->view->form = $form;
    }


}



