<?php get_header(); ?>
<?php
$categories = get_terms([
    'taxonomy' => 'category',
    'hide_empty' => true,
    'post_per_page' => -1,
]);


echo "<pre>";
var_dump($categories);
echo "</pre>";
?>
<section>
    <div class="catalog">
        <?php foreach ($categories as $category) :?>
        <?php $categoriesImage = get_taxonomy_image($category->term_id);?>
        <div class="catalog-item">
            <div class="catalog-item-title"> <?= $category->name ?> </div>
            <img src="<?php echo $categoriesImage?>" alt="">
        </div>
        <?php endforeach;?>
    </div>
</section>



<?php get_footer(); ?>
