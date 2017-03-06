<?php
// access $page fields within kirytext
kirbytext::$tags['page'] = array(
  'attr' => array(),
  'html' => function($tag) {
  	$field = $tag->attr('page');
    $val = kirby()->page()->$field();
  	return $val;
  }
);
