<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>QAeet - <?php include_slot('title', 'Symfony Bangalore') ?></title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
  
    <div id="doc4" class="yui-t1">
      <div id="hd" role="banner"><h1><img src='/images/qanda.png'/><?php include_slot('title', 'QAeet - Symfony Bangalore') ?></h1></div>
             
      <div id="bd" role="main"> 
        <div id="yui-main"> 
          <div class="yui-b">
            <div class="yui-g"> 
              <?php echo $sf_content ?> 
            </div> 
          </div> 
        </div>         
        <div role="navigation" class="yui-b">
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
          <!-- YOUR NAVIGATION GOES HERE -->
        </div>          
      </div> 
      
      <div id="ft" role="contentinfo"><p>Open sourced forum QA software, see <a href='http://github.com/symfony-bangalore/qaeet'>GitHub</a> - http://symfony-bangalore.org</p></div> 
    </div>

  </body>
</html>
