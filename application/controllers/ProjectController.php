<?php

class ProjectController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    
     // get all task from this projekt
     $taskModel = new Application_Model_DbTable_Issue();
     $tasks = $taskModel->fetchAll();
     
     $this->view->tasks = $tasks;


    }

    public function newAction()
    {
        $request = $this->getRequest();
        $form = new Application_Forms_NewProject();
        
        if($request->isPost())
        {
          if($form->isValid($request->getPost()))
          {
            $projectModel = new Application_Model_DbTable_Project();
            $project = $projectModel->createRow();
            $project->setFromArray($form->getValues());
            $project->id_owner = Lumiaproject_User::id();
            $project->created_date = Zend_Date::now()->get('yyyy-MM-dd');
            $project->save();
            
            //adding link to project
            $projectHasMembersModel = new Application_Model_DbTable_Projecttomembers();
            $projectlink = $projectHasMembersModel->createRow();
            $projectlink->id_project = $project->id_project;
            $projectlink->date_created = Zend_Date::now()->get('yyyy-MM-dd');
            $projectlink->save();
            
            $this->_helper->flashMessenger('You have added a new project');
            $this->_helper->redirector('projects-list' , 'project');
          }
        }
        
        $this->view->form = $form;
    }

    public function newsectionAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
    }


    public function projectsListAction()
    {

          $projectmodel = new Application_Model_DbTable_Project();
                      $project= $projectmodel->select();
                      $project->setIntegrityCheck(false);
                      $project->from($projectmodel);
                      $project->joinLeft('project_has_members' , 'project_has_members.id_project = project.id_project' , array());
                      $project->where('project_has_members.id_member = ?' , Lumiaproject_User::id());
                      $project->orWhere('project_has_members.id_member = ?' , Zend_Auth::getInstance()->getIdentity()->client_to_id);
                      $projects = $projectmodel->fetchAll($project);

                      $this->view->projects = $projects;

    }
    
    public function overviewAction()
    {
      //shows severel options from project scope
      
    }

    public function pagesAction()
    {
       //get project
     $projectId = $this->_getParam('projectId');
     $projectmodel = new Application_Model_DbTable_Project();

     $project = $projectmodel->fetchRow(array('id_project = ?' => $projectId));
     
     $this->view->projectName = $project->name;

     //get pages
     $pagemodel = new Application_Model_DbTable_Page();
     $page = $pagemodel->select();
     $page->from($pagemodel);
     $page->setIntegrityCheck(false);
     $page->joinLeft('project_has_pages', 'project_has_pages.id_page = page.id');
     $page->where('project_has_pages.id_project = ?' , $projectId);
     $pageList = $pagemodel->fetchAll($page);

     $this->view->pageList = $pageList;

    }

}







