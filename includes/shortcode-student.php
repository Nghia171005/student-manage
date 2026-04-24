<?php

if (!defined('ABSPATH')) {
    exit;
}

function sm_render_student_list_shortcode() {
    $query = new WP_Query(array(
        'post_type'      => 'student',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));

    ob_start();

    if ($query->have_posts()) {
        ?>
        <table class="sm-student-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>MSSV</th>
                    <th>Họ tên</th>
                    <th>Lớp</th>
                    <th>Ngày sinh</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;

                while ($query->have_posts()) {
                    $query->the_post();

                    $student_id = get_the_ID();
                    $mssv       = get_post_meta($student_id, '_sm_mssv', true);
                    $class      = get_post_meta($student_id, '_sm_class', true);
                    $birthdate  = get_post_meta($student_id, '_sm_birthdate', true);
                    ?>
                    <tr>
                        <td><?php echo esc_html($stt); ?></td>
                        <td><?php echo esc_html($mssv); ?></td>
                        <td><?php echo esc_html(get_the_title()); ?></td>
                        <td><?php echo esc_html($class); ?></td>
                        <td><?php echo esc_html($birthdate); ?></td>
                    </tr>
                    <?php
                    $stt++;
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo '<p>Chưa có sinh viên nào.</p>';
    }

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('danh_sach_sinh_vien', 'sm_render_student_list_shortcode');