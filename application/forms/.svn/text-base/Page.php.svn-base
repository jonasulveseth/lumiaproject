<?php

class Application_Form_Page extends Zend_Form
{

    public function init()
    {
       $name = $this->createElement('text', 'name');
       $name->setLabel('Name');
       $name->setRequired();
       $this->addElement($name);

       $comment = $this->createElement('textarea', 'comment');
       $comment->setRequired();
       $comment->setLabel('Comment about page');
       $this->addElement($comment);


       $submit = $this->createElement('submit', 'submit');
       $submit->setLabel('Create new page');
       $this->addElement($submit);





    }


}

