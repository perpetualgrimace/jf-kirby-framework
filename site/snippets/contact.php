<div class="g-col">

<?
// display either the contact form or a UI message
if(!$form->hasMessage()) { snippet('contact-form'); }
else { snippet('contact-messages'); }
?>

</div>
