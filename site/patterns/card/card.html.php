<?

  // determine card type
  $contentType = $item->intendedTemplate();

  // get thumbnail image
  if(($contentType = 'blog-video') && ($item->youtubeId() != '')) {
    $thumbImg = 'http://img.youtube.com/vi/' . $item->youtubeId() . '/1.jpg';
  } elseif ($item->thumbImg() != '') {
    $thumbImg = $item->image($item->thumbImg())->url();
  } else {
    $thumbImg = $site->url() . '/';
  }

  // get author
  if($item->author() != '') {
    $author = $item->author();
  } else {
    $author = $site->title();
  }

  // get layout
  if($cardLayout != '') {
    $cardLayout = $cardLayout;
  } else {
    $cardLayout = '';
  }

?>

<article class="<?= $contentType?>-card-container card-container g-col <?= $cardLayout ?>">

  <a href="<?= $item->url() ?>" class="<?= $contentType?>-card-thumb card-thumb" tabindex="-1">
    <img class="<?= $contentType?>-card-img card-img" src="<?= $thumbImg ?>" alt="" draggable="false">
  </a>

  <div class="<?= $contentType?>-card-caption card-caption">
     <a class="<?= $contentType?>-card-title card-title display gamma" href="<?= $item->url() ?>"><?= $item->title() ?></a>
     <p class="<?= $contentType?>-card-meta card-meta">Posted by <?= $author ?></p>
  </div>

</article>
