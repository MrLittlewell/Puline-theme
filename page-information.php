<?php get_header(); ?>
<?php
$tabs = get_field('tabs');
?>
<section>
    <?php if ($tabs) : ?>
        <?php foreach ($tabs as $tab) : ?>
            <div class="information-page">
                <div class="information-page_title"><?= $tab['page_title'] ?></div>
                <div class="information-page_content">
                    <?php if ($tab['content']) : ?>
                    <?php foreach ($tab['content'] as $content) : ?>
                        <div class="information-page_content_title"><?= $content['title']?></div>
                        <div class="information-page_content_description"><?= $content['description']?></div>
                    <?php endforeach; ?>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif ?>
</section>
<?php get_footer(); ?>
