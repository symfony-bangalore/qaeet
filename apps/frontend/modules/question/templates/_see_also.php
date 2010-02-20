<?php
  $branches = $question->getBranches();
  if (count($branches) > 0): ?>
  <h3>See also</h3>
  <ul>
    <?php foreach ($branches as $branch): ?>
      <li>
        <img src='/icon/arrow-curve-000-left.png'/> <?php echo link_to($branch->getTitle(), 'question_show', $branch) ?>
      </li>
    <?php endforeach ?>
  </ul>
<?php endif ?>