<table>
  <thead>
    <tr>
      <th>Question</th>
      <th>Author</th>
      <th>Num. Answers</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($questions as $question): ?>
    <tr>
      <td><?php echo link_to($question->getTitle(), 'question_show', $question)  ?></td>
      <td><?php echo $question->created_by ?></td>
      <td><?php echo ($question->rgt - $question->lft - 1) / 2 ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('question_new') ?>">New</a>
