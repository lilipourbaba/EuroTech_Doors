<?php
$product_content = get_the_content();
?>
<div class="  container">
    <?php if ("" !== $product_content): ?>
        <div class="property active">
            <p class="property-tab">
                product description
            </p>
            <div class="property-Content  description tab-content">
                <div>
                                    <?= $product_content ?>

                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ("" != (get_field("catalog"))): ?>
        <div class="property">
            <p class="property-tab">
                product catalog
            </p>
            <div class="tab-content property-Content catalog">
                <div>
                              <p>Click to download the catalog</p>
                <a href="<?= get_field("catalog"); ?>" class="download">
                    <span> Download

                    </span><?php get_template_part('/templates/components/svg/icon-download-pdf') ?>
                </a> 
                </div>
     
            </div>
        </div>
    <?php endif; ?>
    <?php
    get_template_part(
        'templates/components/cards/product-cards/product-question',
        null,
    );
    ?>
    <!-- <p class="product-pagination">
        <?= previous_post_link(' %link', ' <i class="iconsax" icon-name="arrow-left"></i> previous Item
'); ?>
        <?= next_post_link('%link', 'Next Item <i class="iconsax" icon-name="arrow-right"></i> '); ?>
    </p> -->
</div>