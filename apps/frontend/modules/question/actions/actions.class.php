<?php

/**
 * question actions.
 *
 * @package    qa
 * @subpackage question
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class questionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->questions = Doctrine::getTable('Question')->createQuery('q')->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->question = $this->getRoute()->getObject();
    $answer = new Answer();
    $answer->question = $this->question->Best->question;
    $answer->answer = $this->question->Best->answer;
    $answer->ReplyTo = $this->question->Best;
    $this->form = new AnswerForm($answer);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new QuestionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new QuestionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new QuestionForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new QuestionForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('@question');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $question = $form->save();

      $this->redirect('question_show',$question);
    }
  }
}
