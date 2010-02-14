<h3>Latest:</h3>
<ul>
<?php foreach(Doctrine::getTable('Question')->getLatest() as $question): ?>
  <li><?php echo link_to($question->getTitle(), 'question/show?id='.$question->id) ?></li>
<?php endforeach; ?>
</ul>