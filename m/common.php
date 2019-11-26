<?php if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
    ob_start('ob_gzhandler');
} else {
    ob_start();
}
session_start();
error_reporting(E_ALL);
include($dir_index . 'class/func.php');
include($dir_index . 'eb-content/config.php');
include($dir_index . 'class/database.php');
include_once($dir_index . 'common_cache.php');
$act = (isset($_GET['act'])) ? trim($_GET['act']) : '';
$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 0;
if (isset($_GET['p']) && ($page = (int)$_GET['p']) > 0) {
} else {
    $page = 1;
}
if ($localhost == 0) {
    $m_web_link = $web_link;
    $web_link = str_replace('//www.m.', '//www.', $web_link);
    $web_link = str_replace('//m.', '//', $web_link);
} else {
    $m_web_link = $web_link . 'm/';
}
$web_title = '';
$description = '';
$keywords = '';
$main_content = '';
$import_ecommerce_ga = '';
$pid = 0;
$fid = 0;
$sid = 0;
$cid = 0;
$mtv_id = 0;