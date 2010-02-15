<h3>Latest answers:</h3>
<ul>
<?php foreach(Doctrine::getTable('Answer')->getLatest() as $answer): ?>
  <li><?php echo link_to($answer->Question->getTitle(), 'question/show?id='.$answer->Question->id) ?></li>
<?php endforeach; ?>
</ul>