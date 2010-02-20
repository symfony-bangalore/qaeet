<?php slot('title', sprintf('%s', $question->getTitle())) ?>

<?php if ($question->Origin->exists()): slot('subtitle'); ?>
  <img src='/icon/arrow-curve-000-left.png'/> Branched from: <?php echo link_to($question->Origin->Root->getTitle(), 'question_show', $question->Origin->Root) ?>
<?php end_slot(); endif; ?>

<?php slot('sidebar') ?>
  <?php include_partial('see_also',array('question'=>$question)) ?>
<?php end_slot() ?>


<div class='main_content'>
  <?php if (strlen($question->getBody()) > 0): ?>
    <div class='question'>
      <?php echo Toolkit::HTMLify($question->getRawValue()->getBody()) ?>
    </div>
  <?php endif; ?>
  
  <div class='answer'>
    <?php echo Toolkit::HTMLify($question->getRawValue()->getBest()->answer) ?>
  </div>
</div>

<div class='divider'></div>

<?php include_partial('answer/form',array('form'=>$form, 'toggle'=>true)) ?>

<?php include_partial('discussion',array('question'=>$question)) ?>
