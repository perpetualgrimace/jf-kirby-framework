<?

return function($site, $pages, $page) {

  $query = get('q');

  if($query != '') {

    $results = page('blog')->search($query, 'title|text|byline|references|description|author');
    $results = $results->visible()->sortBy('date');

    return array(
      'query'      => $query,
      'results'    => $results
    );
  };
};
