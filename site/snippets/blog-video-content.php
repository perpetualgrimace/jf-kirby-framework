<?

// check for optional variables passed from template
if(isset($layout)) { $layout = $layout; } else { $layout = 'g-8'; }
if(isset($field)) { $field = $page->$field(); } else { $field = $page->text(); }
if($page->youtubeId() != '') {
  $videoUrl = 'http://www.youtube.com/embed/' . $page->youtubeId();
} else {
  $videoUrl = 'youtube.com';
}

?>

<article class="content g-col <?= $layout ?>">

  <div class="video-container">
    <iframe class="video-iframe" width="560" height="315" src="<?= $videoUrl ?>" frameborder="0" allowfullscreen></iframe>
  </div>

  <?= $field->kirbytext() ?>

</article>
