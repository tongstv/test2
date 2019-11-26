<?php $web_title = $__cf_row['cf_title'];
$meta_title = $__cf_row['cf_meta_title'];
$keywords = $__cf_row['cf_keywords'];
$news_keywords = $__cf_row['cf_news_keywords'];
$description = $__cf_row['cf_description'];
$hd_id = 0;
$ga_ecom_update = 0;
if (isset($_SESSION['ga_ecom_update'])) {
    $ga_ecom_update = $_SESSION['ga_ecom_update'];
}
if (isset($_SESSION['id_cam_on_khach_hang'])) {
    $hd_id = $_SESSION['id_cam_on_khach_hang'];
    if ($hd_id > 0 && $hd_id != $ga_ecom_update) {
        $_SESSION['ga_ecom_update'] = $hd_id;
        $strsql = $func->q("SELECT tbl_chitiethoadon.*, tbl_tinraovat.trv_tieude, tbl_tinraovat.trv_seo, tbl_tinraovat.ant_id FROM tbl_chitiethoadon, tbl_tinraovat WHERE tbl_chitiethoadon.hd_id = " .
            $hd_id . " AND tbl_chitiethoadon.trv_id = tbl_tinraovat.trv_id GROUP BY tbl_chitiethoadon.trv_id ORDER BY tbl_chitiethoadon.cthd_id DESC");
        $tongtien = 0;
        $import_ecommerce_ga = "ga('require', 'ec');";
        if (mysql_num_rows($strsql) > 0) {
            while ($rows = mysql_fetch_assoc($strsql)) {
                $tongtien += $rows['trv_gia'] * $rows['cthd_soluong'];
                $import_ecommerce_ga .= " ga('ec:addProduct', { 'id': 'P" . $rows['trv_id'] .
                    "', 'name': '" . $rows['trv_tieude'] . "', 'category': '" . ((isset($arr_ant_seo[$rows['ant_id']])) ?
                    $arr_ant_seo[$rows['ant_id']] : 'C' . $rows['ant_id']) .
                    "', 'brand': '', 'variant': '', 'price': '" . $rows['trv_gia'] .
                    "', 'quantity': " . $rows['cthd_soluong'] . " }); ";
            }
            if ($tongtien > 0) {
                $import_ecommerce_ga .= " ga('ec:setAction', 'purchase', { 'id': 'T" . $hd_id .
                    "', 'affiliation': '" . str_replace('www.', '', $_SERVER['HTTP_HOST']) .
                    " Store - Online', 'revenue': '" . $tongtien .
                    "', 'tax': '0', 'shipping': '0', 'coupon': '' }); ";
                    
                    include_once($_SERVER["DOCUMENT_ROOT"].'/PapApi.class.php');
                    $saleTracker = new Pap_Api_SaleTracker('http://muahangtangoc.com/scripts/sale.php');
            }
        }
    }
}
if ($import_ecommerce_ga != '') {
    $__cf_row['cf_js_allpage'] = $__cf_row['cf_js_hoan_tat'] . "\n" . $__cf_row['cf_js_allpage'];
}
$main_content = $func->str_template('template/g/hoan-tat.html', array('tmp.hd_id' =>
        $hd_id, 'tmp.cf_hotline' => $__cf_row['cf_hotline']));
