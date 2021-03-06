<?php

/**
 * Answer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    qa
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
class Answer extends BaseAnswer
{
  public function getAnswer()
  {
    $answer = $this->_get('answer');
    if ($this->id !== $this->Root->best_id && $this->Root->Best->answer === $answer)
      $answer = "";

    return $answer;
  }

  public function getQuestion()
  {
    $question = $this->_get('question');
    if ($this->id !== $this->Root->best_id && $this->Root->Best->question === $question)
      $question = "";

    return $question;
  }
  
  public function isBest()
  {
    return $this->id === $this->Root->best_id;
  }
  
  public function makeBest()
  {
    $question = $this->Root;
    $question->Best = $this;
    $question->save();
  }
  
  public function branchOff()
  {
    if ($this->isBest())
    {
      $this->getNode()->getParent()->makeBest();
    }
    
    $qa = new Question();
    $qa->question = $this->_get('question');
    $qa->answer = $this->_get('answer');
    $qa->Origin = $this;
    return $qa;
  }
}