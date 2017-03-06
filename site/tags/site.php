<?php
// access $site fields within kirytext
kirbytext::$tags['site'] = array(
  'attr' => array(),
  'html' => function($tag) {
  	$field = $tag->attr('site');
    $val = kirby()->site()->$field();
  	return $val;
  }
);
