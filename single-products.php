<?php get_header(); ?>
<section>
  <div id="product" class="container-l">
    <?php
    $id = get_the_ID();
    $post = get_post($id);
    ?>
    <?php if ($post) : ?>
      <?php
      $color_scheme = get_field('color_scheme', $post->ID);
      $size_products = get_field('size_products', $post->ID);
      $profiles = get_field('profiles', $post->ID);
      $coatings = get_the_terms($post->ID, 'coatings');
      $hardware_price = get_field('hardware_price', $post->ID);
      $extra_charge = get_field('single_extra_charge', $post->ID);
      $global_markup = get_field('extra_charge', 'option');
      $markup_of_goods = 1;

      if ($extra_charge) {
        $markup_of_goods = $extra_charge;
      } elseif ($global_markup) {
        $markup_of_goods = $global_markup;
      }

      $product_variations = get_field('product_variations', $post->ID);
      $images = get_field('gallery', $post->ID);
      $article = get_field('article', $post->ID);
      $description = get_field('description', $post->ID);
      $percent = get_field('percent', $post->ID);
      $active = [];
      $i = 0;
      $j = 1;
      $n = 1;
      ?>
      <div class="single_product">
        <ul class="single_product__gallery">

          <?php if ($images) : ?>
            <?php foreach ($images as $image) : ?>
              <li data-src="<?= $image['url'] ?>">
                <img src="<?= $image['url'] ?>" alt="">
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
        <div class="single_product__info">
          <h1 class="single_product_title"> <?= $post->post_title ?? '' ?> </h1>
          <?php
          $productCategories = get_the_terms($post->ID, 'category');
          ?>
          <div class="single_product_categories">
            <?php if ($productCategories) : ?>
              <?php $countCategories = count($productCategories) ?>
              <?php foreach ($productCategories as $categories) : ?>
                <a href="<?= get_term_link($categories->term_id, 'category'); ?>">
                  <?= $categories->name ?? '' ?>
                </a>
                <?php
                if ($countCategories > 1) echo ',';
                $countCategories--;
                ?>
              <?php endforeach ?>
            <?php endif ?>
          </div>
          <?php
          $variation_arrays_name_materials = [];
          $price_arrays_name_materials = [];
          $price_array = [];
          if ($product_variations) {
            foreach ($product_variations as $variation) {
              $retail_margin = $variation['retail_margin'];
              $variation_name_materials = [];
              $price_of_materials = [];
              if ($variation['select_profile_materials']) {
                foreach ($variation['select_profile_materials'] as $profile) {
                  $variation_name_materials[] = $profile['material']->post_title;
                  $coefficient = $profile['coefficient'];
                  $footageProfile = $profile['footage'];
                  $priceProfile = get_field('price', $profile['material']->ID);
                  $price_of_materials[] = $footageProfile * $priceProfile * $coefficient;
                }
              }
              if ($variation['select_body_materials']) {
                foreach ($variation['select_body_materials'] as $body) {
                  $variation_name_materials[] = $body['material']->post_title;
                  $footageBody = $body['footage'];
                  $priceBody = get_field('price', $body['material']->ID);
                  $price_of_materials[] = $footageBody * $priceBody;
                }
              }
              $retail_array_margin[] = $retail_margin;
              $retail_margin_counter = 0;
              $price_arrays_name_materials[] = $price_of_materials;
              $variation_arrays_name_materials[] = $variation_name_materials;
            }
            foreach ($price_arrays_name_materials as $price_array_name_materials) {
              if ($percent) {
                $price = ((array_sum($price_array_name_materials) + $hardware_price) * $markup_of_goods);
                $percentPrice = $price / 100 * $percent;
                $price_array[] = ($price - $percentPrice) + $retail_array_margin[$retail_margin_counter++];
              } else {
                $price_array[] = ((array_sum($price_array_name_materials) + $hardware_price) * $markup_of_goods) + $retail_array_margin[$retail_margin_counter++];
              }
            }
          }
          ?>
          <?php if ($product_variations) : ?>
            <?php foreach ($product_variations as $variation) : ?>
            <?php endforeach; ?>
          <?php endif; ?>
          <?php
          $active[] = $i++;
          $price_of_materials = [];
          ?>
          <div class="single_product_variations">
            <div class="product_article">
              <span>Артикул:</span>
              <span><?= $article ?? '' ?></span>
            </div>
            <div class="product-size">
              <span>Размер(ДхШхВ)</span>
              <?php if ($size_products) : ?>
                <?php $countSizeProducts = count($size_products) ?>
                <span>
                  <?php foreach ($size_products as $size_product) : ?>
                    <?php if ($size_product['length'] === $size_product['width']) : ?>
                      <?= $size_product['width'] ?> х <?= $size_product['height'] ?>
                    <?php else : ?>
                      <?= $size_product['length'] ?> х <?= $size_product['width'] ?> х <?= $size_product['height'] ?>
                    <?php endif; ?>
                    <?php
                    if ($countSizeProducts > 1) echo ' и ';
                    $countSizeProducts--;
                    ?>
                  <?php endforeach ?>
                </span>
              <?php endif; ?>
            </div>
            <div class="product_profile">
              <span>Профиль:</span>
              <?php if ($profiles) : ?>
                <span>
                  <?php $countProfile = count($profiles) ?>
                  <?php foreach ($profiles as $profile) : ?>
                    <?php if ($profile['name_profile'] === 'Профиль') : ?>
                      <?= $profile['width'] ?> х <?= $profile['height'] ?>
                    <?php elseif ($profile['name_profile'] === 'Прут') : ?>
                      <?= $profile['name_profile'] ?>: Ф<?= $profile['diameter'] ?>
                    <?php elseif ($profile['name_profile'] === 'Полоса') : ?>
                      <?= $profile['name_profile'] ?>: <?= $profile['width'] ?> х <?= $profile['height'] ?>
                    <?php endif ?>
                    <?php
                    if ($countProfile > 1) echo ',';
                    $countProfile--;
                    ?>
                  <?php endforeach; ?>
                </span>
              <?php endif; ?>
            </div>
            <div class="product_cover">
              <span>Покрытие:</span>
              <span>
                <?php if ($coatings) : ?>
                  <?php $countСoatings = count($coatings) ?>
                  <?php foreach ($coatings as $coating) : ?>
                    <?= $coating->name ?? ''; ?>
                    <?php
                    if ($countСoatings > 1) echo ',';
                    $countСoatings--;
                    ?>
                  <?php endforeach ?>
                <?php endif ?>
              </span>
            </div>
            <?php if ($color_scheme) : ?>
              <div class="body_color">
                <span>
                  Цвета корпуса
                </span>
                <span class="item_colors">
                  <?php foreach ($color_scheme['profile_color'] as $color) : ?>
                    <span class="color-variable" style="background-color: <?= $color['color'] ?>"></span>
                  <?php endforeach; ?>
                </span>
              </div>

              <div class="profile_color">
                <span>
                  Цвета профиля
                </span>
                <span class="item_colors">
                  <?php foreach ($color_scheme['body_color'] as $color) : ?>
                    <span class="color-variable" style="background-color: <?= $color['color'] ?>"></span>
                  <?php endforeach; ?>
                </span>
              </div>
            <?php endif ?>
          </div>
          <div class="variables-select-wrapper">
            Профиль/Корпус:
            <?php if ($variation_arrays_name_materials) : ?>
              <select>
                <?php foreach ($variation_arrays_name_materials as $variation_array_name_materials) : ?>
                  <?php $countMaterials = count($variation_array_name_materials) ?>
                  <option class="variation_name_materials" idx="<?= $n++ ?>">
                    <?php foreach ($variation_array_name_materials as $variation_name_materials) : ?>
                      <?= $variation_name_materials ?>
                      <?php
                      if ($countMaterials > 1) echo '+';
                      $countMaterials--;
                      ?>
                    <?php endforeach; ?>
                  </option>
                <?php endforeach; ?>
              </select>

            <?php endif; ?>
          </div>
          <div class="single_product_price">
            <span>Цена:</span>
            <?php foreach ($price_array as $price) : ?>
              <div class="selected-price <?= $j == 1 ? 'current' : null ?>" idx="<?= $j++ ?>">
                <?= ceil($price) ?> BYN
              </div>
            <?php endforeach; ?>
          </div>
          <a class="product-order-button" href="#do-order" data-modal>
            заказать
          </a>
        </div>
      <?php endif ?>
      </div>
      <div class="single_product_description">
        <h3>Описание</h3>
        <?= $description ?? '' ?>
      </div>
