<?php

/**
 * Answer form base class.
 *
 * @method Answer getObject() Returns the current form's model object
 *
 * @package    qa
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAnswerForm extends QAForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('answer[%s]');
  }

  public function getModelName()
  {
    return 'Answer';
  }

}
