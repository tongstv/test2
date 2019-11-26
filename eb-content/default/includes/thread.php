<?php function select_thread_list_all($sql)
{
    global $func;
    global $date_time;
    global $unknow_pic_img;
    $list = '';
    $product_sell = '';
    $time_ngay = '';
    $time_gio = '';
    $not_select_product = '';
    while ($row = mysql_fetch_assoc($sql)) {
        $trv_id = $row['trv_id'];
        $not_select_product .= ',' . $trv_id;
        $trv_tieude = $row['trv_tieude'];
        $p_link = $func->_p_link($trv_id, $row['trv_seo']);
        $trv_img = $row['trv_img'];
        if ($trv_img == '') {
            $trv_img = $unknow_pic_img;
        }
        $trv_img_hover = $row['trv_img_hover'];
        if ($trv_img_hover == '')
            $trv_img_hover = $trv_img;
        $trv_giaban = $row['trv_giaban'];
        $trv_giamoi = $row['trv_giamoi'];
        $pt = 0;
        if ($trv_giaban > 0) {
            $pt = 100 - (int)($trv_giamoi * 100 / $trv_giaban);
        }
        $trv_giovang = $row['trv_giovang'];
        if ($trv_giovang > 0) {
            $str_trv_giovang = date('H:i d-m-Y', $trv_giovang);
            $trv_giovang -= $date_time;
        } else {
            $str_trv_giovang = '';
        }
        $trv_ngayhethan = $row['trv_ngayhethan'];
        $trv_mua = (int)$row['trv_mua'];
        $trv_max_mua = $row['trv_max_mua'];
        $animate_id = 'p' . $trv_id;
        $animate_id_giovang = $animate_id . '_giovang';
        $animate_id_alert = $animate_id . '_alert';
        $animate_id_gm = 'gmp' . $trv_id;
        $animate_id_ban = 'banp' . $trv_id;
        $animate_id_per = 'ptp' . $trv_id;
        $product_sell .= ',' . $animate_id . ':{gv_id:\'' . $animate_id_giovang . '\',alert_id:\'' .
            $animate_id_alert . '\',mua:' . $trv_mua . ',mmua:' . $trv_max_mua . ',giovang:' .
            $trv_giovang . ',_giovang:\'' . $str_trv_giovang . '\'}';
        $trv_ngayhethan -= $date_time;
        if ($trv_ngayhethan > 86400) {
            $time_ngay .= ',' . $animate_id . ':' . $trv_ngayhethan;
        } else {
            $time_gio .= ',' . $animate_id . ':' . $trv_ngayhethan;
        }
        $list .= ' <li data-gia="' . $trv_giaban . '" data-per="' . $pt .
            '" data-giovang="' . $trv_giovang . '" data-soluong="' . ($trv_max_mua - $trv_mua) .
            '"> <div class="thread-list-padding"> <div class="thread-logo-giovang"> <div>&nbsp;</div> </div> <div class="thread-logo-giamgia"> <div>-' .
            $pt . '</div> </div> <div class="thread-list-avt" align="center"> <div><a href="' .
            $p_link . '"><img src="' . $trv_img . '" alt="' . $trv_img . '" title="' . $trv_tieude .
            '" /></a></div> </div> <div class="thread-list-chayhang"> <div class="thread-list-gia"><span>' .
            number_format($trv_giamoi) . 'đ</span> <font>' . number_format($trv_giaban) .
            'đ</font></div> <h2 class="thread-list-title"><a href="' . $p_link . '">' . $trv_tieude .
            '</a></h2> </div> <div align="center" class="thread-list-xem"> <div><i data-id="' .
            $trv_id . '" class="fa"></i> <a href="' . $p_link .
            '">Xem chi tiết</a></div> </div> </div> </li> ';
    }
    mysql_free_result($sql);
    return array('not' => $not_select_product, 'str' => $list);
}
if (isset($_SESSION['s_lazyload'])) {
    $check_lazyload = $_SESSION['s_lazyload'];
} else {
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $br = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/window|win32|macintosh|mac os x|linux/i', $br)) {
            $check_lazyload = 1;
        }
    }
    $_SESSION['s_lazyload'] = $check_lazyload;
}
$strFilter = $strGlobalFilter;
$strSelect = "trv_id, trv_tieude, trv_seo, trv_img, trv_img_hover, trv_giaban, trv_giamoi, trv_giovang, trv_ngayhethan, trv_mua, trv_max_mua";
if ($pid > 0) {
    include $dir_for_template . 'includes/thread_details.php';
} else
    if ($act == '') {
        include $dir_for_template . 'includes/home.php';
    } else {
        include $dir_for_template . 'includes/thread_list.php';
    }
