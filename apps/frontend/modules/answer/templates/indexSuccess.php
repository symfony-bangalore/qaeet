<h1>Answers List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Question</th>
      <th>Comment</th>
      <th>Answer</th>
      <th>Question</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($answers as $answer): ?>
    <tr>
      <td><a href="<?php echo url_for('answer/show?id='.$answer->getId()) ?>"><?php echo $answer->getId() ?></a></td>
      <td><?php echo $answer->getAuthorId() ?></td>
      <td><?php echo $answer->getQuestionId() ?></td>
      <td><?php echo $answer->getComment() ?></td>
      <td><?php echo $answer->getAnswer() ?></td>
      <td><?php echo $answer->getQuestion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('answer/new') ?>">New</a>
