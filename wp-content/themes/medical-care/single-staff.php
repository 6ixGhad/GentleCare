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
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('staff'); ?>">
            <i class="fa fa-home" aria-hidden="true"></i> Staff Home</a> 
            <span class="metabox__main"><?php the_title(); ?> </span></p>
        </div>
        
        <div class="row group">
            <div class="one-third">
            <?php the_post_thumbnail();?>
            </div>
            <div class="two-thirds">
            <?php the_content();?>
            </div>
            </div> 
    
        <!--paste code after this -->
        <?php 
            $relatedPrograms = get_field('related_staff');// array of post objects
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




    <?php
    }
    
    get_footer();
?>