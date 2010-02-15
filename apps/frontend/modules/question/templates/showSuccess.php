<?php slot('title', sprintf('%s', $question->getTitle())) ?>

<div class='question'>
  <?php echo Toolkit::HTMLify($sf_data->getRaw('question')->getBody()) ?>
</div>
<p>Posted by <?php echo $question->Author ?> 
on <?php echo $question->getDateTimeObject('created_at')->format('m/d/Y') ?></p>

<?php if ($question->hasBestAnswer()): ?>
<div class='answer answer_best'>
  <?php echo Toolkit::HTMLify($sf_data->getRaw('question')->BestAnswer->answer) ?>
</div>
<p>Best answer (yet) by <?php echo $question->BestAnswer->Author ?> 
on <?php echo $question->BestAnswer->getDateTimeObject('created_at')->format('m/d/Y') ?></p>
<?php endif; ?>

<p>
  <?php echo link_to("<img src='/icon/plus.png'/>".($question->hasBestAnswer() ? "Improve this answer!" : "Answer this question"), 'answer/new?question_id='.$question->getId(), array('class'=>'button positive')) ?>
</p>

<ul class='tag_list'>
<?php foreach ($question->Tags as $tag): ?>
  <li class='tag'><?php echo link_to($tag,'tag/index?id='.$tag->id) ?></li>
<?php endforeach; ?>
</ul>

<hr/>

<ul>
<?php foreach ($question->Answers as $answer): ?>
  <li class='answer'>
    <?php echo include_partial('answer/answer',array('answer'=>$answer)); ?>
  </li>
<?php endforeach; ?>
</ul>

