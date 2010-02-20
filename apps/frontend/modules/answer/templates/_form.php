<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@answer') ?>
<?php echo $form->renderHiddenFields() ?>
<?php echo $form->renderGlobalErrors() ?>
<ul>
  <li>
    <?php echo $form['comment']->renderError() ?>
    <?php echo $form['comment']->renderLabel() ?>
    <?php echo $form['comment']->render() ?>
  </li>
  <?php if (isset($toggle)): ?>
  <li>
    <button type="submit" class='positive'><img src='/icon/plus.png'/>Submit</button>    
    <a id='toggle' class='show_on_load toggle_view button'><img src='/icon/magnifier-zoom-actual-equal.png'/>Show question and answer fields in the form below, so I can update them as well</a>
    <div class='clear'></div>
  </li>
  <?php endif ?>
  <li<?php echo isset($toggle) ? " class='hide_on_load toggle_view'" : ""?>>
    <?php echo $form['question']->renderError() ?>
    <?php echo $form['question']->renderLabel() ?>
    <?php echo $form['question']->render() ?>
  </li>
  <li<?php echo isset($toggle) ? " class='hide_on_load toggle_view'" : ""?>>
    <?php echo $form['answer']->renderError() ?>
    <?php echo $form['answer']->renderLabel() ?>
    <?php echo $form['answer']->render() ?>
  </li>
  <li<?php echo isset($toggle) ? " class='hide_on_load toggle_view'" : ""?>>
    <button type="submit" class='positive'><img src='/icon/plus.png'/>Submit</button>    
    <div class='clear'></div>
  </li>
</ul>
</form>
