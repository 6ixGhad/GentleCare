<?php
/**
 * The template for displaying all pages
 * 
 * @subpackage Medical Care
 * @since 1.0
 */

get_header();  
    while(have_posts()){ 
        the_post();
         pageBanner(array(
         'title'=>'',
         'subtitle'=>''
         ));
?>



<div class="container container--narrow page-section">
    

    <?php //back to function
        $theParent = wp_get_post_parent_ID(get_the_ID());
        if($theParent){ ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>">
            <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a> 
            <span class="metabox__main"><?php echo the_title(); ?></span></p>
            </div>
        <?php }
        
    ?>


 
    <?php 
    // this returns the pages but doesn't output it. If the pages has a parent or 
    $testArray = get_pages(array(
        'child_of' => get_the_ID()
    ));  
    if($theParent or $testArray){ ?>
    <div class="page-links"> 
        <h2 class="page-links__title">
            <a href="<?php echo get_permalink($theParent); ?>">
                <?php echo get_the_title($theParent); ?>
            </a>
        </h2>
        <ul class="min-list">
           <?php
            if($theParent){ // if the current page has a parent
                $findChildrenOf = $theParent;
            }
            else{ //viewing a parent page
                $findChildrenOf = get_the_ID();
            }
             wp_list_pages(array(
                 'title_li' => NULL ,
                  'child_of' => $findChildrenOf,   
                  'sort_column' => 'menu_order'  
             ));
           ?> 
        </ul>
    </div>
	<?php } ?>



<div class="content-area entry-content">
        <?php the_content() ?>  <!-- hollow -->
    </div>

    </div>
        

<?php 
}
get_footer();

