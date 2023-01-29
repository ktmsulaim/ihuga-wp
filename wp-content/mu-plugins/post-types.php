<?php

function postTypes()
{
    register_post_type('committee_member', [
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => false,
        'supports' => ['title', 'thumbnail'],
        'labels' => [
            'name' => 'Committee Members',
            'add_new_item' => 'Add new committee member',
            'edit_item' => 'Edit committee member',
            'all_items' => 'All committee members',
            'not_found' => 'No committee members found!',
            'singular_name' => 'Committee Member',
        ],
        'menu_icon' => 'dashicons-businessman'
    ]);

    register_post_type('member', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'thumbnail'],
        'hierarchical' => true,
        'taxonomies'  => ['category'],
        'labels' => [
            'name' => 'Members',
            'add_new_item' => 'Add new member',
            'edit_item' => 'Edit member',
            'all_items' => 'All members',
            'not_found' => 'No members found!',
            'singular_name' => 'Member',
        ],
        'menu_icon' => 'dashicons-id',
        'rewrite' => [
            'slug' => 'members'
        ]
    ]);

    register_post_type('circular', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor'],
        'hierarchical' => true,
        'taxonomies'  => ['post_tag'],
        'labels' => [
            'name' => 'Circulars',
            'add_new_item' => 'Add new circular',
            'edit_item' => 'Edit circular',
            'all_items' => 'All circulars',
            'not_found' => 'No circulars found!',
            'singular_name' => 'Circular',
        ],
        'menu_icon' => 'dashicons-media-document',
        'rewrite' => [
            'slug' => 'circulars'
        ]
    ]);
    
    register_post_type('notification', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'excerpt'],
        'hierarchical' => true,
        'labels' => [
            'name' => 'Notifications',
            'add_new_item' => 'Add new notification',
            'edit_item' => 'Edit notification',
            'all_items' => 'All notifications',
            'not_found' => 'No notifications found!',
            'singular_name' => 'Notification',
        ],
        'menu_icon' => 'dashicons-bell',
        'rewrite' => [
            'slug' => 'notifications'
        ]
    ]);
}

add_action('init', 'postTypes');