<?

// set pages to be fed
$blogs = $pages->find('blog')->children()->visible()->sortBy('date')->limit(10);

// get the ten most recent ones
$items = new Pages(array($blogs));
$items = $items->sortBy('date')->limit(10);

  snippet('feed', array(
    'link'  => url(''),
    'items' => $items,
    'descriptionField'  => 'description',
    'descriptionLength' => 150
  ));
