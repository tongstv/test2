<?php $sql = $func->q("SELECT * FROM tbl_config ORDER BY cf_id DESC LIMIT 0, 1");
$row = mysql_fetch_assoc($sql);
$strsql = $func->q("SELECT tv_id, tv_email FROM tbl_thanhvien WHERE tv_id IN (select tv_id from tbl_admin) ORDER BY tv_email");
if (mysql_num_rows($strsql) > 0) {
    $modSite = '';
    while ($rows = mysql_fetch_assoc($strsql)) {
        if ($rows['tv_id'] == $_gl_admin) {
            $modSite .= '<li><a target="_blank" href="9999/members_details&tv_id=' . $rows['tv_id'] . '"><b>' . $rows['tv_email'] . '</b></a></li>';
        } else {
            $modSite .= '<li><a target="_blank" href="9999/members_details&tv_id=' . $rows['tv_id'] . '">' . $rows['tv_email'] . '</a></li>';
        }
    }
    if ($modSite != '') {
        $modSite = '<ul style="padding:0;margin:0">' . $modSite . '</ul>';
    }
} else if ($admin_email == '') {
    $modSite = 'Chưa có ai là người quản lý Website này. Hãy cập nhật tại file <b>class/database.php</b>';
} else {
    $modSite = 'Chưa có ai là người quản lý Website này. Hãy liên hệ <b>' . $admin_email . '</b>';
}
$row['cf_js_allpage'] = htmlentities($row['cf_js_allpage'], ENT_QUOTES, "UTF-8");
$row['cf_js_allpage_full'] = htmlentities($row['cf_js_allpage_full'], ENT_QUOTES, "UTF-8");
$row['cf_js_hoan_tat'] = htmlentities($row['cf_js_hoan_tat'], ENT_QUOTES, "UTF-8");
$row['cf_js_hoan_tat_full'] = htmlentities($row['cf_js_hoan_tat_full'], ENT_QUOTES, "UTF-8");



$main_content = $func->str_template($dir_admin . 'template/config.html', array('tmp.js' => 'var cf_sys_email=' . $row['cf_sys_email'] . ';', 'tmp.web_name' => $web_name, 'tmp._gl_percent_bk' => $_gl_percent_bk, 'tmp.threadInPage' => $threadInPage, 'tmp._gl_admin' => $modSite, 'tmp.admin_email' => $admin_email, 'tmp._gl_upload' => $_gl_upload, 'tmp._gl_max_size_img' => $func->money_format($_gl_max_size_img), 'tmp._gl_max_img' => $_gl_max_img, 'tmp._gl_min_width' => $_gl_min_width, 'tmp._gl_max_width' => $_gl_max_width, 'tmp._gl_min_height' => $_gl_min_height, 'tmp._gl_max_height' => $_gl_max_height));
$main_content = $func->arr_tmp($row, $main_content);