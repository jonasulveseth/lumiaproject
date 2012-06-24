<?php


class Application_Form_AddPagetoProject extends Zend_Form
{
  public function init()
  {
    $projectlist = new Zend_Form_Element_Select('id_project');
    $pages = new Zend_Form_Element_Select('id_page', null);
    foreach($this->_attribs as $page)
    {
      $pages->addMultiOptions(array($page['id'] => $page['name']));
    }
    

    $button = $this->createElement('submit', 'submit');
    $button->setLabel('Add page to project');

    $this->addElement($pages);
    $this->addElement($button);
    


  }



}
