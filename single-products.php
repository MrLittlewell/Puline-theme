<?php get_header(); ?>
<section>
  <div id="product" class="container-l">
    <?php
    $id = get_the_ID();
    $post = get_post($id);
    ?>
    <?php if ($post) : ?>
      <?php
      $images = get_field('gallery', $post->ID);
      $article = get_field('article', $post->ID);
      $price = get_field('price', $post->ID);
      $description = get_field('description', $post->ID);
      ?>
      <div class="single_product">
        <ul class="single_product__gallery">
          <?php if ($images) : ?>
            <?php foreach ($images as $image) : ?>
              <li data-src="<?= $image['url'] ?>">
              <img src="<?= $image['url'] ?>" alt="">
            </li>
            <?php endforeach; ?>
          <?php endif; ?>
            </ul>
        <div class="single_product__info">
          <h1 class="single_product_title"> <?= $post->post_title ?? '' ?> </h1>
          <?php
          $productCategories = get_the_terms($post->ID, 'category');
          ?>
          <div class="single_product_categories"> Категории:
            <?php if ($productCategories) : ?>
              <?php $countCategories = count($productCategories) ?>
              <?php foreach ($productCategories as $categories) : ?>
                <a href="<?= get_term_link($categories->term_id, 'category'); ?>">
                  <?= $categories->name ?? '' ?>
                </a>
                <?php
                if ($countCategories > 1) echo ',';
                $countCategories--;
                ?>
              <?php endforeach ?>
            <?php endif ?>
          </div>
          <div class="single_product_article"> <?= $article ?? '' ?> </div>
          <div class="single_product_price"> <?= $price ?? '' ?> BYN</div>
        </div>
      </div>
      <div class="single_product_description">
        <h3>Описание</h3>
         <?= $description ?? '' ?> 
        </div>
    <?php endif ?>
  </div>
</section>
<?php get_footer(); ?>