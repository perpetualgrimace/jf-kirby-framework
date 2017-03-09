<?
  // check for optional variables passed from template
  if(isset($layout)): $layout = $layout; else: $layout = 'g-8'; endif;

  // number of items to show on each page (articles list page)
  $pag_num    = 4;
  $paginated  = $results->paginate($pag_num);
  $pagination = $paginated->pagination();
?>

<section class="section">
  <div class="columns<? if($results->count() == 0): ?> content u-left--center<? else: ?> u-left<? endif ?>">
    <article class="column <?= $layout ?>">


      <!-- if results are found -->
      <? if($results->count() != 0): ?>

        <h2>Your search for &lsquo;<?= $query ?>&rsquo; returned <?= $results->count() ?> page<? if($results->count() > 1): echo 's'; endif ?>:</h2>

        <ol class="search">
          <? foreach($paginated as $result): ?>
          <li class="search__item">
            <h3 class="delta search__title">
              <a class="u-linked_heading search__link" href="<?= $result->url() ?>">
                <?= $result->title() ?>
              </a>
            </h3>
            <p class="search__excerpt milli"><? if ($result->description() != ''): echo $result->description(); else: echo excerpt($result->text()->kirbytext(), 500); endif ?></p>
            <a class="search__more_link milli" href="<?= $result->url() ?>"><?= $result->uri() ?></a>
          </li>
          <? endforeach ?>
        </ol>

        <? if ($pagination->items() > $pag_num): ?>
          <?= snippet('pagination', array('pagination' => $pagination)) ?>
        <? endif; ?>


    <!-- if no results are found -->
    <? elseif (($query != '') && $results->count == ''): ?>

      <h2>Your search for '<?= $query ?>' returned 0 results.</h2>

      <?= $page->text()->kirbytext() ?>


    <!-- if the user searches for just blank spaces or somehow winds up on the search page without a query -->
    <?php else: ?>

      <h2>That's not a real search.</h2>

      <p>You could try a different search or <a href="<?= $site->url() ?>">visit the home page</a>?</p>

    <? endif ?>
