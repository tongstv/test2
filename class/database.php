<?php @$connect = mysql_pconnect($dbhost, $dbuser, $dbpass) or die('<h1>server has gone away</h1>');
@$connect = mysql_select_db($dbname) or die('<h1>server is too busy</h1>');
mysql_query("SET NAMES 'UTF8'");
date_default_timezone_set('Asia/Saigon');
$date_time = time();
$date_server = date('Y-m-d', $date_time);
$time_server = date('H:i:s', $date_time);
$year_curent = substr($date_server, 0, 4);
$month_curent = substr($date_server, 5, 2);
$day_curent = substr($date_server, 8, 2);
$client_ip = $_SERVER['REMOTE_ADDR'];
$threadInPage = 16;
$_gl_admin = 1;
$_gl_percent_bk = 0;
$_gl_upload = 'upload/';
$_gl_max_size_img = 555000;
$_gl_max_img = 200;
$_gl_min_width = 128;
$_gl_max_width = 1024;
$_gl_min_height = 128;
$_gl_max_height = 1024;
$admin_email = 'tongstv@gmail.com';
$ads_width_top = 600;
$ads_height_top = 80;
$ads_width_right = 128;
$ads_height_right = 80;
$service_name = 'p';
$m_service_name = 'p';
$event_discount = 0;
$ctv_hoahong = 0;
$arr_strip_tags = array('script');
$arr_trv_giaohang = array('<em class="redcolor">Sản phẩm</em>',
        '<em class="greencolor">Voucher</em>');
$arr_hd_trangthai = array(
    0 => 'Chưa xác nhận',
    1 => 'Xác nhận, chờ giao',
    2 => 'Đơn giờ vàng',
    3 => 'Đang xác nhận',
    4 => '[ Đã hủy ]',
    5 => 'Xác nhận, chờ hàng',
    6 => 'Không liên lạc được',
    7 => 'Liên hệ lại',
    8 => 'Đặt trước, đã thanh toán',
    9 => 'Hoàn tất');
$unknow_pic_img = 'data:image/gif;base64,R0lGODlhAQABAIABAP///wAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
$strGlobalFilter = "trv_trangthai > 0 AND trv_giamoi > 0 AND color_id = 0";
$web_version = '1.01';
