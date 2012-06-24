<?php

class PageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $pageId    = $this->_getParam('pageId');
       $this->view->pageId = $pageId;

       $pagemodel = new Application_Model_DbTable_Page();
       $page = $pagemodel->fetchRow(array('id = ?' => $pageId));
       $this->view->page = $page;
    }

    public function newAction()
    {
       $request   = $this->getRequest();
       $projectId = $this->_getParam('projectId');
       $pageId    = $this->_getParam('pageId');
       $form      = new Application_Form_Page();

       $this->view->form = $form;
       $this->view->pageId = $pageId;
       $this->view->projectId = $projectId;


       if($request->isPost())
       {
         if($form->isValid($request->getPost()))
         {

           $pagemodel = new Application_Model_DbTable_Page();
           $page = $pagemodel->createRow();
           $page->setFromArray($form->getValues());
           $page->id_company = Lumiaproject_User::companyId();
           $page->save();
           $this->_helper->FlashMessenger('You have created a new page');
           $this->_helper->redirector('index','project',null,array('projectId' => $projectId));
         }

       }
       
    }

    public function editAction()
    {
        // action body
    }

    public function addToProjectAction()
    {
      $projectId = $this->_getParam('projectId');
      $pagemodel = new Application_Model_DbTable_Page();
      $companyId = Lumiaproject_User::companyId();
      $pages = $pagemodel->fetchAll(array('id_company = ?' => $companyId));
   
      $request = $this->getRequest();
      $form = new Application_Form_AddPagetoProject($pages->toArray());
      $this->view->form = $form;

      if($request->isPost())
      {
        if($form->isValid($request->getPost()))
        {
          //adding page to project
          $projectToPagesModel = new Application_Model_DbTable_Projecttopages();
          $projectToPages = $projectToPagesModel->createRow();
          $projectToPages->id_page = $form->getValue('id_page');
          $projectToPages->id_project = $projectId;
          $projectToPages->save();

          $this->_helper->flashMessenger('You have added a page to this project');
          $this->_helper->redirector('index' , 'project' , null , array('projectId' => $projectId));
        }

      }


    }


}





