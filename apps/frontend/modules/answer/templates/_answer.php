<div class='comment'>      
  <div style='float: right'>
    <?php echo $answer->created_by ?> on <?php echo $answer->created_at ?>
    
    <div class='menubar show_only_on_hover'>    
      <?php if (strlen($answer->question) > 0 || strlen($answer->answer) > 0): ?>
        <?php echo link_to('Branch off <img src=\'/icon/arrow-branch-090.png\'/>', 'answer_branch', $answer, array('class'=>'button', 'style'=>'float: right')) ?>
      <?php endif ?>
      
      <?php if (count($answer->Branches) == 0): ?>
        <?php echo link_to('<img src=\'/icon/thumb-up.png\'/>Promote as best!', 'answer_best', $answer, array('class'=>'button positive')) ?>
      <?php else: ?>
        Question(s) branched from this answer:
        <ul>
          <?php foreach($answer->Branches as $branch): ?>
            <li><img src='/icon/arrow-curve-000-left.png'/> <?php echo link_to($branch->getTitle(), 'question_show', $branch) ?></li>
          <?php endforeach?>
        </ul>
      <?php endif ?>
    </div>
  </div>
  
  <?php echo Toolkit::HTMLify($answer->getRawValue()->comment) ?>
  
  <?php if (strlen($answer->question) > 0): ?>
    <pre class='question'><?php echo Toolkit::diff($answer->getRawValue()->Root->Best->question, $answer->getRawValue()->question) ?></pre>
  <?php endif; ?>
  
  <?php if (strlen($answer->answer) > 0): ?>          
    <pre class='answer'><?php echo Toolkit::diff($answer->getRawValue()->Root->Best->answer, $answer->getRawValue()->answer) ?></pre>
  <?php endif; ?>

  <div class='clear'></div>
</div>    
