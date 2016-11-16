<?

// check for optional variables passed from template
if(isset($layout)): $layout = $layout; else: $layout = 'g-4'; endif;

?>

<aside class="sidebar g-column <?= $layout ?>">

  <p>Check out this sidebar</p>

</aside>
