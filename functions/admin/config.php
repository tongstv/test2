<?php foreach ($_POST as $k => $v) {
    $v = trim($v);
    $_POST[$k] = $v;
}
$m = '';
$count = $func->c("SELECT cf_id FROM tbl_config");
if ($count > 10) {
    $sql = $func->q("SELECT cf_id FROM tbl_config ORDER BY cf_id DESC LIMIT 10, 1");
    $row = mysql_fetch_assoc($sql);
    $sql = "DELETE FROM tbl_config WHERE cf_id < " . $row['cf_id'];
    $func->q($sql);
}
$cf_logo = $_POST['cf_logo'];
if (isset($_FILES["file"]["name"])) {
    $img = $_FILES["file"]["name"];
    if ($img != '') {
        if ($_FILES["file"]["error"] > 0) {
            $members_alert = $_FILES["file"]["error"];
        } else {
            $img = upload_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"], $_FILES["file"]["size"], '');
            if (isset($_SESSION['members_alert'])) {
                $members_alert = $_SESSION['members_alert'] . ' . ';
            }
            if ($img != '') {
                $cf_logo = $img;
            }
        }
    }
}
$cf_favicon = trim($_POST['cf_favicon']);
if ($cf_favicon == '') {
    $cf_favicon = 'favicon_eb.png?v=' . $date_time;
}
$sql = "INSERT INTO tbl_config (cf_smtp_email, cf_smtp_pass, cf_smtp_host, cf_smtp_port, cf_title, cf_meta_title, cf_keywords, cf_news_keywords, cf_description, cf_abstract, cf_gse, cf_ga_id, cf_logo, cf_favicon, cf_sys_email, cf_ten_cty, web_name, cf_email, cf_email_note, cf_email_bk, cf_dienthoai, cf_hotline, cf_diachi, cf_bank, cf_white_ip, cf_facebook_page, cf_facebook_id, cf_facebook_admin_id, cf_google_plus, cf_youtube_chanel, cf_twitter_page, cf_yahoo, cf_skype, cf_js_allpage, cf_js_allpage_full, cf_js_hoan_tat, cf_js_hoan_tat_full, cf_color, cf_nav) VALUES ('" . $_POST['cf_smtp_email'] . "', '" . $_POST['cf_smtp_pass'] . "', '" . $_POST['cf_smtp_host'] . "', '" . $_POST['cf_smtp_port'] . "', '" . $_POST['t_title'] . "', '" . $_POST['t_meta_title'] . "', '" . $_POST['t_keywords'] . "', '" . $_POST['t_news_keywords'] . "', '" . $_POST['t_description'] . "', '" . $_POST['t_abstract'] . "', '" . $_POST['t_gse'] . "', '" . $_POST['cf_ga_id'] . "', '" . $cf_logo . "', '" . $cf_favicon . "', " . (int)$_POST['cf_sys_email'] . ", '" . $_POST['cf_ten_cty'] . "', '" . $_POST['web_name'] . "', '" . $_POST['cf_email'] . "', '" . $_POST['cf_email_note'] . "', '" . $_POST['cf_email_bk'] . "', '" . $_POST['cf_dienthoai'] . "', '" . $_POST['cf_hotline'] . "', '" . $_POST['cf_diachi'] . "', '" . $_POST['cf_bank'] . "', '" . $_POST['cf_white_ip'] . "', '" . $_POST['cf_facebook_page'] . "', '" . $_POST['cf_facebook_id'] . "', '" . str_replace('', '', $_POST['cf_facebook_admin_id']) . "', '" . $_POST['cf_google_plus'] . "', '" . $_POST['cf_youtube_chanel'] . "', '" . $_POST['cf_twitter_page'] . "', '" . $_POST['cf_yahoo'] . "', '" . $_POST['cf_skype'] . "', '" . trim($_POST['cf_js_allpage']) . "', '" . $_POST['cf_js_allpage_full'] . "', '" . trim($_POST['cf_js_hoan_tat']) . "', '" . $_POST['cf_js_hoan_tat_full'] . "', '" . $_POST['cf_color'] . "', '" . $_POST['cf_nav'] . "')";
$func->q($sql);


$q = $func->q("select * from tbl_config order by cf_id DESC limit 1");


if (mysql_num_rows($q) > 0):

    $r = mysql_fetch_object($q);

    require dirname(__FILE__) . "/scss.inc.php";


    $scss = new scssc();

    $old = @file_get_contents('eb-content/default/css/default.scss');

    $style = $scss->compile('$nav-bg:' . $r->cf_nav . ';
$orange:  ' . $r->cf_color . ';
$btn-cart:#50A791;

$text-color:#fff;

$footer-a-color: #fff;
$footer-text:#fff;

$nav-hover-bg: lighten($nav-bg,40%);
$orange-light: lighten($orange,8%);
$footer-bg:$orange;
$footer-bg-light:darken($footer-bg,15%);
$bottom-company:$footer-a-color;
$bg-tra-hang:$orange;
$footer-social:$footer-a-color;' . $old);

    @file_put_contents("eb-content/default/css/style.css", $style);
    $style2 = $scss->compile('$nav-bg:' . $r->cf_nav . ';
$orange:  ' . $r->cf_color . ';
$btn-cart:#50A791;

$text-color:#fff;

$footer-a-color: #fff;
$footer-text:#fff;

$nav-hover-bg: lighten($nav-bg,40%);
$orange-light: lighten($orange,8%);
$footer-bg:$orange;
$footer-bg-light:darken($footer-bg,15%);
$bottom-company:$footer-a-color;
$bg-tra-hang:$orange;
$footer-social:$footer-a-color;' . file_get_contents("m/css/touch.scss"));


    @file_put_contents("m/css/touch.css", $style2);

endif;


$m .= 'Update config';
$func->log_admin('Update Config');
$_SESSION['session_update_cache'] = 1;
die('<script type="text/javascript">alert("' . $m . '");parent.document.frm_config.cf_logo.value=\'' . $cf_logo . '\';parent.func_preview_cf_logo();</script>');