<?php /* Template Name: Home */ ?>

<?php get_header() ?>

<main class="main home">
  <?php
  $front_page_id = get_the_ID();

  get_template_part('templates/home/head-slider', null, ['front_page_id' => $front_page_id]);
  get_template_part('templates/home/product-tabs', null, ['front_page_id' => $front_page_id]);
  get_template_part('templates/home/sketch-slider', null, ['front_page_id' => $front_page_id]);
  get_template_part('templates/home/catalog', null, ['front_page_id' => $front_page_id]);
  get_template_part('templates/home/video', null, ['front_page_id' => $front_page_id]);
  get_template_part('templates/home/idea', null, ['front_page_id' => $front_page_id]);
  get_template_part('templates/home/top-blogs', null, ['front_page_id' => $front_page_id]);
  ?>
</main>

<?php get_footer(); ?>