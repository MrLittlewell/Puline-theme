<?php get_header(); ?>
<?php
$theSlug = get_queried_object()->slug;

$args = array(
  'post_type' => 'products',
  'numberposts' => 8,
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


$current_cat = get_queried_object();
$args = array('child_of' => $current_cat->term_id,);
$categories = get_categories($args);

?>

<section id="category">
  <div class="page-thumb parallax-window" data-parallax="scroll" positionY="0px" data-image-src="<?php if ($categoryImage) : echo $categoryImage;
                                                                                                  endif; ?>">
    <h1><?php single_cat_title(); ?></h1>
  </div>
  <div class="category-wrapper container-l">
    <?php if ($categories) : ?>
      <ul class="filter-buttons">

        <?php foreach ($categories as $category) : ?>
          <li> <?= $category->name ?>
            <svg version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 496 496">
              <g>
                <path d="M488,240H256V8c0-4.418-3.582-8-8-8s-8,3.582-8,8v232H8c-4.418,0-8,3.582-8,8s3.582,8,8,8h232v232c0,4.418,3.582,8,8,8
			s8-3.582,8-8V256h232c4.418,0,8-3.582,8-8S492.418,240,488,240z" />
              </g>
            </svg>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <div class="category-items container-l">
      <?php foreach ($singleCategory as $item) : ?>
        <?php
        $images = get_field('gallery', $item->ID);
        $article = get_field('article', $item->ID);
        $description = get_field('description', $item->ID);

        $hardware_price = get_field('hardware_price', $item->ID);

        $extra_charge = get_field('single_extra_charge', $item->ID);
        $global_markup = get_field('extra_charge', 'option');
        $markup_of_goods = 1;

        if ($extra_charge) {
          $markup_of_goods = $extra_charge;
        } elseif ($global_markup) {
          $markup_of_goods = $global_markup;
        }

        $percent = get_field('percent', $item->ID);

        $product_variations = get_field('product_variations', $item->ID);
        $select_body_materials = get_field('select_body_materials', $item->ID);
        $select_profile_materials = get_field('select_profile_materials', $item->ID);

        $price = [];

        if ($product_variations) {
          foreach ($product_variations as $variation) {
            $price_of_materials = [];
            foreach ($variation['select_profile_materials'] as $profile) {
              $coefficient = $profile['coefficient'];
              $footageProfile = $profile['footage'];
              $priceProfile = get_field('price', $profile['material']->ID);
              $price_of_materials[] = $footageProfile * $priceProfile * $coefficient;
            }
            foreach ($variation['select_body_materials'] as $body) {
              $footageBody = $body['footage'];
              $priceBody = get_field('price', $body['material']->ID);
              $price_of_materials[] = $footageBody * $priceBody;
            }
            if ($percent) {
              $percentPrice = ((array_sum($price_of_materials) + $hardware_price) * $markup_of_goods) / $percent;
              $totalPrice = ((array_sum($price_of_materials) + $hardware_price) * $markup_of_goods) - $percentPrice;
              $price[] = $totalPrice;
            } else {
              $totalPrice = (array_sum($price_of_materials) + $hardware_price) * $markup_of_goods;
              $price[] = $totalPrice;
            }
          }
        }
        ?>
        <div class="category-item">
          <svg class="favorite__icon" data-id="<?= $item->ID ?>" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.35498 4.7123C20.29258 3.6077 18.88062 3 17.38048 3c-1.5012 0-2.91212.6077-3.97346 1.7123l-.90597.9432-.90702-.9432C10.5327 3.6077 9.12178 3 7.62058 3c-1.5012 0-2.91212.6077-3.97346 1.7123C2.58472 5.81693 2 7.28448 2 8.8459c0 1.56145.58473 3.0311 1.64712 4.13467l8.54004 8.8844c.08294.0865.19526.13503.3139.13503.11757 0 .2299-.04853.31283-.13504l8.54108-8.8844C22.41632 11.87597 23 10.40737 23 8.84592c0-1.56143-.58368-3.02898-1.64502-4.1336z" fill-rule="nonzero">
            </path>
          </svg>
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
              <?= round(array_shift($price)) ?> BYN
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>