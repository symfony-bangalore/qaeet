<?php

/**
 * tag actions.
 *
 * @package    qa
 * @subpackage tag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tagActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $tag = $this->getRoute()->getObject();
    $this->questions = $tag->Questions;
    $this->setTemplate('index', 'question');
  }
}
