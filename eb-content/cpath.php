<?php


if (isset($_SERVER['HTTPS'])) {
    if ($_SERVER['HTTPS'] == "on") {
        $secure_connection = true;
    }
}

if ($secure_connection) {
    $web_link = 'https://' . $_SERVER['HTTP_HOST'] . '/';

} else {
    $web_link = 'http://' . $_SERVER['HTTP_HOST'] . '/';
}

if (!(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' ||
        $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) {

    $search_d = 'http://' . $_SERVER['HTTP_HOST'] . '/';

    $replace_d = 'https://' . $_SERVER['HTTP_HOST'] . '/';

    mysql_query("update tbl_tinraovat SET trv_img = replace(trv_img,'" . $search_d . "','" . $replace_d . "'), 	trv_noidung = replace(trv_noidung,'" . $search_d . "','" . $replace_d . "')");


    mysql_query("update tbl_quangcao SET qc_img = replace(qc_img,'" . $search_d . "','" . $replace_d . "')");


    mysql_query("update tbl_blog SET bl_img = replace(bl_img,'" . $search_d . "','" . $replace_d . "')");

    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);

    exit();


}


$localhost = 0;
$dbhost = 'localhost';
$dir_for_config = basename(dirname(__file__)) . '/';
$dir_chua_themes = 'default/';
$dir_for_template = $dir_index . $dir_for_config . $dir_chua_themes;
$dir_for_css = $web_link . $dir_for_config . $dir_chua_themes;
$mobile_version_redirect = true;
