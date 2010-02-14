<h3>Popular tags:</h3>
<ul class='tag_cloud'>
<?php foreach (Doctrine::getTable('Tag')->getCloud(50, 90, 130) as $name => $value): 
  list($id, $size) = $value; ?>
  <li class='tag' style='font-size: <?php echo ceil($size) ?>%;<?php echo $size == 130 ? " font-weight: bold;" : "" ?>'>
    <?php echo link_to($name, 'tag/index?id='.$id) ?>
  </li>
<?php endforeach; ?>
</ul>
