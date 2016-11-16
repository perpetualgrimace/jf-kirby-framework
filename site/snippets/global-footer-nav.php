<?

// main menu items
$items = $pages->visible();

?>


<a class="footer-nav-logo<? e( $page->isHomePage(), ' is-active-pg' ) ?>" href="<? e( $page->isHomePage(), '#main', $site->url() ) ?>">
  <?= $site->title() ?>
</a>

<ul class="footer-nav-list">
  <? foreach($items as $item): ?>

    <li class="footer-nav-item">
      <a class="footer-link footer-nav-link<? e($item->isOpen(), ' is-active-pg') ?>" <? e( ($item->slug() == $page->slug()), 'aria-describedby="current"' ) ?> href="<? e( $item->isOpen() && ( $page->slug() == $item->slug() ), '#main', $item->url() ) ?>">
      <?= $item->uri(); if($item->uri() == 'about'): ?>
        <span class="u-screenreader"> <?= $site->title() ?></span>
      <? endif; ?>
      </a>
    </li>

    <? endforeach ?>
</ul>
