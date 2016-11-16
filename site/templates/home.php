<?

// define content types
$articles = $pages->find('blog')->children()->visible()->filterBy('template', 'blog-article');

snippet('global-head');
snippet('global-body-open');
  snippet('global-nav');


  // page title
  snippet('global-main-open');
    snippet('home-header');
    // pattern('scroll-indicator');

    // intro content
    snippet('global-section-open');
      snippet('global-textblock', array('layout' => ''));
    snippet('global-section-close');

    // blog content
    snippet('global-section-open');
      snippet('blog-list', array('pagNum' => 6, 'cardLayout' => 'g-6', 'layout' => ''));
    snippet('global-section-close');

  snippet('global-main-close');

  // footer
  snippet('global-footer');
  snippet('global-footer-scripts');
snippet('global-body-close');
