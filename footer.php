<footer>
  <div class="container-l">
    <div class="footer-menu">
      <?php wp_nav_menu([
        'menu' => 'header_and_footer_menu',
        'theme_location' => 'header_and_footer_menu',
      ]); ?>
    </div>

    <?php
    $contacts = get_field('contacts', 'option');
    $social_networks = get_field('social_networks', 'option');
    ?>
      <div class="footer-information">
          <div class="contact-info">
              <p class="ct-title">Адрес</p>
            <?php if ($contacts) : ?>
              <?php foreach ($contacts as $contact) : ?>
                    <p> <?= $contact['address'] ?> </p>
              <?php endforeach ?>
            <?php endif; ?>
          </div>
          <div class="contact-info">
              <p class="ct-title">Email</p>
            <?php if ($contacts) : ?>
              <?php foreach ($contacts as $contact) : ?>
                    <a href="mailto:<?= $contact['email'] ?>"><?= $contact['email'] ?></a>
              <?php endforeach ?>
            <?php endif; ?>
          </div>
          <div class="contact-info">
              <p class="ct-title">Телефон</p>
            <?php if ($contacts) : ?>
              <?php foreach ($contacts as $contact) : ?>
                    <a href="tel:<?= $contact['phone'] ?>"> <?= $contact['phone'] ?> </a>
              <?php endforeach ?>
            <?php endif; ?>
          </div>
      </div>
    <div class="footer-social-image">
      <?php if ($social_networks) : ?>
        <?php foreach ($social_networks as $social) : ?>
          <a href="<?= $social['link']['url'] ?>">
            <img src="<?= $social['image_social']['url'] ?>" alt="">
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="Copyright">Copyright &copy; <?php echo date("Y"); ?>. &nbsp;
    <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>.
    Все права защищены. <br />
  </div>

</footer>
<div>
  <?php wp_footer(); ?>

  </body>

  </html>