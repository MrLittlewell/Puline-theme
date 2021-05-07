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
?>

<section id="category">
  <div class="page-thumb parallax-window" data-parallax="scroll" positionY="0px" data-image-src="<?php if ($categoryImage) : echo $categoryImage;
                                                                                                  endif; ?>">
    <h1><?php single_cat_title(); ?></h1>
  </div>
  <div class="category-wrapper container-l">
    <ul class="filter-buttons">
      <li>Category 1<svg version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 496 496">
          <g>
            <path d="M488,240H256V8c0-4.418-3.582-8-8-8s-8,3.582-8,8v232H8c-4.418,0-8,3.582-8,8s3.582,8,8,8h232v232c0,4.418,3.582,8,8,8
			s8-3.582,8-8V256h232c4.418,0,8-3.582,8-8S492.418,240,488,240z" />
          </g>
        </svg>
      </li>
      <li>Category 2<svg version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 496 496">
          <g>
            <path d="M488,240H256V8c0-4.418-3.582-8-8-8s-8,3.582-8,8v232H8c-4.418,0-8,3.582-8,8s3.582,8,8,8h232v232c0,4.418,3.582,8,8,8
			s8-3.582,8-8V256h232c4.418,0,8-3.582,8-8S492.418,240,488,240z" />
          </g>
        </svg>
      </li>
    </ul>
    <div class="category-items container-l">
      <?php foreach ($singleCategory as $item) : ?>
        <?php
        $images = get_field('gallery', $item->ID);
        $article = get_field('article', $item->ID);
        $price = get_field('price', $item->ID);
        $description = get_field('description', $item->ID);
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
              <?= $price ?? '' ?> BYN
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</section>

<?php get_footer(); ?>