<?php get_header(); ?>
<?php
$theSlug = get_queried_object()->slug;

$args = array(
  'post_type' => 'products',
  'numberposts' => 9,
  'tax_query' => array(
    array(
      'taxonomy' => 'category',
      'field' => 'slug',
      'terms' => $theSlug,
    )
  ),
);
$singleCategory = get_posts($args);
$categoryId = get_queried_object_id();
$categoryImage = get_taxonomy_image($categoryId);
?>

<section id="category">
  <div
   class="page-thumb parallax-window"
   data-parallax="scroll"
   positionY="0px"
   data-image-src="<?php if ($categoryImage) : echo $categoryImage; endif; ?>">
    <h1><?php single_cat_title(); ?></h1>
  </div>
 
  <div class="container-l filter-buttons">
      <button>Category 1</button>
      <button>Category 2</button>
    </div>
  <div class="category-items container-l">
    <?php foreach ($singleCategory as $item) : ?>
      <?php
      $images = get_field('gallery', $item->ID);
      $article = get_field('article', $item->ID);
      $price = get_field('price', $item->ID);
      $description = get_field('description', $item->ID);
      ?>
      <div class="category-item">
        <a href="<?php the_permalink($item->ID) ?>">
          <div class="image-wrapper">
            <?php if ($images) : ?>
              <img src="<?= $images[0]['url'] ?>" alt="">
            <?php else : ?>
              <img src="http://localhost:8080/wp-content/themes/Puline/assets/images/no-found.png" alt="">
            <?php endif; ?>
          </div>
        </a>
        <div class="product-info">
          <div class="name">
            <a href="<?php the_permalink($item->ID) ?>">
              <?= $item->post_title ?>
            </a>
          </div>
          <div class="article"><?= $article ?? '' ?></div>
          <div class="price">
            <span class="price-name">Цена от:</span>
            <?= $price ?? '' ?> BYN</div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php get_footer(); ?>