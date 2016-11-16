<?

return [
  'defaults' => [
    'next' => function() {
      return site()->pages()->find('blog')->children()->visible()->shuffle()->first();
    }
  ]
];
