<?php

/**
 * BaseAnswer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $question
 * @property string $answer
 * @property string $comment
 * @property integer $author_id
 * @property integer $reply_id
 * @property integer $question_id
 * @property sfGuardUserProfile $Author
 * @property Question $Question
 * @property Answer $ReplyTo
 * @property Doctrine_Collection $Replies
 * 
 * @method string              getQuestion()    Returns the current record's "question" value
 * @method string              getAnswer()      Returns the current record's "answer" value
 * @method string              getComment()     Returns the current record's "comment" value
 * @method integer             getAuthorId()    Returns the current record's "author_id" value
 * @method integer             getReplyId()     Returns the current record's "reply_id" value
 * @method integer             getQuestionId()  Returns the current record's "question_id" value
 * @method sfGuardUserProfile  getAuthor()      Returns the current record's "Author" value
 * @method Question            getQuestion()    Returns the current record's "Question" value
 * @method Answer              getReplyTo()     Returns the current record's "ReplyTo" value
 * @method Doctrine_Collection getReplies()     Returns the current record's "Replies" collection
 * @method Answer              setQuestion()    Sets the current record's "question" value
 * @method Answer              setAnswer()      Sets the current record's "answer" value
 * @method Answer              setComment()     Sets the current record's "comment" value
 * @method Answer              setAuthorId()    Sets the current record's "author_id" value
 * @method Answer              setReplyId()     Sets the current record's "reply_id" value
 * @method Answer              setQuestionId()  Sets the current record's "question_id" value
 * @method Answer              setAuthor()      Sets the current record's "Author" value
 * @method Answer              setQuestion()    Sets the current record's "Question" value
 * @method Answer              setReplyTo()     Sets the current record's "ReplyTo" value
 * @method Answer              setReplies()     Sets the current record's "Replies" collection
 * 
 * @package    qaeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
abstract class BaseAnswer extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('answer');
        $this->hasColumn('question', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('answer', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('comment', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('author_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('reply_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('question_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUserProfile as Author', array(
             'local' => 'author_id',
             'foreign' => 'id'));

        $this->hasOne('Question', array(
             'local' => 'question_id',
             'foreign' => 'id'));

        $this->hasOne('Answer as ReplyTo', array(
             'local' => 'reply_id',
             'foreign' => 'id'));

        $this->hasMany('Answer as Replies', array(
             'local' => 'id',
             'foreign' => 'reply_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}