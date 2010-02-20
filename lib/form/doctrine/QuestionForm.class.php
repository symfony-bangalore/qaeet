<?php

/**
 * Question form.
 *
 * @package    qa
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuestionForm extends BaseQuestionForm
{
  public function configure()
  {
    parent::configure();
    
    // hide origin
    $this->widgetSchema['origin_id'] = new sfWidgetFormInputHidden();
        
    // set some attributes
    $this->widgetSchema['question']->setAttribute('class','question');
    $this->widgetSchema['answer']->setAttribute('class','answer');

    $this->useFields(array(
      'id',
      'origin_id',
      'question',
      'answer'
    ));
  }

  public function save($conn = null)
  {
    $object = parent::save($conn);
    
    if (!$object->getNode()->isValidNode())
    {
      $object->getTable()->getTree()->createRoot($object);
    }
    
    return $object;
  }
}
