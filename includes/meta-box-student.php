<?php

if (!defined('ABSPATH')) {
    exit;
}

function sm_add_student_meta_box() {
    add_meta_box(
        'sm_student_info',
        'Thông tin sinh viên',
        'sm_render_student_meta_box',
        'student',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sm_add_student_meta_box');

function sm_render_student_meta_box($post) {
    $mssv      = get_post_meta($post->ID, '_sm_mssv', true);
    $class     = get_post_meta($post->ID, '_sm_class', true);
    $birthdate = get_post_meta($post->ID, '_sm_birthdate', true);

    wp_nonce_field('sm_save_student_meta', 'sm_student_meta_nonce');
    ?>

    <p>
        <label for="sm_mssv"><strong>Mã số sinh viên:</strong></label><br>
        <input type="text" id="sm_mssv" name="sm_mssv" value="<?php echo esc_attr($mssv); ?>" style="width:100%;">
    </p>

    <p>
        <label for="sm_class"><strong>Lớp/Chuyên ngành:</strong></label><br>
        <select id="sm_class" name="sm_class" style="width:100%;">
            <option value="">-- Chọn lớp/chuyên ngành --</option>
            <option value="CNTT" <?php selected($class, 'CNTT'); ?>>CNTT</option>
            <option value="Kinh tế" <?php selected($class, 'Kinh tế'); ?>>Kinh tế</option>
            <option value="Marketing" <?php selected($class, 'Marketing'); ?>>Marketing</option>
        </select>
    </p>

    <p>
        <label for="sm_birthdate"><strong>Ngày sinh:</strong></label><br>
        <input type="date" id="sm_birthdate" name="sm_birthdate" value="<?php echo esc_attr($birthdate); ?>">
    </p>

    <?php
}
function sm_save_student_meta($post_id) {
    if (!isset($_POST['sm_student_meta_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['sm_student_meta_nonce'], 'sm_save_student_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['sm_mssv'])) {
        update_post_meta(
            $post_id,
            '_sm_mssv',
            sanitize_text_field($_POST['sm_mssv'])
        );
    }

    if (isset($_POST['sm_class'])) {
        update_post_meta(
            $post_id,
            '_sm_class',
            sanitize_text_field($_POST['sm_class'])
        );
    }

    if (isset($_POST['sm_birthdate'])) {
        update_post_meta(
            $post_id,
            '_sm_birthdate',
            sanitize_text_field($_POST['sm_birthdate'])
        );
    }
}
add_action('save_post_student', 'sm_save_student_meta');