<?php get_header(); ?>
<?php 
$slider = get_field('main-slider', 8);

?>
 <main>
   <section>
     <div class="swiper-container front-slider">
      <div class="swiper-wrapper">
        <?php foreach ($slider as $slide) { 
          foreach ($slide as $item) { ?>
          <div class="swiper-slide">
         
            <img src="<?php  var_dump($item);?>" alt="">
          </div>
        <?php }}?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
   </section>

 </main>
<?php get_footer(); ?>
