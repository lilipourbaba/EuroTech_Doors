<?php
$frontPageId  = $args['front_page_id'];
$catalogGroup = get_field("home_catalog_section", $frontPageId);

if (!isset($catalogGroup))
  return;
?>

<section class="catalog">
  <div class="container">
    <div class="container-content">
      <div class="img">
        <img src="<?= $catalogGroup['image'] ?>" alt="">
      </div>

      <div class="content">
        <div class="title-br">
          <h3>Product catalog</h3>
        </div>

        <div>
          <p><?= $catalogGroup['content'] ?></p>
        </div>

        <div class="btns">
          <a href="<?= $catalogGroup['page_url'] ?>" class="button-primary">
            View Catalog
            <i class="iconsax" icon-name="book-open"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>