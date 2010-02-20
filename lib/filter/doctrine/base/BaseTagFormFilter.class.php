<?php

/**
 * Tag filter form base class.
 *
 * @package    qa
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTagFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(),
      'slug'           => new sfWidgetFormFilterInput(),
      'questions_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Question')),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'slug'           => new sfValidatorPass(array('required' => false)),
      'questions_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Question', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addQuestionsListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('QuestionTag.question_id', $values);
  }

  public function getModelName()
  {
    return 'Tag';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'slug'           => 'Text',
      'questions_list' => 'ManyKey',
    );
  }
}
