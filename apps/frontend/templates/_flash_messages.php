<?php if ($sf_user->hasFlash('notice')): ?>
  <p class="notice"><img src='/css/bluetrip/img/icons/tick.png'/>
    <?php echo $sf_user->getFlash('notice') ?>
  </p>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
  <p class="error"><img src='/css/bluetrip/img/icons/cross.png'/>
    <?php echo $sf_user->getFlash('error') ?>
  </p>
<?php endif; ?>

<?php if ($sf_user->hasFlash('success')): ?>
  <p class="success"><img src='/css/bluetrip/img/icons/information.png'/>
    <?php echo $sf_user->getFlash('success') ?>
  </p>
<?php endif; ?>
