<?php

class Application_Model_DbTable_Issue extends Zend_Db_Table_Abstract
{

    protected $_name = 'issue';
    
    /**
     * Returns an issu based on Id
     * @param type $issueId
     * @return object 
     */
    public static function getIssuBasedOnId($issueId)
    {
        $instance = new self();
        $issue = $instance->fetchRow(array('id_issue = ?' => $issueId));
        return $issue;
    }


}

