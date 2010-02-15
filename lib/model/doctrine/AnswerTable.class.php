<?php

class AnswerTable extends Doctrine_Table
{
  public function getLatest($limit = 10)
  {
    return Doctrine_Query::create()
      ->select('DISTINCT a.*')
      ->from('Answer a')
      ->leftJoin('a.Question q')
      ->orderBy('a.created_at DESC')
      ->limit($limit)
      ->execute();
  }

}