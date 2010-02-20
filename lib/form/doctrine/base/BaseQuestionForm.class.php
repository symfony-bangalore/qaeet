<?php

/**
 * Question form base class.
 *
 * @method Question getObject() Returns the current form's model object
 *
 * @package    qa
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseQuestionForm extends QAForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['related_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Question'));
    $this->validatorSchema['related_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Question', 'required' => false));

    $this->widgetSchema   ['tags_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Tag'));
    $this->validatorSchema['tags_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Tag', 'required' => false));

    $this->widgetSchema->setNameFormat('question[%s]');
  }

  public function getModelName()
  {
    return 'Question';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['related_list']))
    {
      $this->setDefault('related_list', $this->object->Related->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['tags_list']))
    {
      $this->setDefault('tags_list', $this->object->Tags->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveRelatedList($con);
    $this->saveTagsList($con);

    parent::doSave($con);
  }

  public function saveRelatedList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['related_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Related->getPrimaryKeys();
    $values = $this->getValue('related_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Related', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Related', array_values($link));
    }
  }

  public function saveTagsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tags_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Tags->getPrimaryKeys();
    $values = $this->getValue('tags_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Tags', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Tags', array_values($link));
    }
  }

}
