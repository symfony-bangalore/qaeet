<?php

/**
 * Answer filter form base class.
 *
 * @package    qa
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAnswerFormFilter extends QAFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('answer_filters[%s]');
  }

  public function getModelName()
  {
    return 'Answer';
  }
}
