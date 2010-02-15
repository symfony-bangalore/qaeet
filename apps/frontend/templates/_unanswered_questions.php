<h3>Latest unanswered:</h3>
<ul>
<?php foreach(Doctrine::getTable('Question')->getUnanswered() as $question): ?>
  <li><?php echo link_to($question->getTitle(), 'question/show?id='.$question->id) ?></li>
<?php endforeach; ?>
</ul>