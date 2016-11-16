<?

// check for optional variables passed from template
if(isset($layout)): $layout = $layout; else: $layout = 'g-4'; endif;

// define categories
$showCategories = FALSE;
$categories = $pages->find('blog')->children()->visible()->pluck('template', ',', TRUE);

?>

<aside class="sidebar g-col <?= $layout ?>">

  <!-- search blog -->
  <? snippet('search-bar', array(
    'searchTarget' => 'blog-list',
    'searchPlaceholder' => 'Search articles...'
  )) ?>


  <!-- sort by template - currently not working as intended -->
  <? if ($showCategories == TRUE): ?>

  <h2 class="delta">Categories:</h2>

  <nav class="sidebar-nav">
    <ul class="u-unbullet">

      <? foreach($categories as $category):
        $categorySanitized = str_replace('blog-', '', $category);
      ?>
      <li class="sidebar-item">
        <a class="milli" href="<? echo url('blog/' . url::paramsToString(['template' => $category])) ?>">
          <?= $categorySanitized ?>
        </a>
      </li>
      <? endforeach ?>

    </ul>
  </nav>

  <? endif ?>

</aside>
