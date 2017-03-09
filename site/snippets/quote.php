<?

// quote parent page slug
$quotes = 'quotes';

// if a source is specified, pull that one
if(isset($source) && $source != '') {
  $quote = $pages->find($quotes . '/' . $source);

// otherwise, pull a random one
} else {
  $quote = $pages->find($quotes)->children()->shuffle()->first();
}

?>

<section class="quote section u-fullwidth">
  <div class="g-columns u-padding-top-xl u-padding-bottom-xl">
    <div class="g-col g-8 u-margins-auto">
      <blockquote class="quote-quote">
        <p class="quote-text beta"><?= $quote->text() ?></p>
        <p class="quote-attribution">&mdash;<?= $quote->title() ?></p>
      </blockquote>
    </div>
  </div>
</section>
