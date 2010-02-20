<h3>Popular tags:</h3>
<ul class='tag_cloud'>
<?php foreach (Doctrine::getTable('Tag')->getCloud(50, 93, 131) as $name => $value): 
  list($slug, $size) = $value; ?>
  <li class='tag' style='font-size: <?php echo ceil($size) ?>%;<?php echo $size == 131 ? " font-weight: bold;" : "" ?>'>
    <?php echo link_to($name, 'tag_show',array('slug'=>$slug)) ?>
  </li>
<?php endforeach; ?>
</ul>
