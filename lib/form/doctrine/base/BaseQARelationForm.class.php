<?php

/**
 * QARelation form base class.
 *
 * @method QARelation getObject() Returns the current form's model object
 *
 * @package    qa
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseQARelationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'from_id' => new sfWidgetFormInputHidden(),
      'to_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'from_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'from_id', 'required' => false)),
      'to_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'to_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('qa_relation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QARelation';
  }

}
