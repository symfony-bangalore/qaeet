<div class='answer_item <?php echo $answer->isBest()?' answer_item_best':'' ?>'>  
  <div class='answer_item_content'>
    <P>
      <?php echo $answer->Author ?> answered on <?php echo $answer->getDateTimeObject('created_at')->format('m/d/Y') ?>
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

    <?php echo link_to('Branch to own thread&nbsp;<img src="/icon/arrow-branch-090.png"/>', 'answer/branch?id='.$answer->id, array('class'=>'button branch_button','title'=>'This answer is very helpful, but a little off topic. Click here to give it an own life!')) ?>
    <?php if (!$answer->isBest()): ?>
      <?php echo link_to('<img src="/icon/thumb-up.png"/>Vote as best!', 'answer/votebest?id='.$answer->id, array('class'=>'button positive','title'=>'This answer is the best answer (yet) and should be displayed as the default answer. Click here to make that happen!')) ?>
    <?php endif; ?>
  </div>

  <p class='comment'>
    <?php echo $answer->Author ?>: <?php echo $answer->getComment() ?>    
  </p>
</div>
