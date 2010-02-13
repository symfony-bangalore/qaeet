<h1>Questions List</h1>

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
      <td><?php echo link_to($question->getQuestion(), 'question/show?id='.$question->id)  ?></td>
      <td><?php echo $question->Author ?></td>
      <td><?php echo count($question->Answers) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('question/new') ?>">New</a>
