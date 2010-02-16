<?php slot('title', sprintf('%s', $answer->Question->getTitle())) ?>

<h2>Edit Answer</h2>

<?php include_partial('form', array('form' => $form)) ?>
