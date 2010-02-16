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
  
    <div id="doc4" class="yui-t3">
      <div id="hd" role="banner"><?php echo link_to("<img src='/images/qanda.png'/>","/") ?><h1><?php include_slot('title', 'QAeet - Symfony Bangalore') ?></h1></div>
             
      <div id="bd" role="main"> 
        <div id="yui-main"> 
          <div class="yui-b">
            <div class="yui-g"> 
              <?php echo $sf_content ?> 
            </div> 
          </div> 
        </div>         
        <div id="yui-nav" role="navigation" class="yui-b">
          <?php include_partial('global/flash_messages') ?>
          <?php include_partial('global/user_status') ?>
          <?php include_partial('global/unanswered_questions') ?>
          <?php include_partial('global/tagcloud') ?>
          <?php include_partial('global/latest_answers') ?>

          <!-- YOUR NAVIGATION GOES HERE -->
        </div>          
      </div> 
      
      <div id="ft" role="contentinfo"><p>Open sourced forum QA software, see <a href='http://github.com/symfony-bangalore/qaeet'>GitHub</a> - http://symfony-bangalore.org</p></div> 
    </div>

  </body>
</html>
