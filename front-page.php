<?php get_header(); ?>
<?php 
$slider = get_field('main-slider', 8);

?>
 <main>
   <section>
     <div class="swiper-container front-slider">
      <div class="swiper-wrapper">
        <?php foreach ($slider as $slide) { 
          ?>
          <div class="swiper-slide">
            <p><?php echo $slide['title']?></p>
            <p><?php echo $slide['description']?></p>
              <?php if ($slide['link']) {?>
              <a href="<?php echo $slide['link']?>">подробнее</a>
              <?php }?>
            <img src="<?php echo $slide['image']['url'];?>" alt="">
          </div>
        <?php }?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
   </section>

 </main>
<?php get_footer(); ?>
