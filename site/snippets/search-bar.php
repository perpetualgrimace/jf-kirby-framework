<?

// set search scope
if (isset($searchTarget)) {
  $searchUrl = $pages->findBy('intendedTemplate', $searchTarget)->url();
} else {
  $searchUrl = $pages->find('search')->url();
}

// set search text input placeholder text
if (isset($searchPlaceholder)) { // passed from template
  $searchPlaceholder = $searchPlaceholder;
} elseif ($page->template() == 'error') {
  $searchPlaceholder = 'Search site...';
} else {
  $searchPlaceholder = 'Type and hit enter';
}

?>

<form class="search append-button" method="get" action="<?= $searchUrl ?>">

  <input class="search-input milli" type="search" name="q" placeholder="<?= $searchPlaceholder ?>">

  <button class="search-submit milli button" type="submit"><? snippet('icon-search') ?><span class="u-screenreader">Search</span></button>

</form>
