<?php

class myUser extends sfGuardSecurityUser
{
  public function getUsername()
  {
    if ($this->isAuthenticated())
    {
      return parent::getUsername();
    }
    return 'Anonymous_'.$_SERVER['REMOTE_ADDR'];
  }
}
