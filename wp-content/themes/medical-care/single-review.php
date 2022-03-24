<?php    
    get_header();
    while(have_posts()){  // WordPress function that returns the number of posts
        the_post();       // keeps track of which post we are working with and repalces the count variable
        pageBanner();
        ?>
    
    <div class="container container--narrow page-section">
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('reviews'); ?>">
            <i class="fa fa-home" aria-hidden="true"></i> Reviews Home</a> 
            <span class="metabox__main"><?php the_title(); ?> </span></p>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
        <!--paste code after this -->
      

<?php 
            $relatedServices = get_field('related_review_or_service');// array of post objects
            if($relatedServices){
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">Services Related to this Review</h2>';
                echo '<ul class="link-list min-list">';
                foreach($relatedServices as $service){ //for each a post object
                ?>
                <li><a href="<?php echo get_the_permalink($service);?>">
                        <?php echo get_the_title($service);?>
                    </a>
                </li>   
        <?php }

            }
            echo '</ul>';
        ?>

       


    </div>

    <?php
    }
    get_footer();
?>