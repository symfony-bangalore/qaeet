<h3 title='This is you, right?'><?php echo ucfirst($sf_user->getUsername()) ?></h3>
<p>
  <?php if ($sf_user->isAuthenticated()): ?>
    <?php echo link_to('Logout','@sf_guard_signout', array('class'=>'button negative')) ?>
    It's good you are here!
  <?php else: ?>
    <?php echo link_to('Login','@sf_guard_signin', array('class'=>'button positive', 'title'=>'You already have an account? Click here')) ?>
    <?php echo link_to('Register','@apply', array('class'=>'button', 'title'=>'You don\'t have an account yet? Click here')) ?>
    It's no fun being anonymous...
  <?php endif; ?>
</p>