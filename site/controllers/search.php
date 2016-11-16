<?

return function($site, $pages, $page) {

  $query   = get('q');
  $results = $site->index()->visible()->search($query, 'title|text|description|hashtag|author');
  $results = $results->sortBy('depth');

  return array(
    'query'      => $query,
    'results'    => $results
  );

};
