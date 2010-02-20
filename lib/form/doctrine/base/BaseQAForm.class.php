<?php

/**
 * QA form base class.
 *
 * @method QA getObject() Returns the current form's model object
 *
 * @package    qa
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseQAForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'question'   => new sfWidgetFormTextarea(),
      'answer'     => new sfWidgetFormTextarea(),
      'type'       => new sfWidgetFormInputText(),
      'best_id'    => new sfWidgetFormInputText(),
      'origin_id'  => new sfWidgetFormInputText(),
      'comment'    => new sfWidgetFormTextarea(),
      'reply_id'   => new sfWidgetFormInputText(),
      'root_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Root'), 'add_empty' => true)),
      'lft'        => new sfWidgetFormInputText(),
      'rgt'        => new sfWidgetFormInputText(),
      'level'      => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'question'   => new sfValidatorString(array('required' => false)),
      'answer'     => new sfValidatorString(array('required' => false)),
      'type'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'best_id'    => new sfValidatorInteger(array('required' => false)),
      'origin_id'  => new sfValidatorInteger(array('required' => false)),
      'comment'    => new sfValidatorString(array('required' => false)),
      'reply_id'   => new sfValidatorInteger(array('required' => false)),
      'root_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Root'), 'required' => false)),
      'lft'        => new sfValidatorInteger(array('required' => false)),
      'rgt'        => new sfValidatorInteger(array('required' => false)),
      'level'      => new sfValidatorInteger(array('required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'created_by' => new sfValidatorString(array('max_length' => 128)),
      'updated_by' => new sfValidatorString(array('max_length' => 128)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'QA', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('qa[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QA';
  }

}
