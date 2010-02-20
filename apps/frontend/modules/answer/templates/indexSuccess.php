<h1>Answers List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Question</th>
      <th>Answer</th>
      <th>Type</th>
      <th>Best</th>
      <th>Origin</th>
      <th>Comment</th>
      <th>Reply</th>
      <th>Root</th>
      <th>Lft</th>
      <th>Rgt</th>
      <th>Level</th>
      <th>Slug</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($answers as $answer): ?>
    <tr>
      <td><a href="<?php echo url_for('answer_show', $answer) ?>"><?php echo $answer->getId() ?></a></td>
      <td><?php echo $answer->getQuestion() ?></td>
      <td><?php echo $answer->getAnswer() ?></td>
      <td><?php echo $answer->getType() ?></td>
      <td><?php echo $answer->getBestId() ?></td>
      <td><?php echo $answer->getOriginId() ?></td>
      <td><?php echo $answer->getComment() ?></td>
      <td><?php echo $answer->getReplyId() ?></td>
      <td><?php echo $answer->getRootId() ?></td>
      <td><?php echo $answer->getLft() ?></td>
      <td><?php echo $answer->getRgt() ?></td>
      <td><?php echo $answer->getLevel() ?></td>
      <td><?php echo $answer->getSlug() ?></td>
      <td><?php echo $answer->getCreatedAt() ?></td>
      <td><?php echo $answer->getUpdatedAt() ?></td>
      <td><?php echo $answer->getCreatedBy() ?></td>
      <td><?php echo $answer->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('answer_new') ?>">New</a>