</section>
<div id="do-order" class="modal">
  <div class="hidden-form"></div>
  <h2>Оставьте Ваши данные для заказа</h2>
  <p>С вами свяжется наш менеджер</p>
  <table>
    <tr>
      <td>Название:</td>
      <td class="table-name"></td>
    </tr>
    <tr>
      <td>Размеры:</td>
      <td class="table-size"></td>
    </tr>
    <tr>
      <td>Артикул:</td>
      <td class="table-article"></td>
    </tr>
    <tr>
      <td>Комплектация:</td>
      <td class="table-compl"></td>
    </tr>
    <tr>
      <td>Цена:</td>
      <td class="table-price"></td>
    </tr>
  </table>
  <form action="">
    <div class="field-wrapper">
      <label for="">ФИО</label>
      <input type="text" name="f-name" class="form-control" autocomplete="off">
    </div>
    <div class="field-wrapper">
      <label for="">Email</label>
      <input type="text" name="f-email" class="form-control" autocomplete="off">
    </div>
    <div class="field-wrapper">
      <label for="">Телефон</label>
      <input type="text" name="f-phone" class="form-control" autocomplete="off">
    </div>
    <button type="submit" class="set-form">
      оформить заказ
    </button>
  </form>
</div>
<?php get_footer(); ?>