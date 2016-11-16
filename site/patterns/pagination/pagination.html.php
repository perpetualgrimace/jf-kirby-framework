<section class="u-center">

  <nav class="pag u-center milli">

    <a href="<? echo $pagination->prevPageURL() ?>" class="pag-item milli<? if($pagination->hasPrevPage()): echo '"'; else: echo ' is-disabled" disabled'; endif; ?>><svg width="9" height="12" viewBox="0 0 9 12"><path d="M.668 5.884l5.367-4.884 1.344 1.223-4.699 4.276 4.703 4.28-1.341 1.221-6.047-5.503.673-.612z"/></svg>
    prev</a>

  <? foreach($pagination->range('5') as $r): ?>
    <a class="pag-item milli<? if($pagination->page() == $r) echo ' is-active' ?>" href="<? echo $pagination->pageURL($r) ?>"><? echo $r ?></a>
  <? endforeach ?>

    <a href="<? echo $pagination->nextPageURL() ?>" class="pag-item milli<? if($pagination->hasNextPage()): echo '"'; else: echo ' is-disabled" disabled'; endif; ?>">next <svg width="9" height="12" viewBox="0 0 9 12"><path d="M8.316 5.884l-5.367-4.884-1.344 1.223 4.699 4.276-4.703 4.28 1.341 1.221 6.047-5.503-.673-.612z"/></svg></a>

  </nav>

</section>
