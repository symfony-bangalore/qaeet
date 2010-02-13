<table class='answer<?php echo $answer->isBest()?' best_answer':'' ?>'>
  <tbody>
    <tr>
      <th>Author:</th>
      <td><?php echo $answer->Author ?></td>
    </tr>
    <tr>
      <th>Comment:</th>
      <td><?php echo $answer->getComment() ?></td>
    </tr>
    <?php if (strlen($answer->answer)>0): ?>
      <tr>
        <th>
        <?php if (!$answer->isBest()): ?>
          <?php echo link_to('Vote as best<br/>', 'answer/votebest?id='.$answer->id) ?>
        <?php endif; ?>
        Answer:</th>
        <td><?php echo $answer->getAnswer() ?></td>
      </tr>
    <?php endif; ?>
    <?php if (!empty($answer->question) && $answer->question !== $answer->Question->question): ?>
      <tr>
        <th>Changed question into:</th>
        <td><?php echo $answer->question ?></td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>