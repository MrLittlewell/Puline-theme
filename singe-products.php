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
        if ($products) {
            foreach ($products as $product) {?>
                <div class="catalog__single_product">
                    <div class="catalog__single_product_title">  <?= $product->post_title ?> </div>
                    <?php
                    $productCategories = get_the_terms($product->ID, 'category');
                    if ($productCategories) {
                        foreach ($productCategories as $categories) {
                            ?>
                            <div class="catalog__single_product_categories">  <?= $categories->name ?? ''?> </div>
                        <?php }}?>
                </div>
            <?php }}?>
    </div>
</section>