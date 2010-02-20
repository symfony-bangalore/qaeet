<?php

class myUser extends sfGuardSecurityUser
{
  public function getUsername()
  {
    if ($this->isAuthenticated())
    {
      return parent::getUsername();
    }
    return 'Anonymous@'.$_SERVER['REMOTE_ADDR'];
  }
}
