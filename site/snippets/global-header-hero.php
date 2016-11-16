<?

$currImg   = $page->heroImg();
$parentImg = $page->parent()->heroImg();

if($page->depth() >= 2) {
  $grandParentImg = $page->parent()->parent()->heroImg();
}

if     ($currImg)        { $img = $page->image($currImg); }
elseif ($parentImg)      { $img = $page->image($parentImg); }
elseif ($grandParentImg) { $img = $page->image($grandParentImg); }
else                     { $img = NULL; }

if ($img != NULL):

?>

<div class="hero u-margin-top-off" style="background-image: url('<?= $img->url() ?>');">
  <!-- <img class="hero-img" src="<?//= $img->url() ?>" alt="" draggable="false"> -->
</div>

<? endif ?>
