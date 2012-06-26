<?php

class Application_Form_Issue extends Zend_Form
{
    public function init() {
        
        /**
         * Title 
         */
        $title = $this->createElement('text', 'title');
        $title->setLabel('title');
        $title->setRequired();
        $this->addElement($title);
        
        /**
         * Description 
         */
        $comment = $this->createElement('textarea', 'comment');
        $comment->setLabel('Kommentar');
        $this->addElement($comment);
        
        /**
         * button 
         */
        $button = $this->createElement('submit', 'button');
        $button->setLabel('oppdater');
        $this->addElement($button);
        
        
    }
    
}
