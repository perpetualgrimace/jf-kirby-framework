<?

// license
c::set('license', 'Enter Kirby pro license here');

// cache
c::set('cache', true);
c::set('cache.ignore', array(
  'contact',
  'search',
  'sitemap',
  'feed'
));

// .md extension support
c::set('content.file.extension', 'md');

// smart quotes
c::set('smartypants', true);

// thumbnails
c::set('thumbs.driver', 'im');

// languages
c::set('languages', array(
  array(
    'code'    => 'en',
    'name'    => 'English',
    'locale'  => 'en_US',
    'default' => true,
    'url'     => '/'
  )
));

// patterns config
c::set('patterns.preview.css', 'assets/build/css/main.min.css');
c::set('patterns.preview.js', 'assets/build/js/main.min.js');

// routing
c::set('routes', array(

  // rss » feed
  array(
    'pattern' => 'rss',
    'action'  => function() {
      go('feed');
    }
  ),

  // admin » panel
  array(
    'pattern' => 'admin',
    'action'  => function() {
      go('panel');
    }
  ),

  // components » patterns
  array(
    'pattern' => 'components',
    'action'  => function() {
      go('patterns');
    }
  )
));
