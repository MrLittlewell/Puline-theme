<?php get_header(); ?>
<?php
$slider = get_field('main-slider');

?>
<main>
    <section>
        <div class="swiper-container front-slider">
            <div class="swiper-wrapper">
                <?php foreach ($slider as $slide) {
                    ?>
                    <div class="swiper-slide">
                        <p><?= $slide['title'] ?></p>
                        <p><?= $slide['description'] ?></p>
                        <?php if ($slide['link']) { ?>
                            <a href="<?= $slide['link'] ?>">подробнее</a>
                        <?php } ?>
                        <img src="<?= $slide['image']['url']; ?>" alt="">
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="block-info">
            <?php
            $block_info = get_field('block_info');
            ?>
            <div class="left-block">
                <img src="<?= $block_info['left_block']['left_image']['url']; ?>" alt="">
                <p><?= $block_info['left_block']['left_headline'] ?></p>
                <p><?= $block_info['left_block']['left_description'] ?></p>
                <?php if ($block_info['left_block']['left_link']) { ?>
                    <a href="<?= $block_info['left_block']['left_link']['url'] ?>">
                        <?= $block_info['left_block']['left_link']['title'] ?>
                    </a>
                <?php } ?>
            </div>
            <div class="right-block">
                <img src="<?= $block_info['right_block']['right_image']['url']; ?>" alt="">
                <p><?= $block_info['right_block']['right_headline'] ?></p>
                <p><?= $block_info['right_block']['right_description'] ?></p>
                <?php if ($block_info['right_block']['right_link']) { ?>
                    <a href="<?= $block_info['right_block']['right_link']['url'] ?>">
                        <?= $block_info['right_block']['right_link']['title'] ?>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="general_info">
            <?php
            $general_info = get_field('general_info');
            ?>
            <p><?= $general_info['subheadline'] ?></p>
            <p><?= $general_info['headline'] ?></p>
            <p><?= $general_info['description'] ?></p>
        </div>
    </section>
</main>
<?php get_footer(); ?>
