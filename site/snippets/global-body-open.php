<?
// get template
$template = str_replace('.', '-', $page->intendedTemplate()) . ' ';

// get slug
if ($page->slug() != $template) {
  $slug = $page->slug() . ' ';
} else {
  $slug = '';
}

$depth = 'depth-' . $page->depth();

// put it all together
$bodyClasses = $template . $slug . $depth;

?>

<body class="<?= $bodyClasses ?>">
