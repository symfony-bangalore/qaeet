<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $answer->getId() ?></td>
    </tr>
    <tr>
      <th>Author:</th>
      <td><?php echo $answer->getAuthorId() ?></td>
    </tr>
    <tr>
      <th>Question:</th>
      <td><?php echo $answer->getQuestionId() ?></td>
    </tr>
    <tr>
      <th>Comment:</th>
      <td><?php echo $answer->getComment() ?></td>
    </tr>
    <tr>
      <th>Answer:</th>
      <td><?php echo $answer->getAnswer() ?></td>
    </tr>
    <tr>
      <th>Question:</th>
      <td><?php echo $answer->getQuestion() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('answer/edit?id='.$answer->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('answer/index') ?>">List</a>
