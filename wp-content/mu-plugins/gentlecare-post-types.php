<?php 
function university_post_types(){
        register_post_type('event',array(
            'capability_type' => 'event',
            'map_meta_cap'=> true,
            'show_in_rest' => true, 
            'supports' => array('title', 'editor','excerpt'),
            'rewrite'=> array('slug' => 'events' ),
            'has_archive' => true,
            'public' => true, 
            'labels' => array(
                'name' => "Events",
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event',
                'all_items' => 'All Events',
                'singular_name' => "Event"
            ),
            'menu_icon' => 'dashicons-calendar'
        ));
        register_post_type('services',array(
            'capability_type' => 'services',
            'map_meta_cap'=> true,
            'show_in_rest' => true, 
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite'=> array('slug' => 'services' ),
            'has_archive' => true,
            'public' => true, 
            'labels' => array(
                'name' => "Services",
                'add_new_item' => 'Add New Service',
                'edit_item' => 'Edit Service',
                'all_items' => 'All Services',
                'singular_name' => "Service"
            ),
            'menu_icon' => 'dashicons-awards'
        ));
        register_post_type('staff',array(
            'capability_type' => 'staff',
            'map_meta_cap'=> true,
            'show_in_rest' => true, 
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite'=> array('slug' => 'staff' ),
            'has_archive' => true,
            'public' => true, 
            'labels' => array(
                'name' => "Staff",
                'add_new_item' => 'Add New Staff Member',
                'edit_item' => 'Edit Staff',
                'all_items' => 'All Staff',
                'singular_name' => "Staff"
            ),
            'menu_icon' => 'dashicons-admin-users'
        ));
        register_post_type('review',array(
            'capability_type' => 'review',
            'map_meta_cap'=> true,
            'show_in_rest' => true, 
            'supports' => array('title', 'editor'),
            'rewrite'=> array('slug' => 'reviews' ),
            'has_archive' => true,
            'public' => true, 
            'show_ui' => true,
            'labels' => array(
                'name' => "Reviews",
                'add_new_item' => 'Add New Review',
                'edit_item' => 'Edit Review',
                'all_items' => 'All Reviews',
                'singular_name' => "Review"
            ),
            'menu_icon' => 'dashicons-welcome-write-blog'
        ));
}
 add_action('init', 'university_post_types');
?>