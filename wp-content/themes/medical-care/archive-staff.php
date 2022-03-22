<?php

  get_header();?>

  <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/services.jpg')?> );"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"> Our Staff</h1>  
            <div class="page-banner__intro">
                <p>Get to know our dedicated staff</p>
            </div>
        </div>  
  </div>
  <div class="container container--narrow page-section">
  <ul class ="link-list min-list">
    <?php
      while(have_posts()){
        the_post();?>
        <a class="professor-card" href="<?php the_permalink();?>">
 <img class="professor-card__image" src="<?php the_post_thumbnail_url('staffPortrait');?>">
 <span class="professor-card__name"> <?php the_title(); ?></span>
 </ai>
        <?php 
      }
      echo paginate_links();
    ?>
   </ul>
  </div>


<?php  get_footer();
?>