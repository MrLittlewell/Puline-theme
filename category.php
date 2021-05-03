<?php get_header(); ?>
<?php
$theSlug = get_queried_object()->slug;

$args = array(
    'post_type' => 'products',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $theSlug,
        )
    ),
);
$singleCategory = get_posts($args);
?>

 <section id="category">
   <h1><?php single_cat_title(); ?></h1>
     <div>
         <?php foreach ($singleCategory as $item) : ?>
             <?php
             $images = get_field('gallery', $item->ID);
             $article = get_field('article', $item->ID);
             $price = get_field('price', $item->ID);
             $description = get_field('description', $item->ID);
             ?>
         <div class="catalog-item">
             <a href="<?php the_permalink($item->ID)?>">
                 <div class="image-wrapper">
                     <?php if ($images): ?>
                             <img src="<?= $images[0]['url'] ?>" alt="">
                     <?php endif; ?>
                 </div>
                 <p class=""><?= $item->post_title ?></p>
                 <div class=""> <?= $article ?? '' ?> </div>
                 <div class=""> <?= $price ?? '' ?> </div>
             </a>
         </div>
    <?php endforeach;?>
     </div>
 </section>

<?php get_footer(); ?>