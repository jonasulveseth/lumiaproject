<?php

class Application_Form_Invite extends Zend_Form
{

    public function init()
    {
      $email = $this->createElement('text', Lumiaproject_Translate::text('Email'));
      $email->setLabel(Lumiaproject_Translate::text('Email adress to invite'));
      $email->setRequired();
      $email->addValidator('Db_NoRecordExists',false ,array('table' => 'member' , 'field' => 'email' ,'messages' => 'Record exist'));
      $email->addValidator('EmailAddress' , array('messages' => 'Email is not the right format'));
      $this->addElement($email);

      $contract = new Zend_Form_Element_Select('id_contract');
      foreach($this->_attribs as $contractValues )
      {

        $contract->addMultiOption($contractValues['id_contract'], $contractValues['name']);

      }
      $contract->setLabel(Lumiaproject_Translate::text('Contract that user client should accept'));

      $this->addElement($contract);
     

      $submit = $this->createElement('submit', 'submit');
      $this->addElement($submit);

      
      
    }


}

