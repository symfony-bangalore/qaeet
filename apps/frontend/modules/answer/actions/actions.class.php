<?php

/**
 * answer actions.
 *
 * @package    qa
 * @subpackage answer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class answerActions extends sfActions
{
  public function executeBest(sfWebRequest $request)
  {
    $answer = $this->getRoute()->getObject();
    $answer->makeBest();
    $this->redirect('question_show',$answer->getRoot());
  }

  public function executeBranch(sfWebRequest $request)
  {
    $answer = $this->getRoute()->getObject();
    $question = $answer->branchOff();
    $this->form = new QuestionForm($question);
    $this->setTemplate('new', 'question');
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->answers = $this->getRoute()->getObjects();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->answer = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AnswerForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new AnswerForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new AnswerForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new AnswerForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('@answer');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $answer = $form->save();
      $question = Doctrine::getTable('Question')->find($answer->root_id);
      $this->redirect('question_show',$question);
    }
  }
}
