<?php get_header(); ?>
<?php
$page_title = get_field('page_title');
$contents = get_field('content');
?>
<section class="contact-page">
    <div class="contact-page_title">
        <?= $page_title ?? '' ?>
    </div>
    <?php if ($contents): ?>
        <?php foreach ($contents as $content) : ?>
        <div class="contact-page_content">
            <div class="contact-page_content_title"><?= $content['title']?></div>
            <div class="contact-page_content_description"><?= $content['description']?></div>
        </div>
        <?php endforeach; ?>
    <?php endif ?>
</section>
<?php get_footer(); ?>
