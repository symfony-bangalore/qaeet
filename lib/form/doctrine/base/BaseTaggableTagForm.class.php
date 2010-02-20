<?php

/**
 * TaggableTag form base class.
 *
 * @method TaggableTag getObject() Returns the current form's model object
 *
 * @package    qa
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTaggableTagForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'qa_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'QA')),
      'answer_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Answer')),
      'question_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Question')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'qa_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'QA', 'required' => false)),
      'answer_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Answer', 'required' => false)),
      'question_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Question', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TaggableTag', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('taggable_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaggableTag';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['qa_list']))
    {
      $this->setDefault('qa_list', $this->object->QA->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['answer_list']))
    {
      $this->setDefault('answer_list', $this->object->Answer->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['question_list']))
    {
      $this->setDefault('question_list', $this->object->Question->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveQAList($con);
    $this->saveAnswerList($con);
    $this->saveQuestionList($con);

    parent::doSave($con);
  }

  public function saveQAList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['qa_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->QA->getPrimaryKeys();
    $values = $this->getValue('qa_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('QA', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('QA', array_values($link));
    }
  }

  public function saveAnswerList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['answer_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Answer->getPrimaryKeys();
    $values = $this->getValue('answer_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Answer', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Answer', array_values($link));
    }
  }

  public function saveQuestionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['question_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Question->getPrimaryKeys();
    $values = $this->getValue('question_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Question', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Question', array_values($link));
    }
  }

}
