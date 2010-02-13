<h1><?php echo $question->getTitle() ?></h1>
<table>
  <tbody>
    <tr>
      <th>Author:</th>
      <td><?php echo $question->Author ?></td>
    </tr>
    <tr>
      <th>Question:</th>
      <td><?php echo $question->getBody() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<ul>
<?php foreach ($question->Answers as $answer): ?>
  <li class='answer'>
    <?php echo include_partial('answer/answer',array('answer'=>$answer)); ?>
  </li>
<?php endforeach; ?>
</ul>

<a href="<?php echo url_for('answer/new?question_id='.$question->getId()) ?>">Add your answer</a>
&nbsp;
<a href="<?php echo url_for('question/edit?id='.$question->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('question/index') ?>">List</a>
