<?php

/**
 * BaseTag
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $Questions
 * 
 * @method string              getName()      Returns the current record's "name" value
 * @method Doctrine_Collection getQuestions() Returns the current record's "Questions" collection
 * @method Tag                 setName()      Sets the current record's "name" value
 * @method Tag                 setQuestions() Sets the current record's "Questions" collection
 * 
 * @package    qaeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
abstract class BaseTag extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tag');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Question as Questions', array(
             'refClass' => 'QuestionTag',
             'local' => 'tag_id',
             'foreign' => 'question_id'));

        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($sluggable0);
    }
}