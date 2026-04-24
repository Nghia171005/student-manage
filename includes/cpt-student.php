<?php

if (!defined('ABSPATH')) {
    exit;
}

function sm_register_student_cpt() {
    $labels = array(
        'name'               => 'Sinh viên',
        'singular_name'      => 'Sinh viên',
        'menu_name'          => 'Sinh viên',
        'add_new'            => 'Thêm mới',
        'add_new_item'       => 'Thêm sinh viên mới',
        'edit_item'          => 'Sửa sinh viên',
        'new_item'           => 'Sinh viên mới',
        'view_item'          => 'Xem sinh viên',
        'search_items'       => 'Tìm sinh viên',
        'not_found'          => 'Không tìm thấy sinh viên',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array('title', 'editor'),
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'sinh-vien'),
        'show_in_rest'       => true,
    );

    register_post_type('student', $args);
}
add_action('init', 'sm_register_student_cpt');