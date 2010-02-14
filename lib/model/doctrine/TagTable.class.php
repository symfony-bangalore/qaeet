<?php

class TagTable extends Doctrine_Table
{
  /**
   * returns an array of alphabetically sorted names, logarithmically sized within boundaries $lowest-$highest
   *
   * @return array key=tagname, value=array(slug, size)
   * @author The Young Shepherd
   **/
  public function getCloud($limit = 50, $lowest = 1, $highest = 2)
  {
    $tags = Doctrine_Query::create()
      ->distinct()
      ->select('t.slug, t.name, count(q.id) as num')
      ->from('Tag t')
      ->innerJoin(('t.Questions q'))
      ->orderBy('num DESC')
      ->groupBy('t.name')
      ->limit($limit)
      ->fetchArray();
      
    $max = log($tags[0]['num']);
    $min = log($tags[count($tags)-1]['num'])-0.00001;
    
    $result = array();
    foreach ($tags as $tag)
    {
      $num = log($tag['num']);
      $fraction = ($num-$min)/($max-$min);
      $size = $lowest+$fraction*($highest - $lowest);
      $result[$tag['name']] = array($tag['slug'], $size);
    }
    
    ksort($result);
    
    return $result;
  }  
}