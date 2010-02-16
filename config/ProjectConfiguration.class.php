<?php

require_once dirname(__file__).'/../../lib/symfony/1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfDoctrineApplyPlugin');
    
    require_once dirname(__FILE__).'/../lib/vendor/markdown/markdown.php';
    
    // include ZEND
    set_include_path(dirname(__FILE__)."/../../lib/zend/trunk/library".PATH_SEPARATOR.get_include_path());
    require_once 'Zend/Loader/Autoloader.php';
    Zend_Loader_Autoloader::getInstance();

    // configure swift
    #$this->SwiftMailer->smtpType = 'tls';
    #$this->SwiftMailer->smtpHost = 'smtp.gmail.com';
    #$this->SwiftMailer->smtpPort = 465;
    #$this->SwiftMailer->smtpUsername = 'name@domain.com';
    #$this->SwiftMailer->smtpPassword = 'your_password';
  }
}
