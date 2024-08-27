<?php
$frontPageId = $args['front_page_id'];
$sliderGroup = get_field("home_head_slider", $frontPageId);
 
if (!isset($sliderGroup))
  return;
?>
<section class="home-head-slider">
  <div id="home-head-slider" class="swiper">
    <div class="swiper-wrapper">
      <?php foreach ($sliderGroup as $sliderField): ?>
        <?php if (!empty($sliderField)): ?>
          <div class="swiper-slide">
            <div><img src="<?= $sliderField['image'] ?>" alt="<?= $sliderField['image_describe'] ?>"></div>
            <div class="container">
              <div class="slide-details">
                <div class="title">
                  <h2 class="bg-filter">
                    <?= $sliderField['slider_title'] ? $sliderField['slider_title'] : "Combination of safe modern & special world" ?>
                  </h2>
                </div>
                <div class="bg-filter">
                  <h3>
                    <?= $sliderField['slider_subtitle'] ? $sliderField['slider_subtitle'] : "Find a local dealer" ?>
                  </h3>
                  <p>
                    <?= $sliderField['slider_text'] ? $sliderField['slider_text'] : "Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                      Amet fugit culpa ex officia sit voluptatum! Corrupti eum porro temporibus saepe veniam.
                       Laudantium nemo mollitia tempora aliquid, fuga quas similique dolorum" ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</section>