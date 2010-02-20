<?php

/**
 * TaggableTag filter form base class.
 *
 * @package    qa
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTaggableTagFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(),
      'qa_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'QA')),
      'answer_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Answer')),
      'question_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Question')),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'qa_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'QA', 'required' => false)),
      'answer_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Answer', 'required' => false)),
      'question_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Question', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('taggable_tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addQAListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.QATaggableTag QATaggableTag')
          ->andWhereIn('QATaggableTag.id', $values);
  }

  public function addAnswerListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.AnswerTaggableTag AnswerTaggableTag')
          ->andWhereIn('AnswerTaggableTag.id', $values);
  }

  public function addQuestionListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.QuestionTaggableTag QuestionTaggableTag')
          ->andWhereIn('QuestionTaggableTag.id', $values);
  }

  public function getModelName()
  {
    return 'TaggableTag';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'qa_list'       => 'ManyKey',
      'answer_list'   => 'ManyKey',
      'question_list' => 'ManyKey',
    );
  }
}
