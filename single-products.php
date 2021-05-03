<?php get_header(); ?>
    <section>
        <div class="catalog">
            <?php
            $args = [
                'post_type' => 'products',
                'post_per_page' => -1,
            ];
            $products = get_posts($args);
            ?>
            <?php
            if ($products) :
                foreach ($products as $product) : ?>
                    <?php
                    $images = get_field('gallery', $product->ID);
                    $article = get_field('article', $product->ID);
                    $price = get_field('price', $product->ID);
                    $description = get_field('description', $product->ID);
                    ?>
                    <div class="catalog__single_product">
                        <div class="catalog__single_product__gallery">
                            <?php if ($images): ?>
                                <?php foreach ($images as $image) : ?>
                                    <img src="<?= $image['url'] ?>" alt="">
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="catalog__single_product__info">
                            <div class="catalog__single_product_title">  <?= $product->post_title ?? '' ?> </div>
                            <div class="catalog__single_product_article"> <?= $article ?? '' ?> </div>
                            <?php
                            $productCategories = get_the_terms($product->ID, 'category');
                            ?>
                            <div class="catalog__single_product_categories"> Категории:
                                <?php if ($productCategories) : ?>
                                    <?php $countCategories = count($productCategories) ?>
                                    <?php foreach ($productCategories as $categories) : ?>
                                        <?php echo $categories->name ?? '' ?>
                                        <?php
                                        if ($countCategories > 1) echo ',';
                                        $countCategories--;
                                        ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                            <div class="catalog__single_product_price"> <?= $price ?? '' ?> </div>
                            <div class="catalog__single_product_description"> <?= $description ?? '' ?> </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </section>
<?php get_footer(); ?>