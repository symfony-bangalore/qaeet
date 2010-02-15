<?php

/**
 * Question
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    qaeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
class Question extends BaseQuestion
{
  public function getTitle()
  {
    $lines = explode("\n" ,$this->question);
    return str_replace('#','', $lines[0]);
  }
  
  public function getSimilarQuestions($limit = 10)
  {
    throw new Exception('Not implemented yet');
    //create table QuestionTags (questionid int, tag int);
    //
    //select q1.questionid, q2.questionid, count(*) as commontags
    //from QuestionTags q1 join QuestionTags q2 
    //where q1.tag = q2.tag and q1.questionid < q2.questionid
    //group by q1.questionid, q2.questionid order by commontags desc;
  }
  
  public function getBody()
  {
    $lines = explode("\n" ,$this->question);
    $dummy = array_shift($lines);
    return implode("\n", $lines);
  }
  
  /**
   * extracts tags from the provided text and connects them to this question. If a tag is deleted it
   * will be deleted from the relation
   *
   * @return void
   * @author The Young Shepherd
   **/
  public function setQuestion($text)
  {
    $oldTags = array_keys(Toolkit::extractTags($this->question));
    $newTags = array_keys(Toolkit::extractTags($text));
    
    $addTags =    array_diff($newTags, $oldTags);
    $deleteTags = array_diff($oldTags, $newTags);
    
    foreach ($deleteTags as $name)
    {
      foreach ($this->Tags as $index => $tag)
      {
        if ($tag->name === $name)
        {
          unset($this->Tags[$index]);
          break; // go to next name to delete
        }
      }
    }

    foreach ($addTags as $name)
    {
      if (!$tag = Doctrine::getTable('Tag')->findOneByName($name))
      {
        $tag = new Tag();
        $tag->name = $name;
      }
      $this->Tags[] = $tag;
    }

    return $this->_set('question', $text);
  }
  
  public function __toString()
  {
    return $this->getTitle();
  }
  
  public function hasBestAnswer()
  {
    return null !== $this->best_id;
  }
}