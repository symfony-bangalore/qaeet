<?php

require_once dirname(__file__).'/../../lib/symfony/1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    require_once dirname(__FILE__).'/../lib/vendor/markdown/markdown.php';
  }
}
