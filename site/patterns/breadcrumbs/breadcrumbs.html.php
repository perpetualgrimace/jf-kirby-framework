<nav class="breadcrumbs" role="navigation">
  <ul class="breadcrumbs-list container inline-list">

    <? foreach($site->breadcrumb() as $crumb): ?>
      <? if(($crumb->uri() != 'home') && ($crumb->uri() != $page->uri())): ?>

      <li class="breadcrumbs-item">
        <a class="breadcrumbs-link milli<? e(($crumb->slug() == $page->slug()), ' is-active_pg') ?>" href="<?= $crumb->url() ?>">
          <?= $crumb->title() ?>
        </a>
      </li>

      <? endif ?>
    <? endforeach ?>

  </ul>
</nav>
