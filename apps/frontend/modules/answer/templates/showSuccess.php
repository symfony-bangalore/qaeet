<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $answer->getId() ?></td>
    </tr>
    <tr>
      <th>Question:</th>
      <td><?php echo $answer->getQuestion() ?></td>
    </tr>
    <tr>
      <th>Answer:</th>
      <td><?php echo $answer->getAnswer() ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $answer->getType() ?></td>
    </tr>
    <tr>
      <th>Best:</th>
      <td><?php echo $answer->getBestId() ?></td>
    </tr>
    <tr>
      <th>Origin:</th>
      <td><?php echo $answer->getOriginId() ?></td>
    </tr>
    <tr>
      <th>Comment:</th>
      <td><?php echo $answer->getComment() ?></td>
    </tr>
    <tr>
      <th>Reply:</th>
      <td><?php echo $answer->getReplyId() ?></td>
    </tr>
    <tr>
      <th>Root:</th>
      <td><?php echo $answer->getRootId() ?></td>
    </tr>
    <tr>
      <th>Lft:</th>
      <td><?php echo $answer->getLft() ?></td>
    </tr>
    <tr>
      <th>Rgt:</th>
      <td><?php echo $answer->getRgt() ?></td>
    </tr>
    <tr>
      <th>Level:</th>
      <td><?php echo $answer->getLevel() ?></td>
    </tr>
    <tr>
      <th>Slug:</th>
      <td><?php echo $answer->getSlug() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $answer->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $answer->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $answer->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $answer->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('answer_edit', $answer) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('answer') ?>">List</a>
