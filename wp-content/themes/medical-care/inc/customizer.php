<?php
/**
 * Medical Care: Customizer
 *
 * @subpackage Medical Care
 * @since 1.0
 */

function medical_care_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

	// Register the custom control type.
	$wp_customize->register_control_type( 'Medical_Care_Toggle_Control' );

	$wp_customize->add_section( 'medical_care_typography_settings', array(
		'title'       => __( 'Typography', 'medical-care' ),
		'priority'       => 24,
	) );

	$font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'medical_care_headings_text', array(
		'sanitize_callback' => 'medical_care_sanitize_fonts',
	));
	$wp_customize->add_control( 'medical_care_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'medical-care'),
		'section' => 'medical_care_typography_settings',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'medical_care_body_text', array(
		'sanitize_callback' => 'medical_care_sanitize_fonts'
	));
	$wp_customize->add_control( 'medical_care_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'medical-care' ),
		'section' => 'medical_care_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('medical_care_pro', array(
        'title'    => __('UPGRADE MEDICAL PREMIUM', 'medical-care'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('medical_care_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Medical_Care_Pro_Control($wp_customize, 'medical_care_pro', array(
        'label'    => __('MEDICAL PREMIUM', 'medical-care'),
        'section'  => 'medical_care_pro',
        'settings' => 'medical_care_pro',
        'priority' => 1,
    )));

    // Theme General Settings
    $wp_customize->add_section('medical_care_theme_settings',array(
        'title' => __('Theme General Settings', 'medical-care'),
        'priority' => 2,
    ) );

    $wp_customize->add_setting( 'medical_care_sticky_header', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_sticky_header', array(
		'label'       => esc_html__( 'Show Sticky Header', 'medical-care' ),
		'section'     => 'medical_care_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'medical_care_sticky_header',
	) ) );

    $wp_customize->add_setting( 'medical_care_theme_loader', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_theme_loader', array(
		'label'       => esc_html__( 'Show Site Loader', 'medical-care' ),
		'section'     => 'medical_care_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'medical_care_theme_loader',
	) ) );

	$wp_customize->add_setting( 'medical_care_scroll_enable', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_scroll_enable', array(
		'label'       => esc_html__( 'Show Scroll Top', 'medical-care' ),
		'section'     => 'medical_care_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'medical_care_scroll_enable',
	) ) );

	$wp_customize->add_setting('medical_care_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'medical_care_sanitize_choices'
	));
	$wp_customize->add_control('medical_care_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','medical-care'),
        'section' => 'medical_care_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','medical-care'),
            'center_align' => __('Center Align','medical-care'),
            'left_align' => __('Left Align','medical-care'),
        ),
	) );

	//theme width

	$wp_customize->add_section('medical_care_theme_width_settings',array(
        'title' => __('Theme Width Option', 'medical-care'),
    ) );

	$wp_customize->add_setting('medical_care_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'medical_care_sanitize_choices'
	));
	$wp_customize->add_control('medical_care_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','medical-care'),
        'section' => 'medical_care_theme_width_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','medical-care'),
            'container' => __('Container','medical-care'),
            'container_fluid' => __('Container Fluid','medical-care'),
        ),
	) );

    // Post Layouts
    $wp_customize->add_section('medical_care_layout',array(
        'title' => __('Post Layout', 'medical-care'),
        'description' => __( 'Change the post layout from below options', 'medical-care' ),
        'priority' => 3,
    ) );

	$wp_customize->add_setting( 'medical_care_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_post_sidebar', array(
		'label'       => esc_html__( 'Show Fullwidth', 'medical-care' ),
		'section'     => 'medical_care_layout',
		'type'        => 'toggle',
		'settings'    => 'medical_care_post_sidebar',
	) ) );

	$wp_customize->add_setting( 'medical_care_single_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_single_post_sidebar', array(
		'label'       => esc_html__( 'Show Single Post Fullwidth', 'medical-care' ),
		'section'     => 'medical_care_layout',
		'type'        => 'toggle',
		'settings'    => 'medical_care_single_post_sidebar',
	) ) );

    $wp_customize->add_setting('medical_care_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'medical_care_sanitize_select'
	));
	$wp_customize->add_control('medical_care_post_option',array(
		'label' => esc_html__('Select Layout','medical-care'),
		'section' => 'medical_care_layout',
		'setting' => 'medical_care_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','medical-care'),
            'grid_post' => __('Grid Post','medical-care'),
        ),
	));

    $wp_customize->add_setting('medical_care_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'medical_care_sanitize_select'
	));
	$wp_customize->add_control('medical_care_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','medical-care'),
		'section' => 'medical_care_layout',
		'setting' => 'medical_care_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','medical-care'),
            '2_column' => __('2','medical-care'),
            '3_column' => __('3','medical-care'),
            '4_column' => __('4','medical-care'),
            '5_column' => __('6','medical-care'),
        ),
	));

	$wp_customize->add_setting( 'medical_care_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_date', array(
		'label'       => esc_html__( 'Hide Date', 'medical-care' ),
		'section'     => 'medical_care_layout',
		'type'        => 'toggle',
		'settings'    => 'medical_care_date',
	) ) );

	$wp_customize->add_setting( 'medical_care_admin', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_admin', array(
		'label'       => esc_html__( 'Hide Author/Admin', 'medical-care' ),
		'section'     => 'medical_care_layout',
		'type'        => 'toggle',
		'settings'    => 'medical_care_admin',
	) ) );

	$wp_customize->add_setting( 'medical_care_comment', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_comment', array(
		'label'       => esc_html__( 'Hide Comment', 'medical-care' ),
		'section'     => 'medical_care_layout',
		'type'        => 'toggle',
		'settings'    => 'medical_care_comment',
	) ) );

	// Header
    $wp_customize->add_section('medical_care_header',array(
        'title' => __('Contact info', 'medical-care'),
        'priority' => 4,
    ) );
    
    $wp_customize->add_setting('medical_care_our_location',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('medical_care_our_location',array(
		'label' => esc_html__('Our Location Text','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_our_location',
		'type'    => 'text'
	));

	$wp_customize->add_setting('medical_care_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('medical_care_address',array(
		'label' => esc_html__('Our Address','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_address',
		'type'    => 'text'
	));

    $wp_customize->add_setting('medical_care_our_contact',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('medical_care_our_contact',array(
		'label' => esc_html__('Contact Text','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_our_contact',
		'type'    => 'text'
	));

	$wp_customize->add_setting('medical_care_phone_no',array(
		'default' => '',
		'sanitize_callback' => 'medical_care_sanitize_phone_number'
	)); 
	$wp_customize->add_control('medical_care_phone_no',array(
		'label' => esc_html__('Our Phone no','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_phone_no',
		'type'    => 'text'
	));

    $wp_customize->add_setting('medical_care_days_open',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('medical_care_days_open',array(
		'label' => esc_html__('Opening Days','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_days_open',
		'type'    => 'text'
	));

	$wp_customize->add_setting('medical_care_opening_time',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('medical_care_opening_time',array(
		'label' => esc_html__('Opening Time','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_opening_time',
		'type'    => 'text'
	));

    //Slider
	$wp_customize->add_section( 'medical_care_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'medical-care' ),
		'priority'   => 5,
	) );

    $wp_customize->add_setting( 'medical_care_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider ', 'medical-care' ),
		'section'     => 'medical_care_slider_section',
		'type'        => 'toggle',
		'settings'    => 'medical_care_slider_arrows',
	) ) );

	$post_list = get_posts();
	$i = 0;	
	$pst_sls[]='Select';
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $s = 1; $s <= 4; $s++ ) {
		$wp_customize->add_setting('medical_care_post_setting'.$s,array(
			'sanitize_callback' => 'medical_care_sanitize_choices',
		));
		$wp_customize->add_control('medical_care_post_setting'.$s,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','medical-care'),
			'section' => 'medical_care_slider_section',
		));
	}
	wp_reset_postdata();

	// OUR Services
	$wp_customize->add_section('medical_care_service',array(
		'title' => esc_html__('Our Services','medical-care'),
		'priority' => 6,
	));

	$wp_customize->add_setting('medical_care_our_services_subtitle',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('medical_care_our_services_subtitle',array(
		'label' => esc_html__('Section First Title','medical-care'),
		'section' => 'medical_care_service',
		'setting' => 'medical_care_our_services_subtitle',
		'type'    => 'text'
	));

	$wp_customize->add_setting('medical_care_our_services_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('medical_care_our_services_title',array(
		'label' => esc_html__('Section Second Title','medical-care'),
		'section' => 'medical_care_service',
		'setting' => 'medical_care_our_services_title',
		'type'    => 'text'
	));	

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('medical_care_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'medical_care_sanitize_select',
	));
	$wp_customize->add_control('medical_care_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','medical-care'),
		'section' => 'medical_care_service',
	));
    
	//Footer
    $wp_customize->add_section( 'medical_care_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'medical-care' ),
    	'priority' => 7,
	) );

    $wp_customize->add_setting('medical_care_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_care_footer_text',array(
		'label'	=> esc_html__('Copyright Text','medical-care'),
		'section'	=> 'medical_care_footer_copyright',
		'type'		=> 'text'
	));

	//Logo
	$wp_customize->add_setting('medical_care_logo_max_height',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_care_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','medical-care'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));
    $wp_customize->add_setting( 'medical_care_logo_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_logo_title', array(
		'label'       => esc_html__( 'Show Site Title', 'medical-care' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'medical_care_logo_title',
	) ) );

    $wp_customize->add_setting( 'medical_care_logo_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Medical_Care_Toggle_Control( $wp_customize, 'medical_care_logo_text', array(
		'label'       => esc_html__( 'Show Site Tagline', 'medical-care' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'medical_care_logo_text',
	) ) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'medical_care_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'medical_care_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'medical_care_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'medical_care_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'medical-care' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'medical-care' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'medical_care_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'medical_care_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'medical_care_customize_register' );

function medical_care_customize_partial_blogname() {
	bloginfo( 'name' );
}

function medical_care_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function medical_care_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function medical_care_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('MEDICAL_CARE_PRO_LINK',__('https://www.ovationthemes.com/wordpress/medical-wordpress-theme/','medical-care'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Medical_Care_Pro_Control')):
    class Medical_Care_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( MEDICAL_CARE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE MEDICAL PREMIUM','medical-care');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="medical_care_img_responsive" src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">

            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('MEDICAL PREMIUM - Features', 'medical-care'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'medical-care');?> </li>                    
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'medical-care');?> </li>                    
                </ul>
        	</div>
		    <div class="col-md-2 col-sm-6 upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( MEDICAL_CARE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE MEDICAL PREMIUM','medical-care');?> </a>
		    </div>
			<p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'medical-care'), '<a target="blank" href="https://wordpress.org/support/theme/medical-care/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;