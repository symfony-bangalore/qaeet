<?php

/**
 * QA form.
 *
 * @package    qa
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QAForm extends BaseQAForm
{
  public function configure()
  {
    // remove behaviour fields from form
    unset(
      $this['root_id'],
      $this['lft'],
      $this['rgt'],
      $this['level'],
      $this['slug'],
      $this['created_at'],
      $this['updated_at'],
      $this['created_by'],
      $this['updated_by']
    );
    $this->validatorSchema['question'] = new sfValidatorStringQuestion();
    $this->widgetSchema->setFormFormatterName('list');
  }
}
