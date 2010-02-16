<h3 title='This is you, right?'><?php echo ucfirst($sf_user->getUsername()) ?></h3>
<p>
  <?php if ($sf_user->isAuthenticated()): ?>
    <?php echo link_to('Logout','@sf_guard_signout', array('class'=>'button negative')) ?>
    It's good you are here!
  <?php else: ?>
    <?php echo link_to('login','@sf_guard_signin', array('class'=>'button positive')) ?>
    <?php echo link_to('sign up','@sf_guard_signin', array('class'=>'button')) ?>
    It's no fun being anonymous...
  <?php endif; ?>
</p>