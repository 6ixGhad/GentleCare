<?php    
    get_header();
    while(have_posts()){  // WordPress function that returns the number of posts
        the_post();       // keeps track of which post we are working with and repalces the count variable
        ?>
    <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/events.jpg')?> );"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"> <?php the_title();?></h1>  <!-- hollow -->
                <div class="page-banner__intro">
                    <p> Keep up with our latest news.</p>
                </div>
            </div>  
    </div>
    <div class="container container--narrow page-section">
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>">
            <i class="fa fa-home" aria-hidden="true"></i> Event Home</a> 
            <span class="metabox__main"><?php the_title(); ?> </span></p>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
        <?php 
            $relatedPrograms = get_field('related_service');// array of post objects
            if($relatedPrograms){
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">Related Service(s)</h2>';
                echo '<ul class="link-list min-list">';
                foreach($relatedPrograms as $program){ //for each a post object
                ?>
                <li><a href="<?php echo get_the_permalink($program);?>">
                        <?php echo get_the_title($program);?>
                    </a>
                </li>   
        <?php }

            }
            echo '</ul>';
        ?>
           

    <php }
    ?>
    </div>

    <?php
    }
    get_footer();
?>