<?php

  get_header();?>

  <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/services.jpg')?> );"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"> All Reviews</h1>  
            <div class="page-banner__intro">
                <p>Hear from our valued clients!</p>
            </div>
        </div>  
  </div>
  <div class="container container--narrow page-section">
  <ul class ="link-list min-list">
    <?php
    if(current_user_can( 'publish_reviews' )){
      
      
  echo '<a href="http://gentlecare.great-site.net/wp-admin/post-new.php?post_type=review"> <button class="box-button">  Add Review </button> </a>';
    }
  ?>
    <?php
      while(have_posts()){
        the_post();?>
	  <div class="reviews">
        <li class="li"><a href="<?php the_permalink();?>"><?php the_title();?></a> <p class="by">By</p> <a href="<?php the_author_url();?>"> <?php the_author();?></a>
			<p class="pex"> <?php echo  wp_trim_words(get_the_excerpt(), 40);?> </p>
      <a href="<?php the_permalink(); ?>"> <button class="box-button">  Read More </button> </a>

	    </li>
			
		  </div>
	  
        <?php 
      }
      echo paginate_links();
    ?>
   </ul>
  </div>


<?php  get_footer();
?>
