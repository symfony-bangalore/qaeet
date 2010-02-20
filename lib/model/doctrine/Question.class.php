<?php

/**
 * Question
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    qa
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
class Question extends BaseQuestion
{
  public function __toString()
  {
    return $this->getTitle();
  }

  public function getBest()
  {
    return null === $this->best_id ? $this : $this->_get('Best');
  }

  public function getTitle($best = true)
  {
    $text = $best ? $this->Best->question : $this->question;
    $lines = explode("\n" , $text);
    return trim(str_replace('#','', $lines[0]));
  }
  
  public function getBody($best = true)
  {
    $text = $best ? $this->Best->question : $this->question;
    $lines = explode("\n" , $text);
    $not_a_no_op = array_shift($lines);
    return implode("\n", $lines);
  }
  
  public function getDiscussion()
  {
    return $this->Best->getNode()->getChildren();
  }

  public function getBranches()
  {
    return $this->getTable()->createQuery('q')
      ->innerJoin('q.Origin o')
      ->where('o.root_id = ?', $this->id)
      ->orderBy('q.created_at DESC')
      ->execute();
  }
  
  /**
   * extracts tags from the provided text and connects them to this question. If a tag is deleted it
   * will be deleted from the relation
   *
   * @return void
   * @author The Young Shepherd
   **/
  public function save(Doctrine_Connection $conn = null)
  {
    $currentTags = array();
    foreach ($this->Tags as $tag)
    {
      $currentTags[] = $tag->name;
    }
    $newTags = array_keys(Toolkit::extractTags($this->Best->question.' '.$this->Best->answer));
    
    $deleteTags = array_diff($currentTags, $newTags);    
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

    $addTags = array_diff($newTags, $currentTags);
    foreach ($addTags as $name)
    {
      if (!$tag = Doctrine::getTable('Tag')->findOneByName($name))
      {
        $tag = new Tag();
        $tag->name = $name;
      }
      $this->Tags[] = $tag;
    }

    return parent::save($conn);
  }
}