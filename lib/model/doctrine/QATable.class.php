<?php

class QATable extends Doctrine_Table
{
  public function getQuestions()
  {
    return $this->getTree()->fetchRoots();
  }
}