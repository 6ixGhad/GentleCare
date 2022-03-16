<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content"> 
  <?php if( get_theme_mod('medical_care_slider_arrows') != ''){ ?>  
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $mod =  get_theme_mod( 'medical_care_post_setting' . $i );
            if ( 'page-none-selected' != $mod ) {
              $slide_pages[] = $mod;
            }
          }
           if( !empty($slide_pages) ) :
          $args = array(
            'post_type' =>array('post','page'),
            'post__in' => $slide_pages
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h2><?php the_title();?></h2>
                <div class="getstarted-btn">
                  <a href="<?php the_permalink(); ?>" class="blogbutton-small" title="<?php esc_attr_e( 'Learn More', 'medical-care' ); ?>"><?php esc_html_e('Learn More','medical-care'); ?></a>
                </div>
              </div>
            </div>
          </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          </a>
      </div> 
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php if( get_theme_mod('medical_care_our_services_subtitle') != '' || get_theme_mod('medical_care_our_services_title') != '' || get_theme_mod('medical_care_category_setting') != ''){ ?>  
    <div id="our-services">
      <div class="container">
        <?php if( get_theme_mod('medical_care_our_services_subtitle') != ''){ ?>
          <strong><?php echo esc_html(get_theme_mod('medical_care_our_services_subtitle','')); ?></strong>
        <?php }?>
        <?php if( get_theme_mod('medical_care_our_services_title') != ''){ ?>
          <h3><?php echo esc_html(get_theme_mod('medical_care_our_services_title','')); ?></h3>
        <?php }?>
        
        <div class="row">
          <?php
          $catData1=  get_theme_mod('medical_care_category_setting');if($catData1){
          $page_query = new WP_Query(array( 'category_name' => esc_html($catData1 ,'medical-care')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>  
              <div class="col-lg-4 col-md-4">
                <div class="box">
                  <?php the_post_thumbnail(); ?>
                  <div class="box-content">
                    <a href="<?php the_permalink(); ?>"><h4><?php the_title();?></h4></a>
                    <p><?php echo esc_html(wp_trim_words(get_the_content(),'15') );?></p>
                  </div>
                  <div class="box-button">
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','medical-care');?></a>
                  </div>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          }?>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  <?php }?>
</main>

<?php get_footer(); ?>