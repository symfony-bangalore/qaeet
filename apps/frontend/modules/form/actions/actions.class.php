<?php

/**
 * form actions.
 *
 * @package    qaeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class formActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $name = 'data';
    
    $this->form = new sfForm();
    $this->form->getWidgetSchema()->setNameFormat($name.'[%s]');
    $this->form->setWidget('name', new sfWidgetFormInput());
    $this->form->setValidator('name', new sfValidatorString());
    
    $this->form->setWidget(   'integer', new sfWidgetFormInput());
    $this->form->setValidator('integer', new sfValidatorInteger());
    
    $this->form->setWidget(   'date', new sfWidgetFormDate());
    $this->form->setValidator('date', new sfValidatorDate());

    $choices = array(
      'roti',
      'dal',
      'chinese',
      'lassi'
    );
    
    $this->form->setWidget(   'lunch', new sfWidgetFormChoice(array(
      'multiple' => true,
      'expanded' => true,
      'choices' => $choices
    )));
    $this->form->setValidator('lunch', new sfValidatorChoice(array(
      'multiple' => true,
      'choices' => array_keys($choices)
    )));    
    
    $this->result = "";
    if ($request->getMethod() == 'POST')
    {
      $this->value = $request->getParameter($name);
  
      $this->form->bind($this->value);
      
      if ($this->form->isValid())
      {
        $this->result = $this->form->getValues();
      }
      else
      {
        $this->result = 'bummer';
      }
    }
  }
}
