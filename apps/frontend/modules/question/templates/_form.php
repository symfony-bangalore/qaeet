<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@question') ?>
<ul>
  <?php echo $form ?>
  <li>
    <button type="submit"><img src='/icon/plus.png'/>Save</button>
  </li>
</ul>
</form>
