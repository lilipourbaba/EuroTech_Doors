<?php
$frontPageId = $args['front_page_id'];
$ideaGroup   = get_field("home_idea_section", $frontPageId);

if (!isset($ideaGroup))
  return;
?>

<section class="idea">
  <div class="container">
    <div class="container-content">
      <div class="content">
        <div class="title-br">
          <h3>Explore New Idea</h3>
        </div>

        <div>
          <p><?= $ideaGroup['content'] ?></p>
        </div>

        <div class="btns">
          <a href="<?= $ideaGroup['page_url'] ?>" class="button-primary">
            Get Inspiration
            <i class="iconsax" icon-name="arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="img">
        <img src="<?= $ideaGroup['image'] ?>" alt="">
      </div>
    </div>
  </div>
</section>