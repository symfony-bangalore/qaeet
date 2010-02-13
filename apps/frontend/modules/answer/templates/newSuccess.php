<h1><?php echo $question->getTitle() ?></h1>
<p><?php echo $question->getBody() ?></p>
<hr/>
<?php include_partial('form', array('form' => $form)) ?>
