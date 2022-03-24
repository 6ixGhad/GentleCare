<?php

  get_header();?>

  <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/services.jpg')?> );"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"> All Services</h1>  
            <div class="page-banner__intro">
                <p>Have a look at the services we provide</p>
            </div>
        </div>  
  </div>
  <div class="servicesBackground">
  <div class="container container--narrow page-section">
  <ul class ="link-list min-list">
  <ul class="services-cards">
    <?php
    
      while(have_posts()){
        the_post();?>
         
              <li class="services-card__list-item">
              <a class="services-card" href="<?php the_permalink();?>">
              <img class="services-card__image" src="<?php the_post_thumbnail_url('servicesCard');?>">
              <span class="services-card__name"> <?php the_title(); ?></span>
              </a>
              </li>
      
     

        <?php 
      }
      echo '</ul>';
    
      echo paginate_links();
      
    ?>
   
  </div>
    </div>


<?php  get_footer();
?>