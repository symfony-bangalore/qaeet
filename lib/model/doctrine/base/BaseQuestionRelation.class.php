<?php

/**
 * BaseQuestionRelation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $from_id
 * @property integer $to_id
 * 
 * @method integer          getFromId()  Returns the current record's "from_id" value
 * @method integer          getToId()    Returns the current record's "to_id" value
 * @method QuestionRelation setFromId()  Sets the current record's "from_id" value
 * @method QuestionRelation setToId()    Sets the current record's "to_id" value
 * 
 * @package    qaeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
abstract class BaseQuestionRelation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('question_relation');
        $this->hasColumn('from_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('to_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}