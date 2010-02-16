<?php 
  use_stylesheets_for_form($form);
  use_javascripts_for_form($form);
  $form->getWidgetSchema()->setFormFormatterName('list');
?>

<?php echo $form->renderFormTag(
        url_for('answer/' .($form->getObject()->isNew() ? 'create' : 'update')
                  .(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : ''))
        , array(
          'class'  => 'question_form',
          'method' => $form->getObject()->isNew() ? 'post' : 'put'
        )) ?>
<?php echo $form->renderHiddenFields() ?>

  <ul>
    <?php echo $form['question']->renderRow(array('class'=>'question')); ?>
    <?php echo $form['answer']->renderRow(array('class'=>'answer')); ?>
    <?php echo $form['comment']->renderRow(array('class'=>'comment')); ?>
    <li>
      <button type='submit' class='button positive'><img src='/icon/plus.png'/>Submit</button>
  
      &nbsp;<a href="<?php echo url_for('question/show?id='. $form->getObject()->Question->id) ?>">Back to question</a>
      <?php if (!$form->getObject()->isNew()): ?>
        &nbsp;<?php echo link_to('Delete', 'answer/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
      <?php endif; ?>
    </li>
  </ul>  
</form>
