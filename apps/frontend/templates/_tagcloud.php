<ul class='tagcloud'>
<?php foreach (Doctrine::getTable('Tag')->getCloud(50, 90, 130) as $name => $value): 
  list($id, $size) = $value; ?>
  <li class='tag' style='font-size: <?php echo floor($size) ?>%'>
    <?php echo link_to($name, 'question/show?id='.$id) ?>
  </li>
<?php endforeach; ?>
</ul>
