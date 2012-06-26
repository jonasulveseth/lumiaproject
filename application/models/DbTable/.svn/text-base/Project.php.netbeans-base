<?php

class Application_Model_DbTable_Project extends Zend_Db_Table_Abstract
{

    protected $_name = 'project';
    
    public static function getProjectNameFromProjectId($projectId)
    {
        $instance = new self();
        $project = $instance->fetchRow(array('id_project = ?' => $projectId));
        return $project->name;
    }
 


}

