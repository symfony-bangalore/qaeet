<?php

require_once dirname(__file__).'/../../lib/symfony/1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    
    require_once dirname(__FILE__).'/../lib/vendor/markdown/markdown.php';
    
    // configure swift
    #$this->SwiftMailer->smtpType = 'tls';
    #$this->SwiftMailer->smtpHost = 'smtp.gmail.com';
    #$this->SwiftMailer->smtpPort = 465;
    #$this->SwiftMailer->smtpUsername = 'name@domain.com';
    #$this->SwiftMailer->smtpPassword = 'your_password';
  }
}
