<?php

/**
 * Answer form.
 *
 * @package    qa
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnswerForm extends BaseAnswerForm
{
  public function configure()
  {
    parent::configure();
    
    // make reply hidden
    $this->widgetSchema['reply_id'] = new sfWidgetFormInputHidden();
    
    // set some attributes
    $this->widgetSchema['question']->setAttribute('class','question hidden');
    $this->widgetSchema['question']->setAttribute('rows','1');
    $this->widgetSchema['question']->setLabel('Your improved question');
    
    $this->widgetSchema['answer']->setAttribute('class','answer');
    $this->widgetSchema['answer']->setAttribute('rows','8');
    $this->widgetSchema['answer']->setLabel('Your improved answer');
    
    $this->widgetSchema['comment']->setAttribute('class','comment focus_on_load');
    $this->widgetSchema['comment']->setAttribute('rows','5');
    $this->widgetSchema['comment']->setLabel('Your comment');
    
    $this->validatorSchema->setPostValidator(new sfValidatorStringEditedOrCommented());
    
    $this->useFields(array(
      'id',
      'reply_id',
      'question',
      'answer',
      'comment'
    ));
  }
  
  public function save($conn = null)
  {
    $object = parent::save($conn);
    
    if (!$object->getNode()->isValidNode())
    {
      // store the object as the first child of its reply
      $object->getNode()->insertAsFirstChildOf($object->ReplyTo);
    }
    
    return $object;
  }
}
