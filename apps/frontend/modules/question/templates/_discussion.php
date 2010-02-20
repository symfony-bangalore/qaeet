<?php
  $discussion = $question->getDiscussion();
  if ($discussion !== false): ?>
  <div class='divider'></div>
  <h3>Current discussion</h3>
  <ul>
    <?php $time = time();
          foreach ($discussion as $answer): ?>
      <li style='margin-top:<?php echo ceil(log($time - strtotime($answer->created_at))); $time = strtotime($answer->created_at); ?>px'>
        <?php include_partial('answer/answer',array('answer'=>$answer)) ?>
      </li>
    <?php endforeach ?>
  </ul>
<?php endif ?>