 <?

  // check for optional variables passed from template
  if(isset($layout)): $layout = $layout; else: $layout = 'g-8'; endif;
  if(isset($cardLayout)): $cardLayout = $cardLayout; else: $cardLayout = ''; endif;

  // number of items to show on each page (articles list page)
  if (isset($pagNum)) {
    $pagNum = $pagNum;
  } else {
    $pagNum = 12;
  }

  // articles list page with pagination
  if(isset($query) && ($query != '')) {
    $items = $results;
  } else {
    $items = $pages->find('blog')->children()->visible()->sortBy('date')->flip()->paginate($pagNum);
  }

  $pagination = $items->pagination();

?>

<div class="g-columns g-col <?= $layout ?> u-fullheight">
  <div class="g-col content">

    <!-- check for a search query and display result count in a heading -->
    <? if (isset($query)) {
       if ($results->count() > 0): ?>
        <h2>Your search for &lsquo;<?= $query ?>&rsquo; returned <?= $results->count() ?> article<? if($results->count() > 1): echo 's'; endif ?>:</h2>

      <? elseif ($results->count() == 0): ?>
        <h2>Your search for '<?= $query ?>' returned 0 results.</h2>

        <p>Try a different search or <a href="<?= $page->url() ?>">browse all articles</a>.</p>

      <? endif;
    } ?>

    <? if ($page->isHomePage()): ?>
      <h2 class="u-padding-bottom"><?= $pages->find('blog')->headline() ?></h2>
    <? endif ?>


    <!-- display cards -->
    <? if ($items->count() != 0): ?>
      <div class="g-columns">
        <? foreach ($items as $item) {
          pattern('card', array('item' => $item, 'cardLayout' => $cardLayout));
        } ?>
      </div>
    <? endif ?>


    <!-- display pagination if necessary... -->
    <? if($page->isHomePage() && ($pagination->items() > $pagNum)) { ?>
      <a href="blog" class="more-link">All posts</a>
    <? } elseif (isset($pagination) && ($pagination->items() > $pagNum)) {
      pattern('pagination', array('pagination' => $pagination));
    } ?>

  </div>
</div>
