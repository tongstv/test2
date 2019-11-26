<?php include dirname(__file__) . '/cpath.php';
$site_name_config = '';
if (isset($_SESSION['site_multi_config'])) {
    $site_name_config = $_SESSION['site_multi_config'];
} else {
    if (strstr($web_link, 'myphamlady.') == true) {
        $site_name_config = 'myphamlady';
    } else
        if (strstr($web_link, 'daquyla.') == true) {
            $site_name_config = 'daquy';
        } else {
            $site_name_config = 'bala';
        }
        $_SESSION['site_multi_config'] = $site_name_config;
}
include $dir_for_template . 'includes/config_' . $site_name_config . '.php';
