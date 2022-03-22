<?php 

	$medical_care_sticky_header = get_theme_mod('medical_care_sticky_header');

	$medical_care_custom_style= "";

	if($medical_care_sticky_header != true){

		$medical_care_custom_style .='.menu_box.fixed{';

			$medical_care_custom_style .='position: static;';
			
		$medical_care_custom_style .='}';
	}

	$medical_care_logo_max_height = get_theme_mod('medical_care_logo_max_height');

	if($medical_care_logo_max_height != false){

		$medical_care_custom_style .='.custom-logo-link img{';

			$medical_care_custom_style .='max-height: '.esc_html($medical_care_logo_max_height).'px;';
			
		$medical_care_custom_style .='}';
	}

	/*---------------------------Width -------------------*/
	
	$medical_care_theme_width = get_theme_mod( 'medical_care_width_options','full_width');

    if($medical_care_theme_width == 'full_width'){

		$medical_care_custom_style .='body{';

			$medical_care_custom_style .='max-width: 100%;';

		$medical_care_custom_style .='}';

	}else if($medical_care_theme_width == 'container'){

		$medical_care_custom_style .='body{';

			$medical_care_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$medical_care_custom_style .='}';

	}else if($medical_care_theme_width == 'container_fluid'){

		$medical_care_custom_style .='body{';

			$medical_care_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$medical_care_custom_style .='}';
	}

	/*---------------------------Scroll-top-position -------------------*/
	
	$medical_care_scroll_options = get_theme_mod( 'medical_care_scroll_options','right_align');

    if($medical_care_scroll_options == 'right_align'){

		$medical_care_custom_style .='.scroll-top button{';

			$medical_care_custom_style .='';

		$medical_care_custom_style .='}';

	}else if($medical_care_scroll_options == 'center_align'){

		$medical_care_custom_style .='.scroll-top button{';

			$medical_care_custom_style .='right: 0; left:0; margin: 0 auto; top:89% !important';

		$medical_care_custom_style .='}';

	}else if($medical_care_scroll_options == 'left_align'){

		$medical_care_custom_style .='.scroll-top button{';

			$medical_care_custom_style .='right: auto; left:5%; margin: 0 auto';

		$medical_care_custom_style .='}';
	}