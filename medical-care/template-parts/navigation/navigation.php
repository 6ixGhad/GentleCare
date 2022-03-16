<?php
/**
 * Displays top navigation
 *
 * @subpackage Medical Care
 * @since 1.0
 */
?>

<div id="mySidenav" class="sidenav">

  	<nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','medical-care' ); ?>">
        <div class="site-header__util">
            <?php
            if(is_user_logged_in()){ ?>
                  <a href="<?php echo wp_logout_url(); ?>" class="btn btn--small btn--dark-orange float-right btn--with-photo">
                  <span class="site-header__avatar"><?php get_avatar(get_current_user_id(), 60); ?></span>
                  <span class="btn__text">Log Out</span>
                  </a>
                  <?php }
                  else{ 
                  ?>
              <a href="<?php echo esc_url(site_url('/wp-signup.php')); ?>" class="btn btn--small btn--orange float-right push-right">Signup</a>
              <a href="<?php echo esc_url(site_url('/wp-login.php')); ?>" class="btn btn--small btn--orange float-right push-right">Login</a>
            <?php }
            ?>


      
        <?php if(has_nav_menu('primary')){
          	wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
          	) );
        } ?>
        
    	<a href="javascript:void(0)" class="close-button">x</a>
          
  	</nav>
</div>