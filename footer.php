    <footer>
      <?php wp_nav_menu([
          'menu' => 'header_and_footer_menu',
          'theme_location' => 'header_and_footer_menu',
      ]);
      $address = get_field('address', 'option');
      $email = get_field('email', 'option');
      $phone = get_field('phone', 'option');
      $social_networks = get_field('social_networks', 'option');
      ?>
        <div class="footer-information">
            <div> <?= $address ?> </div>
            <div> <?= $email ?> </div>
            <div> <?= $phone ?> </div>
            <div>
              <?php if ($social_networks) : ?>
                <?php foreach ($social_networks as $social) : ?>
                    <a href="<?= $social['link']['url'] ?>">
                        <img src="<?= $social['image_social']['url']   ?>" alt="">
                    </a>
                <?php endforeach;?>
                <?php endif;?>
            </div>
            
        </div>
    </footer>
    <div>
    <?php wp_footer(); ?>

  </body>
</html>