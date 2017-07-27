<? $lang = $site->language() ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?= $lang ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?= $lang ?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?= $lang ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?= $lang ?>"> <!--<![endif]-->
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!--<meta name="google-site-verification" content="google-verification-here">-->

  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <?

  // meta text and image for linking and sharing
  snippet('global-head-seo');

  // favicon and touch icons
  snippet('global-head-icons');

  // if on localhost, use dev stylesheet
  $hostName = gethostname();

  if (strpos($hostName, '.local') !== false) {
    echo css('assets/build/css/main.dev.css');
  } else {
    echo css('assets/build/css/main.production.css');
  };

  ?>

</head>
