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
        <li class="under-category">
          <span>
            Все
          </span>
          <svg version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 496 496">
            <g>
              <path d="M488,240H256V8c0-4.418-3.582-8-8-8s-8,3.582-8,8v232H8c-4.418,0-8,3.582-8,8s3.582,8,8,8h232v232c0,4.418,3.582,8,8,8
			s8-3.582,8-8V256h232c4.418,0,8-3.582,8-8S492.418,240,488,240z" />
            </g>
          </svg>
        </li>
        <?php foreach ($categories as $category) : ?>
          <li class="under-category">
            <span>
              <?= $category->name ?>
            </span>
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
    <div class="category-items container-l search-category">
      <?php include 'search-category.php' ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>