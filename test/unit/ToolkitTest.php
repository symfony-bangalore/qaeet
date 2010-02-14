<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

$t = new lime_test(1, new lime_output_color());

$t->comment('Testing extract tags');

$t->is(Toolkit::extractTags('#tag #Foo #bar #foo #Foo #bar'), 
  array(
    'tag'=>1, 
    'foo'=>3, 
    'bar'=>2
  ), '::extractTags returns an array with tags and count');