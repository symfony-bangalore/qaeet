<?php

class TagTable extends Doctrine_Table
{
  public function getCloud()
  {
    $tags = Doctrine_Query::create()
      ->select('t.name, COUNT(q.question_id) as num')
      ->from('Tag t')
      ->innerJoin(('t.QuestionTags q'))
      ->orderBy('num DESC')
      ->limit(100)
      ->fetchArray();
    return $tags;
  }
  
  public function findOrCreateByName(array $names)
  {
    if (count($names) > 0)
    {
      $tags = Doctrine_Query::create()
        ->from('Tag t')
        ->whereIn('t.name', $names)
        ->execute();
      
      foreach ($tags as $tag)
      {
        $key = array_search($tag->name, $names);
        if ($key !== false)
        {
          unset($names[$tag->name]);
        }
      }
      
      
      foreach ($names as $name)
      {
        $tag = new Tag();
        $tag->name = $name;
        $tags->add($tag);
      }
    }
    else
    {
      $tags = new Doctrine_Collection($this);
    }
    
    return $tags;
  }
}