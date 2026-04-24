<?php
/**
 * Plugin Name: Student Manager
 * Description: Plugin quản lý sinh viên bằng Custom Post Type, Meta Box và Shortcode.
 * Version: 1.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit;
}

define('SM_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SM_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once SM_PLUGIN_DIR . 'includes/cpt-student.php';
require_once SM_PLUGIN_DIR . 'includes/meta-box-student.php';
require_once SM_PLUGIN_DIR . 'includes/shortcode-student.php';

function sm_enqueue_assets() {
    wp_enqueue_style(
        'student-manager-style',
        SM_PLUGIN_URL . 'assets/style.css',
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'sm_enqueue_assets');