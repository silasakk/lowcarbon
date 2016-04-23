<?php
echo 1;
global $wpdb;

$wpdb->insert(
    'fb_log',
    array(
        'data' => $_POST['html'],

    )
);

?>