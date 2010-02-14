<?php

  /**
   * Applies syntax highlighting AND Markdown to a text
   *
   * @return highlighted text
   * @author The Young Shepherd
   **/
  function HTMLify($text)
  {
    // extract php code blocks and apply the php highlighter to it
    $tokens = token_get_all($text);

    $text = '';
    $code = '';    
    
    $state = 'text';
    $renderCode = false;
    foreach ($tokens as $token)
    {
      switch ($token[0])
      {
        case T_OPEN_TAG:
          $state = 'code';
          $code = $token[1];
          break;
        case T_CLOSE_TAG:
          $code .= $token[1];
          $text .= highlight_string($code, true);
          $code = '';
          $state = 'text';
          break;          
        default:
          $$state .= $token[1];
      }
    }
    
    return Markdown($text);
  }

?>

<h1><?php echo $question->getTitle() ?></h1>
Posted by <?php echo $question->Author ?> 
on <?php echo $question->getDateTimeObject('created_at')->format('m/d/Y') ?>
<div class='question'>
  <?php echo HTMLify($sf_data->getRaw('question')->getBody()) ?>
</div>

<?php if (null !== $question->BestAnswer): ?>
Answered by <?php echo $question->BestAnswer->Author ?> 
on <?php echo $question->BestAnswer->getDateTimeObject('created_at')->format('m/d/Y') ?>
<div class='answer answer_best'>
  <?php echo HTMLify($sf_data->getRaw('question')->BestAnswer->answer) ?>
</div>
<?php endif; ?>

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
