<?php

class QuestionTable extends Doctrine_Table
{
  public function getLatest($limit = 10)
  {
    return Doctrine_Query::create()
      ->from('Question q')
      ->orderBy('q.created_at DESC')
      ->limit($limit)
      ->execute();
  }

  public function getUnanswered($limit = 10)
  {
    return Doctrine_Query::create()
      ->from('Question q')
      ->where('q.best_id is null')
      ->orderBy('q.created_at DESC')
      ->limit($limit)
      ->execute();
  }
}