<?php get_header();
$post_id = isset ($args['post_id']) ? $args['post_id'] : get_the_ID();


?>

<main class="default-page">
  <div class="feuture-img">
  <?= get_the_post_thumbnail($post_id, 'full') ?>	
  </div>
    <main class="container">
        <h1>
            <?= get_the_title($post_id) ?>
        </h1>
        <p>
            <?php the_content() ?>
        </p>

    </main>
</main>

<?php get_footer() ?>