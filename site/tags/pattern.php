<?php
kirbytext::$tags['pattern'] = array(
  'attr' => array(
  ),
  'html' => function($tag) {
  	$file =  $tag->attr('pattern');
  	return pattern($file, array(), true);
  }
);
