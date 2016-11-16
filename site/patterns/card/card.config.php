<?

return [
  'defaults' => [
    'item' => function() {
      return site()->pages()->find('blog')->children()->visible()->shuffle()->first();
    },
    'cardLayout' => ''
  ]
];
