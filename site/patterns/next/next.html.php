<?

// the next page will be the previous article,
// unless there are no older articles, in which case it will be the latest article
if ($page->hasPrevVisible()) {
  $next = $page->prevVisible();
} else {
  $next = $page->siblings()->visible()->last();
}

// set next image
if ($next->hero() != '') {
  $nextImg = $next->hero();
} else {
  $nextImg = NULL;
}

?>

<section class="next-up">
  <div class="row" role="presentation">
    <span class="heading">Next up: </span>
  </div>
</section>

<section class="next fullwidth no-padding">

   <a href="<?= $next->url() ?>" class="next-link padding">
     <div class="row u-margin-top u-margin-bottom">
       <h2 class="display"><span class="u-screenreader">Next up: </span>
         <?= $next->title() ?>
       </h2>
     </div>
   </a>

   <div class="next-img u-margin-top-off" style="background-image: url(<?= $nextImg ?>);"></div>

</section>
