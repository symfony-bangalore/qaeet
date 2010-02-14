<?php

/**
 * Tag form base class.
 *
 * @method Tag getObject() Returns the current form's model object
 *
 * @package    qaeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTagForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInputText(),
      'slug'           => new sfWidgetFormInputText(),
      'questions_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Question')),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'slug'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'questions_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Question', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Tag', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Tag', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tag';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['questions_list']))
    {
      $this->setDefault('questions_list', $this->object->Questions->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveQuestionsList($con);

    parent::doSave($con);
  }

  public function saveQuestionsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['questions_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Questions->getPrimaryKeys();
    $values = $this->getValue('questions_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Questions', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Questions', array_values($link));
    }
  }

}
