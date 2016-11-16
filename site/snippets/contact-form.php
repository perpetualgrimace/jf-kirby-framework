<h2><?= $page->text() ?></h2>

<form class="contact-form u-padding-top-lg" id="contact-form" action="<?= $page->url()?>" method="post">


  <div class="g-columns">

    <div class="g-col g-6">
      <label for="contact-form-name"><span><?= $page->labelName() ?></span></label>
      <input name="name" class="is-required" type="text" id="contact-form-name" data-required="true" required autofocus>
      <label class="error" data-validation="name-empty" style="display: none;" for="contact-form-name"><?= $page->errorName() ?></label>
    </div>

    <div class="g-col g-6">
      <label for="contact-form-email"><span><?= $page->labelEmail() ?></span></label>
      <input name="email" class="is-required" type="email" id="contact-form-email" data-required="true" inputmode="email" required>
        <label class="error" data-validation="email-empty" style="display: none;" for="contact-form-email"><?= $page->errorEmail() ?></label>
        <label class="error" data-validation="email-invalid" style="display: none;" for="contact-form-email"><?= $page->errorEmailInvalid() ?></label>
    </div>

  </div>


  <div class="g-columns">

    <div class="g-col">
      <label for="contact-form-text"><span><?= $page->labelText() ?></span></label>
      <textarea name="text" class="is-required" id="contact-form-text" data-required="true" required></textarea>
        <label class="error" data-validation="text-empty" style="display: none;" for="contact-form-text"><?= $page->errorText() ?></label>
    </div>

  </div>


  <label class="uniform__potty" for="website" style="display: none;">Please leave this field blank</label>
  <input type="text" name="website" id="website" class="uniform__potty" style="display: none;">

  <div class="g-columns">
    <div class="g-col">
      <button name="_submit" class="button button--fullwidth" type="submit" value="<?= $form->token() ?>"<? e($form->successful(), ' disabled')?>><?= $page->submit() ?></button>
    </div>
  </div>

</form>
