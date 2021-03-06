<?php

/**
 * BaseAnswer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property QA $ReplyTo
 * @property Question $Question
 * @property Doctrine_Collection $Branches
 * 
 * @method QA                  getReplyTo()  Returns the current record's "ReplyTo" value
 * @method Question            getQuestion() Returns the current record's "Question" value
 * @method Doctrine_Collection getBranches() Returns the current record's "Branches" collection
 * @method Answer              setReplyTo()  Sets the current record's "ReplyTo" value
 * @method Answer              setQuestion() Sets the current record's "Question" value
 * @method Answer              setBranches() Sets the current record's "Branches" collection
 * 
 * @package    qa
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
abstract class BaseAnswer extends QA
{
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('QA as ReplyTo', array(
             'local' => 'reply_id',
             'foreign' => 'id'));

        $this->hasOne('Question', array(
             'local' => 'id',
             'foreign' => 'best_id'));

        $this->hasMany('Question as Branches', array(
             'local' => 'id',
             'foreign' => 'origin_id'));
    }
}