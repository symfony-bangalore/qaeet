<?php

/**
 * BasesfGuardUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $email
 * @property string $fullname
 * @property string $validate
 * @property sfGuardUser $User
 * @property Doctrine_Collection $Questions
 * @property Doctrine_Collection $Answers
 * 
 * @method integer             getId()        Returns the current record's "id" value
 * @method integer             getUserId()    Returns the current record's "user_id" value
 * @method string              getEmail()     Returns the current record's "email" value
 * @method string              getFullname()  Returns the current record's "fullname" value
 * @method string              getValidate()  Returns the current record's "validate" value
 * @method sfGuardUser         getUser()      Returns the current record's "User" value
 * @method Doctrine_Collection getQuestions() Returns the current record's "Questions" collection
 * @method Doctrine_Collection getAnswers()   Returns the current record's "Answers" collection
 * @method sfGuardUserProfile  setId()        Sets the current record's "id" value
 * @method sfGuardUserProfile  setUserId()    Sets the current record's "user_id" value
 * @method sfGuardUserProfile  setEmail()     Sets the current record's "email" value
 * @method sfGuardUserProfile  setFullname()  Sets the current record's "fullname" value
 * @method sfGuardUserProfile  setValidate()  Sets the current record's "validate" value
 * @method sfGuardUserProfile  setUser()      Sets the current record's "User" value
 * @method sfGuardUserProfile  setQuestions() Sets the current record's "Questions" collection
 * @method sfGuardUserProfile  setAnswers()   Sets the current record's "Answers" collection
 * 
 * @package    qaeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
abstract class BasesfGuardUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_profile');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('email', 'string', 80, array(
             'type' => 'string',
             'length' => '80',
             ));
        $this->hasColumn('fullname', 'string', 80, array(
             'type' => 'string',
             'length' => '80',
             ));
        $this->hasColumn('validate', 'string', 17, array(
             'type' => 'string',
             'length' => '17',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('Question as Questions', array(
             'local' => 'id',
             'foreign' => 'author_id'));

        $this->hasMany('Answer as Answers', array(
             'local' => 'id',
             'foreign' => 'author_id'));
    }
}