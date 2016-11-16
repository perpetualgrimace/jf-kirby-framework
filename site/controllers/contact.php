<?

return function($site, $pages, $page) {

  // IMPORTANT: must match form ID
  $form = uniform('contact-form', array(
      'required' => array(
        'name' => '',
        'email' => 'email',
        'text' => ''
      ),
      'actions'  => array(
        array(
          '_action' => 'email',
          'to'      => $page->email(),
          'sender'  => $page->email(),
          'jobtitle' => '',
          'institution' => '',
          'city' => '',
          'state' => '',
          'subject' => 'New message from the website-title contact form'
        )
      )
    )
  );

  return compact('form');
};
