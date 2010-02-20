<?php

/**
 * QA filter form base class.
 *
 * @package    qa
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseQAFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'question'   => new sfWidgetFormFilterInput(),
      'answer'     => new sfWidgetFormFilterInput(),
      'type'       => new sfWidgetFormFilterInput(),
      'best_id'    => new sfWidgetFormFilterInput(),
      'origin_id'  => new sfWidgetFormFilterInput(),
      'comment'    => new sfWidgetFormFilterInput(),
      'reply_id'   => new sfWidgetFormFilterInput(),
      'root_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Root'), 'add_empty' => true)),
      'lft'        => new sfWidgetFormFilterInput(),
      'rgt'        => new sfWidgetFormFilterInput(),
      'level'      => new sfWidgetFormFilterInput(),
      'slug'       => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'updated_by' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'question'   => new sfValidatorPass(array('required' => false)),
      'answer'     => new sfValidatorPass(array('required' => false)),
      'type'       => new sfValidatorPass(array('required' => false)),
      'best_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'origin_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comment'    => new sfValidatorPass(array('required' => false)),
      'reply_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'root_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Root'), 'column' => 'id')),
      'lft'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rgt'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slug'       => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by' => new sfValidatorPass(array('required' => false)),
      'updated_by' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('qa_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QA';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'question'   => 'Text',
      'answer'     => 'Text',
      'type'       => 'Text',
      'best_id'    => 'Number',
      'origin_id'  => 'Number',
      'comment'    => 'Text',
      'reply_id'   => 'Number',
      'root_id'    => 'ForeignKey',
      'lft'        => 'Number',
      'rgt'        => 'Number',
      'level'      => 'Number',
      'slug'       => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'created_by' => 'Text',
      'updated_by' => 'Text',
    );
  }
}
