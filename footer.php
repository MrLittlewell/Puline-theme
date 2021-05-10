<footer>
    <div class="container-l">
        <div class="footer-menu">
          <?php wp_nav_menu([
            'menu' => 'header_and_footer_menu',
            'theme_location' => 'header_and_footer_menu',
          ]); ?>
        </div>

      <?php
      $address = get_field('address', 'option');
      $email = get_field('email', 'option');
      $phone = get_field('phone', 'option');
      $social_networks = get_field('social_networks', 'option');
      ?>
        <div class="footer-information">
            <div class="contact-info">
                <div> Контактный адрес </div>
                <div> <?= $address ?> </div>
            </div>
            <div class="contact-info">
                <div> Контактная почта </div>
                <div> <?= $email ?> </div>
            </div>
            <div class="contact-info">
                <div> Контактный телефон </div>
                <div> <?= $phone ?> </div>
            </div>
        </div>
        <div class="footer-social-image">

          <?php if ($social_networks) : ?>
            <?php foreach ($social_networks as $social) : ?>
                  <div>
                      <a href="<?= $social['link']['url'] ?>">
                          <img src="<?= $social['image_social']['url'] ?>" alt="">
                      </a>
                  </div>
            <?php endforeach; ?>
          <?php endif; ?>

        </div>
    </div>
        <div class="Copyright">Copyright &copy; <?php echo date("Y"); ?>. &nbsp;
            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>.
            Все права защищены. <br/>
        </div>

</footer>
<div>
  <?php wp_footer(); ?>

    </body>

    </html>