<?php

/**
 * Question filter form base class.
 *
 * @package    qa
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseQuestionFormFilter extends QAFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['related_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Question'));
    $this->validatorSchema['related_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Question', 'required' => false));

    $this->widgetSchema   ['tags_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Tag'));
    $this->validatorSchema['tags_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Tag', 'required' => false));

    $this->widgetSchema->setNameFormat('question_filters[%s]');
  }

  public function addRelatedListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.QuestionRelation QuestionRelation')
          ->andWhereIn('QuestionRelation.to_id', $values);
  }

  public function addTagsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.QuestionTag QuestionTag')
          ->andWhereIn('QuestionTag.tag_id', $values);
  }

  public function getModelName()
  {
    return 'Question';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'related_list' => 'ManyKey',
      'tags_list' => 'ManyKey',
    ));
  }
}
