<?php

class TaskController extends Zend_Controller_Action
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
        $form = new Application_Form_NewTask();
        $this->view->form = $form;
        $projectId = $this->_getParam('projectId');
        
        $request = $this->getRequest();
        
        if($request()->isPost() && $form->isValid($form->getRequest()))
        {
            $issueModel = new Application_Model_DbTable_Issue();
            $issue = $issueModel->createRow();
            $issue->setFromArray($form->getValues());
            $issue->id_project = $projectId;
            $issue->save();
            
            $this->_helper->flashMessenger('Din Todo är lagrad');
        }
    }


}



