<?php

/**
* Checks if a string starts with a question word
*/
class sfValidatorStringEditedOrCommented extends sfValidatorSchema
{  
  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('no_edit', 'You should at least edit something in the comment, the question or the answer');
    
    parent::configure($options, $messages);
  }
  
  protected function doClean($values)
  {
    $best = Doctrine::getTable('QA')->find($values['reply_id']);
    if (!$best)
    {
      throw new sfValidatorError($this, 'invalid');
    }
    
    $questionNoEdit = strlen(trim($values['question'])) === 0 || trim($values['question']) === trim($best->question);
    $answerNoEdit   = strlen(trim($values['answer']  )) === 0 || trim($values['answer']) === trim($best->answer);
    $commentNoEdit  = strlen(trim($values['comment'] )) === 0;
    
    if ($questionNoEdit && $answerNoEdit && $commentNoEdit)
    {
      throw new sfValidatorError($this, 'no_edit');
    }
        
    return $values;
  }
}
