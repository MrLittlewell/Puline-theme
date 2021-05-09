<?php get_header(); ?>
<?php
$theSlug = get_queried_object()->slug;
$args = array(
  'post_type' => 'products',
  'numberposts' => -1,
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
    <h1 data-slug="<?= $theSlug ?>"><?php single_cat_title(); ?></h1>
  </div>
  <div class="category-wrapper <?php if (!$categories) : echo 'container-l';
                                endif; ?>">
    <?php if ($categories) : ?>
      <div class="stiky-wrapper">
        <ul class="filter-buttons">
          <li class="under-category">
            <span data-slug="all">
              Все
            </span>
            <svg viewBox="0 0 512 512">
              <path d="M508.875,248.458l-160-160c-4.167-4.167-10.917-4.167-15.083,0c-4.167,4.167-4.167,10.917,0,15.083l141.792,141.792
			H10.667C4.771,245.333,0,250.104,0,256s4.771,10.667,10.667,10.667h464.917L333.792,408.458c-4.167,4.167-4.167,10.917,0,15.083
			c2.083,2.083,4.813,3.125,7.542,3.125c2.729,0,5.458-1.042,7.542-3.125l160-160C513.042,259.375,513.042,252.625,508.875,248.458z
			" />
            </svg>

          </li>
          <?php foreach ($categories as $category) : ?>
            <li class="under-category">
              <span data-slug="<?= $category->slug ?>">
                <?= $category->name ?>
              </span>
              <svg viewBox="0 0 512 512">
                <path d="M508.875,248.458l-160-160c-4.167-4.167-10.917-4.167-15.083,0c-4.167,4.167-4.167,10.917,0,15.083l141.792,141.792
			H10.667C4.771,245.333,0,250.104,0,256s4.771,10.667,10.667,10.667h464.917L333.792,408.458c-4.167,4.167-4.167,10.917,0,15.083
			c2.083,2.083,4.813,3.125,7.542,3.125c2.729,0,5.458-1.042,7.542-3.125l160-160C513.042,259.375,513.042,252.625,508.875,248.458z
			" />
              </svg>

            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
    <div class="category-items search-category <?php if ($categories) : echo 'container-r';
                                                endif; ?>">
      <?php include 'search-category.php' ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>