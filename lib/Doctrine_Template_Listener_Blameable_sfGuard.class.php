<?php

class Doctrine_Template_Listener_Blameable_sfGuard extends Doctrine_Template_Listener_Blameable
{
  /**
   * @return string The current username or 'Anonymous-'+ip-address if not known
   */
  public function getUserIdentity()
  {
    if (PHP_SAPI === 'cli')
    {
      return "Anonymous-CLI";
    }
    
    $user = sfContext::getInstance()->getUser();
    if ($user instanceof sfGuardSecurityUser && $user->isAuthenticated())
    {
      return $user->getGuardUser()->getUsername();
    } 
    else
    {
      return "Anonymous@".$_SERVER['REMOTE_ADDR'];
    }
  }
}
