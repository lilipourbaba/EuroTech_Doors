<?php
$frontPageId = $args['front_page_id'];
$video_file  = get_field('video_file', $frontPageId);
$video_link = get_field('video_link', $frontPageId);

if (!isset($video_link) && !isset($video_file))
    return;
?>

<section class="home__video container">

    <div class="home__video__content">

 
     <iframe class="video" width="100%" height="500" src="<?= $video_link ?>">
</iframe>
           

 
    </div>

</section>