<?

// main menu items
$items = $pages->visible();

// text that applies next to menu icon
$menutext = 'menu';

?>


<div class="nav-container">
  <nav class="nav nav-main g-container u-padding-top-off" role="navigation">
    <div class="g-columns">
      <div class="g-col u-padding-top-off u-padding-bottom-off">


        <!-- skip link -->
        <a class="button-inverted skip u-screenreader" href="#main">Skip to content</a>


        <!-- logo -->
        <a class="nav-logo<? e( $page->isHomePage(), ' is-active-pg' ) ?>" href="<? e( $page->isHomePage(), '#main', $site->url() ) ?>">
          <?= $site->title() ?>
        </a>


        <!-- nav menu toggle for small screens -->
        <a class="nav-toggle is-inactive" data-nav="toggle" href="#nav">
          <div class="hamburger is-inactive" data-nav="hamburger">
            <span class="hamburger-bun hamburger-bun-top"></span>
            <span class="hamburger-bun hamburger-bun-patty"></span>
            <span class="hamburger-bun hamburger-bun-bottom"></span>
          </div>
          <span class="nav-toggle-text"><?= $menutext ?></span>
        </a>


        <!-- main nav -->
        <ul id="nav" class="nav-list is-collapsed">

        <? foreach($items as $item): ?>

          <li class="nav-item<? e(in_array($item->uri(), $site->dropdownable()->yaml()), ' has-dropdown" aria-haspopup="true'); ?>">
            <a class="nav-link<? e($item->isOpen(), ' is-active-pg') ?>" <? e( ($item->slug() == $page->slug()), 'aria-describedby="current"' ) ?> href="<? e( $item->isOpen() && ( $page->slug() == $item->slug() ), '#main', $item->url() ) ?>">
            <?= $item->uri(); if($item->uri() == 'about'): ?>
              <span class="u-screenreader"> <?= $site->title() ?></span>
            <? endif; ?>
            </a>


            <!-- dropdown, checked against $site->dropdownable() list -->
            <? if($item->hasChildren() &&
            in_array($item->uri(), explode(', ', $site->dropdownable()))): ?>

            <ul class="dropdown" role="group">
              <? foreach($item->children()->visible() as $child): ?>

                <li class="dropdown-item" role="menuitem">
                  <a id="dropdown-item-<?= $child->slug() ?>" class="dropdown-link<? e($child->isOpen(), ' is-active-pg') ?>" <? e( ($child->slug() == $page->slug() ), 'aria-describedby="current"') ?> href="<? e( $child->isOpen() && ( $page->slug() == $child->slug() ), '#main', $child->url() ) ?>">
                    <?= $child->title() ?>
                  </a>
                </li><!-- dropdown-item -->

              <? endforeach ?>
            </ul><!-- dropdown -->

          <? endif ?>

          </li><!-- nav-item -->

        <? endforeach ?>

        </ul> <!-- nav-list -->


        <!-- current page indicator for screenreader folk -->
        <div hidden id="current">Current page</div>
      </div>
    </div>
  </nav>
</div>
