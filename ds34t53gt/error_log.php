<?php $web_title = 'Error log | ';
$log_content = '';
$arr_log_file = array('m/', 'temp/', '');
foreach ($arr_log_file as $k => $v) {
    $log_file = $dir_index . $v . 'error_log';
    if (file_exists($log_file)) {
        if (isset($_GET['clear_data'])) {
            $fh = fopen($log_file, 'w+') or die('Khong mo duoc log');
            fwrite($fh, "");
            fclose($fh);
        } else {
            $content = file_get_contents($log_file, 1);
            $content = trim($content);
            if (isset($_GET['non_html'])) {
                $content = strip_tags($content);
            }
            if ($content != '') {
                $log_content .= $content . "\n";
            }
        }
    } else if ($v != 'm/') {
        $log_content .= "<h4>Log file not exist (" . $v . "). Create file and set permission 0777.</h4>\n";
    }
}
$main_content = $func->str_template($dir_admin . 'template/error_log.html', array('tmp.log_content' => trim($log_content)));
