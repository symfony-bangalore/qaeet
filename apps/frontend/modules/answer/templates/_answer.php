<div class='answer_item <?php echo $answer->isBest()?' answer_item_best':'' ?>'>  
  <p class='comment'>
    <?php echo $answer->getDateTimeObject('created_at')->format('m/d/Y') ?>
     - <?php echo $answer->getAuthorName() ?>
     : <?php echo $answer->getComment() ?>
  </p>

  <?php if (!$answer->isNewer()): ?>
    <div class='answer_item_float'>   
  <?php endif; ?>
   
    <P>
      <?php echo link_to('Branch to own thread&nbsp;<img src="/icon/arrow-branch-090.png"/>', 'answer/branch?id='.$answer->id, array('class'=>'button branch_button','title'=>'This answer is very helpful, but a little off topic. Click here to give it an own life!')) ?>
      <?php if (!$answer->isBest()): ?>
        <?php echo link_to('<img src="/icon/thumb-up.png"/>Vote as best!', 'answer/votebest?id='.$answer->id, array('class'=>'button positive','title'=>'This answer is the best answer (yet) and should be displayed as the default answer. Click here to make that happen!')) ?>
      <?php endif; ?>
    </p>

    <?php if (!$answer->isBest()): ?>
      <?php if (!empty($answer->question) && $answer->question !== $answer->Question->question): ?>
        <div class='question'>
          <?php echo $answer->question ?>
        </div>
      <?php endif; ?>
      <?php if (strlen($answer->answer)>0): ?>
        <div class='answer'>
          <?php echo $answer->answer ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>

  <?php if (!$answer->isNewer()): ?>
    </div>
  <?php endif; ?>
</div>
