<?php $product_property = get_field('product_property'); ?>
  <?php   if (!empty($product_property)):?>
<div class="products-changing ">

    <?php foreach ($product_property as $property):
   ?>

        <div class="variable">
                 <?php   if (!empty($property['lable']) || !empty($property['value']) ):?>
 
            <div class="Variable-name">
                <?= !empty($property['lable']) ? $property['lable'] : ''; ?>
            </div>
            <div class="Variable-value"><?= !empty($property['value']) ? $property['value'] : ''; ?>
            </div>
            <?php endif; ?>
        </div>

    <?php endforeach; endif;?>
</div>