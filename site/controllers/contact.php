<?

return function($site, $pages, $page) {

  // IMPORTANT: must match form ID
  $form = uniform('contact-form', [
      'required' => [
        'name' => '',
        'email' => 'email',
        'text' => ''
      ],
      'actions'  => [
        [
          '_action' => 'email',
          'to'      => $page->email(),
          'sender'  => $page->email(),
          'subject' => 'New message from the {{website-title}} contact form'
        ]
      ]
    ]
  );

  return compact('form');
};
