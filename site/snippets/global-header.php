<?
//set headline
if($page->headline() != '') { $headline = $page->headline(); }
else { $headline = $page->title(); }
?>

<header class="header u-fullwidth dark-theme" role="banner">

  <div class="g-container">
    <div class="g-col">
      <h1 class="header-headline"><?= $headline ?></h1>

      <? if ($page->subhead() != ''): ?>
        <h2 class="header-subhead delta"><?= $page->subhead() ?></h2>
      <? endif ?>

    </div>

    <div class="g-col">
      <? snippet('breadcrumbs') ?>
    </div>

  </div>

  <? snippet('global-header-hero') ?>

</header>
