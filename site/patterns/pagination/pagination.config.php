<?

return [
  'defaults' => [
    'pagination' => function() {
      return site()->homePage()->children()->visible()->flip()->paginate(10)->pagination();
    }
  ]
];
