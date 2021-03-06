<?php

/**
 * QA
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    qa
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
class QA extends BaseQA
{
  public function getSlugFromTitle()
  {
    // if a root element, return the first lnie of the question, else a random string
    $slug = $this instanceof Question ? $this->getTitle(false) : $this->slug;
    return strlen($slug) > 0 ? $slug : uniqid('qa-');
  }
}