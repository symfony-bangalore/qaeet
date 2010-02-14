<?php slot('title', sprintf('%s', $question->getTitle())) ?>

Posted by <?php echo $question->Author ?> 
on <?php echo $question->getDateTimeObject('created_at')->format('m/d/Y') ?>
<div class='question'>
  <?php echo Toolkit::HTMLify($sf_data->getRaw('question')->getBody()) ?>
</div>

<?php if ($question->hasBestAnswer()): ?>
Answered by <?php echo $question->BestAnswer->Author ?> 
on <?php echo $question->BestAnswer->getDateTimeObject('created_at')->format('m/d/Y') ?>
<div class='answer answer_best'>
  <?php echo Toolkit::HTMLify($sf_data->getRaw('question')->BestAnswer->answer) ?>
</div>
<?php endif; ?>

<hr/>
<ul class='tag_list'>
<?php foreach ($question->Tags as $tag): ?>
  <li><?php echo $tag ?></li>
<?php endforeach; ?>
</ul>
<hr />

<?php echo "<pre>".var_dump(Doctrine::getTable('Tag')->getCloud(),true)."</pre>" ?>

<ul>
<?php foreach ($question->Answers as $answer): ?>
  <li class='answer'>
    <?php echo include_partial('answer/answer',array('answer'=>$answer)); ?>
  </li>
<?php endforeach; ?>
</ul>

<a href="<?php echo url_for('answer/new?question_id='.$question->getId()) ?>">Add your answer</a>
&nbsp;
<a href="<?php echo url_for('question/edit?id='.$question->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('question/index') ?>">List</a>
