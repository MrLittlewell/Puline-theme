<?php get_header(); ?>
    <section>
        <div class="catalog">
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
                    <div class="catalog__single_product">
                        <div class="catalog__single_product__gallery">
                            <?php if ($images): ?>
                                <?php foreach ($images as $image) : ?>
                                    <img src="<?= $image['url'] ?>" alt="">
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="catalog__single_product__info">
                            <div class="catalog__single_product_title">  <?= $post->post_title ?? '' ?> </div>
                            <div class="catalog__single_product_article"> <?= $article ?? '' ?> </div>
                            <?php
                            $productCategories = get_the_terms($post->ID, 'category');
                            ?>
                            <div class="catalog__single_product_categories"> Категории:
                                <?php if ($productCategories) : ?>
                                    <?php $countCategories = count($productCategories) ?>
                                    <?php foreach ($productCategories as $categories) : ?>
                                        <a href="<?= get_term_link($categories->term_id, 'category');?>">
                                        <?= $categories->name ?? '' ?>
                                        </a>
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
            <?php endif ?>
        </div>
    </section>
<?php get_footer(); ?>