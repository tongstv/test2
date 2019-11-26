<?php $web_title = $__cf_row['cf_title'];
$meta_title = $__cf_row['cf_meta_title'];
$keywords = $__cf_row['cf_keywords'];
$news_keywords = $__cf_row['cf_news_keywords'];
$description = $__cf_row['cf_description'];
$strCacheFilter = 'home';
$main_content = $func->get_static_html($strCacheFilter);
if ($main_content == false) {
    $time_gio = '';
    $time_ngay = '';
    $product_sell = '';
    $thread_cid = '';
    $sql = $func->q("SELECT " . $strSelect . " FROM tbl_tinraovat WHERE " . $strFilter . " AND trv_trangthai = 2 ORDER BY trv_stt, trv_ngaycapnhat DESC LIMIT 0, 6");
    $arr = select_thread_list_all($sql);
    $thread_hot = $arr['str'];
    $home_list = '';
    $floor = 1;
    foreach ($arr_ant_ten as $k => $ant_ten) {
        if ($k > 0) {
            $sql = "SELECT " . $strSelect . " FROM tbl_tinraovat WHERE " . $strFilter . " AND (ant_id = " . $k . " OR ant_id IN (select ant_id from tbl_a_nhomtin where ant_trangthai > 0 and (this_id = " . $k . " or this_id in (select ant_id from tbl_a_nhomtin where ant_trangthai > 0 and this_id = " . $k . ") ) ) ) AND trv_giovang = 0 ORDER BY trv_stt, trv_ngaycapnhat DESC LIMIT 0, 4";
            $sql = $func->q($sql);
            $str_thread_list = '';
            $arr = select_thread_list_all($sql);
            $str_thread_list = $arr['str'];
            $cid_link = $func->_c_link($k, $arr_ant_seo[$k]);
            if ($str_thread_list != '') {
                $home_list .= ' <br /> <div> <div class="cf home-ant-title set-width-for-home"> <div class="lf width-for-home-left"> <div title="' . $ant_ten . '" class="tl-atitle-left"><a href="' . $cid_link . '">' . $ant_ten . '</a></div> </div> <div class="lf width-for-home-right"> <div class="cf"> <div class="thread-home-c2 cf lf">' . $k . '</div> </div> </div> </div> <ul class="cf thread-list"> ' . $str_thread_list . ' </ul> </div> <br /> ';
            }
        }
    }
    $main_content = $func->str_template($dir_for_template . 'template/g/home.html', array('tmp.product_list_js' => 'var time_ngay={' . substr($time_ngay, 1) . '},time_gio={' . substr($time_gio, 1) . '},product_sell={' . substr($product_sell, 1) . '};', 'tmp.thread_hot' => $thread_hot, 'tmp.home_list' => $home_list));
    $func->get_static_html($strCacheFilter, $main_content);
}