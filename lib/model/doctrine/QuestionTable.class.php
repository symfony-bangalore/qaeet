<?php

class QuestionTable extends QATable
{
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