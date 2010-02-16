<?php

/**
* Checks if a string starts with a question word
*/
class sfValidatorStringQuestion extends sfValidatorString
{
  
  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('not_a_question', 'Provided question should start with a \'question\' word, like \'How do I ...\' or \'Where can I find...\'. Your question starts with \'%first%\' though.');
    
    $this->addOption('words', array(
      'who','what','when','where','how','whom','whose','which','why'
    ));
    
    parent::configure($options, $messages);
  }
  
  /**
  * @see sfValidatorBase
  */
  protected function doClean($value)
  {
    $clean = parent::doClean($value);
    
    $first = strtolower(trim(substr($clean,0,strpos($clean, ' '))));
    
    if (!in_array($first, $this->getOption('words')))
    {
      throw new sfValidatorError($this, 'not_a_question', array('first' => $first));
    }
        
    return $clean;
  }
}
