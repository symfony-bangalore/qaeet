<h3>Latest unanswered:</h3>
<ul>
<?php foreach(Doctrine::getTable('Question')->getUnanswered() as $question): ?>
  <li><?php echo link_to(htmlentities($question->getTitle()), 'question_show', $question) ?></li>
<?php endforeach; ?>
</ul>