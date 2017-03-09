<?

// main menu items
if ($page->depth() == '2') {
  $items = $page->siblings()->visible();
  $parent = $page->parent();
} else if ($page->depth() == '3') {
  $items = $page->parent()->siblings()->visible();
  $parent = $page->parent()->parent();
} else {
  $items = NULL;
  $parent = 'Sidebar nav is currently configured for pages nested 2 and 3 levels deep';
}

?>

<nav class="sidebar-nav g-col dark-theme">

  <h2 class="sidebar-title delta"><?= $parent->title() ?></h2>

  <ul class="sidebar-nav-list">

  <? if ($items != NULL):
    foreach($items as $item): ?>

    <li class="sidebar-nav-item nav-item">
      <a class="sidebar-nav-link nav-link<? e($item->isOpen() && $page->depth() == 2, ' is-active-pg') ?>" href="<? e( $item->isOpen() && ( $page->slug() == $item->slug() ), '#main', $item->url() ) ?>">
        <?= $item->title() ?>
      </a>

      <? if($item->hasVisibleChildren()): ?>

      <ul class="nested-sidebar-nav-list" role="group">
        <? foreach($item->children()->visible() as $child): ?>

          <li class="nested-sidebar-nav-item nav-item" role="menuitem">
            <a class="nested-sidebar-nav-link nav-link<? e($child->isOpen(), ' is-active-pg') ?>" href="<? e( $child->isOpen() && ( $page->slug() == $child->slug() ), '#main', $child->url() ) ?>">
              <?= $child->title() ?>
            </a>
          </li><!-- dropdown-item -->

        <? endforeach ?>
      </ul><!-- dropdown -->

    <? endif ?>

    </li><!-- nav-item -->

  <? endforeach;
  endif; ?>

  </ul> <!-- nav-list -->
</nav>
