<?php    
    get_header();
    while(have_posts()){  // WordPress function that returns the number of posts
        the_post();       // keeps track of which post we are working with and repalces the count variable
        ?>
    <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/services.jpg')?> );"></div>
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
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('services'); ?>">
            <i class="fa fa-home" aria-hidden="true"></i> Services Home</a> 
            <span class="metabox__main"><?php the_title(); ?> </span></p>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
        <!--paste code after this -->
        <?php 
           
           $relatedPrograms = get_field('related_staff');// array of post objects
            if($relatedPrograms){
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">Related Staff</h2>';
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
          $homepageEvents = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
              array(
                'key'=> 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'),
                'type' => 'numeric'
              ),
              array(
                'key' => 'related_service',
                'compare' => 'LIKE',
                'value' => '"'.get_the_ID().'"'
              )
            )
          ));

          if($homepageEvents->have_posts()){
          echo '<hr class="section-break">';
          echo '<h2 class="headline headline--medium">Upcoming '. get_the_title().' Events</h2>';
          while($homepageEvents->have_posts()){
            $homepageEvents->the_post();?>
            <div class="event-summary">
              <a class="event-summary__date t-center" href="#">
                <span class="event-summary__month">
                  <?php 
                    $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate->format('M');
                ?></span>
                  <span class="event-summary__day">
                    <?php 
                    $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate->format('d');
                ?></span>  
              </a>
              <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny">
                   <a href="<?php the_permalink();  ?>"><?php the_title(); ?></a>
                </h5>
                <p><?php 
                      if(has_excerpt()) echo get_the_excerpt(); 
                      else echo wp_trim_words(get_the_content(),18);
                    ?> 
                    <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
              </div>
            </div>
          <?php 
          }
        }
        ?>


    </div>

    <?php
    }
    get_footer();
?>