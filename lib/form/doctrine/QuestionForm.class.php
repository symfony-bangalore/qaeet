<?php

/**
 * Question form.
 *
 * @package    qaeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuestionForm extends BaseQuestionForm
{
  public function configure()
  {
    unset(
      $this['related_list'],
      $this['branch_id'],
      $this['best_id'],
      $this['created_at'],
      $this['updated_at']
    );
    $this->validatorSchema['question'] = new sfValidatorStringQuestion();
  }
}
