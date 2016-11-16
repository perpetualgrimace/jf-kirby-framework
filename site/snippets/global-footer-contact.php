<?

// get contact info
$phone = $pages->find('contact')->phone();
$phoneSanitized = preg_replace('/[^0-9]/', '', $phone);
$email = $pages->find('contact')->email();

?>

<h3 class="footer-contact-heading delta">Contact us</h3>

<ul class="footer-contact-list inline-list">
  <li class="footer-contact-item milli">
    <a class="footer-contact-link footer-link" href="mailto:<?= $email ?>">
      <?= $email ?>
    </a>
  </li>
  <li class="footer-contact-item milli">
    <a class="footer-contact-link footer-link" href="tel:<?= $phoneSanitized ?>">
      <?= $phone ?>
    </a>
  </li>
</ul>
