<?php /*Template Name: Inspiration Page */ get_header() ?>

<?php
$front_page_id = get_option('page_on_front');
$heroImage = get_field('hero_image', $front_page_id);
$heroTitle = get_field('hero_title', $front_page_id);
?>


<main class="inspiration">

    <section class="inspiration__hero">
        <div class="inspiration__hero__items hero" <?php printf("style=\"background-image:url('%s')\"", $heroImage) ?>>
            <div class="inspiration__hero__items__text hero__title container">
                <?= $heroTitle ?>
            </div>
        </div>

        <div class="inspiration__hero__items__text hero__title__mobile container">
            <?= $heroTitle ?>
        </div>

    </section>



    <section class="inspiration__gallery container">

        <div class="inspiration__gallery__content">

            <?php
            while (have_posts()) :
                the_post();
            ?>

                <div class="inspiration__gallery__content__item">

                    <div class="inspiration__gallery__content__item__img">
                        <?php the_post_thumbnail('full') ?>
                    </div>

                </div>

            <?php endwhile ?>

        </div>


    </section>
	 <?= the_pagination(); ?>


    <section class="inspiration__pagination container">

        <?php
        // echo "<div class='pagination'>" . paginate_links(
        //     array(
        //         'total' => $wp_query->max_num_pages,
        //         'prev_next' => false,
        //         'mid_size' => 1,
        //     )
        // ) . "</div>";
        ?>

    </section>

</main>

<?php get_footer() ?>