<?php get_header(); ?>
<?php
$categories = get_terms([
    'taxonomy' => 'category',
    'hide_empty' => true,
    'post_per_page' => -1,
    'parent' => 0,
]);

?>
<section id="catalog">
    <h1>Каталог товаров</h1>
    <div class="catalog-items container-l">
        <?php if ($categories): ?>
            <?php foreach ($categories as $category) : ?>
                <?php $categoriesImage = get_taxonomy_image($category->term_id); ?>
                <div class="catalog-item">
                    <a href="<?= get_term_link($category->term_id, 'category'); ?>">
                        <div class="image-wrapper">
                            <?php if ($categoriesImage): ?>
                                <img class="catalog-item-image" src="<?= $categoriesImage ?>" alt="">
                            <?php endif; ?>
                        </div>
                        <p class="catalog-item-title"><?= $category->name ?></p>
                    </a>
                </div>
            <?php
            endforeach;
        endif;
        ?>
    </div>
</section>
<?php get_footer(); ?>
