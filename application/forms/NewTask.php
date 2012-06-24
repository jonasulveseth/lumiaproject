<?php

class Application_Form_NewTask extends Zend_Form
{

    public function init()
    {
        $title = $this->createElement('text', 'titel');
        $title->setLabel('Title');
        $this->addElement($title);

        $description = $this->createElement('textarea', 'main_text');
        $this->addElement($description);

        $button = $this->createElement('submit', 'submit');
        $button->setLabel('Add Task');

        $this->addElement($button);
        
    }


}

