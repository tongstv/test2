<?php $dir_index = '../';
include_once 'common.php';
$arr_ant = array(0 => array('ten' => 'Tất cả', 'seo' => 'tat-ca-hang-muc', 'status' => 1));
$arr_bnt = array(0 => array('ten' => 'Tất cả', 'seo' => 'tat-ca-hang-muc'));
$arr_cnt = array(0 => array('ten' => 'Tất cả', 'seo' => 'tat-ca-hang-muc'));
$sql = $func->q("SELECT ant_id, ant_ten, ant_seo, ant_trangthai FROM tbl_a_nhomtin WHERE ant_trangthai > 0 AND this_id = 0 ORDER BY ant_stt");
$site_group = '';
while ($row = mysql_fetch_assoc($sql)) {
    $ant_id = $row['ant_id'];
    $ant_ten = $row['ant_ten'];
    $ant_seo = $row['ant_seo'];
    $ant_trangthai = $row['ant_trangthai'];
    $strsql = $func->q("SELECT ant_id, ant_ten, ant_seo FROM tbl_a_nhomtin WHERE ant_trangthai > 0 AND this_id = " . $ant_id . " ORDER BY ant_stt");
    $site_group_b = '';
    while ($rows = mysql_fetch_assoc($strsql)) {
        $bnt_id = $rows['ant_id'];
        $bnt_ten = $rows['ant_ten'];
        $bnt_seo = $rows['ant_seo'];
        $csql = $func->q("SELECT ant_id, ant_ten, ant_seo FROM tbl_a_nhomtin WHERE ant_trangthai > 1 AND this_id = " . $bnt_id . " ORDER BY ant_stt");
        $site_group_c = '';
        while ($crow = mysql_fetch_assoc($csql)) {
            $arr_cnt[$crow['ant_id']] = array('ten' => $crow['ant_ten'], 'seo' => $crow['ant_seo']);
            $site_group_c .= ',{id:' . $crow['ant_id'] . ',ten:\'' . $func->str_block_fix_content($crow['ant_ten']) . '\',seo:\'' . $crow['ant_seo'] . '\'}';
        }
        $site_group_b .= ',{id:' . $bnt_id . ',ten:\'' . $func->str_block_fix_content($bnt_ten) . '\',seo:\'' . $bnt_seo . '\',cnt:[' . substr($site_group_c, 1) . ']}';
        $arr_bnt[$bnt_id] = array('ten' => $bnt_ten, 'seo' => $bnt_seo);
    }
    $site_group .= ',{id:' . $ant_id . ',ten:\'' . $func->str_block_fix_content($ant_ten) . '\',seo:\'' . $ant_seo . '\',bnt:[' . substr($site_group_b, 1) . ']}';
    $arr_ant[$ant_id] = array('ten' => $ant_ten, 'seo' => $ant_seo, 'status' => $ant_trangthai);
}
if (isset($_GET['pid']) && ($pid = (int)$_GET['pid']) > 0) {
    $sql = $func->q("SELECT ant_id FROM tbl_tinraovat WHERE trv_id = " . $pid . " LIMIT 0, 1");
    $row = mysql_fetch_assoc($sql);
    if (isset($arr_cnt[$row['ant_id']])) {
        $fid = $row['ant_id'];
        $sid = $func->sf($fid);
        $cid = $func->sf($sid);
    } else if (isset($arr_bnt[$row['ant_id']])) {
        $sid = $row['ant_id'];
        $cid = $func->sf($sid);
    } else {
        $cid = $row['ant_id'];
    }
} else if (isset($_GET['fid']) && ($fid = (int)$_GET['fid']) > 0) {
    $sid = $func->sf($fid);
    $cid = $func->sf($sid);
} else if (isset($_GET['sid']) && ($sid = (int)$_GET['sid']) > 0) {
    $cid = $func->sf($sid);
} else if (isset($_GET['cid'])) {
    $cid = (int)$_GET['cid'];
}
if (!isset($arr_ant[$cid])) {
    $cid = 0;
}
function select_thread_www($sql)
{
    global $m_service_name;
    $str = '';
    while ($row = mysql_fetch_assoc($sql)) {
        $p_link = $m_service_name . $row['trv_id'] . '/';
        $trv_giaban = $row['trv_giaban'];
        $trv_giamoi = $row['trv_giamoi'];
        $km = 0;
        if ($trv_giaban > 0) {
            $km = 100 - (int)($trv_giamoi * 100 / $trv_giaban);
        }
        $str .= ' <li title="' . $row['trv_tieude'] . '" data-mua="' . ($row['trv_max_mua'] - $row['trv_mua']) . '" data-giovang="' . $row['trv_giovang'] . '"> <div class="product-list-padding"> <div data-a="' . $km . '" class="product-list-per product-list-maxwith hide-if-gia-zero"> <div>-' . $km . '%</div> </div> <div class="product-list-giovang"> <div>&nbsp;</div> </div> <div class="product-list-avt" style="background-image:url(\'' . $row['trv_img'] . '\');"><a href="' . $p_link . '">&nbsp;</a></div> <h4 class="product-list-title"><a href="' . $p_link . '">' . $row['trv_tieude'] . '</a></h4> <div class="product-list-maxwith"> <div class="product-list-info cf"> <div class="lf f62 product-list-gia"><span>' . number_format($trv_giamoi) . ' đ</span> <font data-a="' . $trv_giaban . '" class="gia-cu hide-if-gia-zero">&nbsp;' . number_format($trv_giaban) . ' đ&nbsp;</font></div> <div class="lf f38"> <div class="cf"><a href="actions/cart&id=' . $row['trv_id'] . '" class="product-list-mua">Mua ngay</a></div> <div class="product-list-chayhang">Cháy hàng</div> </div> </div> </div> </div> </li> 
';
    }
    return $str;
}

$strForSelect = " trv_id, trv_tieude, trv_tags, trv_img, trv_giaban, trv_giamoi, trv_giovang, trv_mua, trv_max_mua ";
$search_key = '';
$nav_select = '';
$strThreadIsNull = '<h4 align="center" style="padding:8px 0">Dữ liệu đang cập nhật...</h4>';
$strFilter = $strGlobalFilter;
switch ($act) {
    case "error":
    case "cart":
    case "hoan-tat":
        include 'includes/' . $act . '.php';
        break;
    case "booking":
        include 'func/' . $act . '.php';
        break;
    default:
        include 'includes/thread.php';
}
if ($web_title == '') {
    $web_title = $web_name;
} else {
    $web_title .= ' - ' . $web_name;
}
$web_title .= ' đi động (Mobile version)';
echo $func->str_template('template/display.html', array('tmp.data_id' => 'var m_web_link=\'' . $m_web_link . '\',web_link=\'' . $web_link . '\',act=\'' . $act . '\',cid=' . $cid . ',sid=' . $sid . ',fid=' . $fid . ',pid=' . $pid . ',site_group=[' . substr($site_group, 1) . '];', 'tmp.web_title' => $web_title, 'tmp.description' => htmlentities(strip_tags($description)), 'tmp.keywords' => $keywords, 'tmp.search_key' => $search_key, 'tmp.import_ecommerce_ga' => $import_ecommerce_ga, 'tmp.cf_js_allpage' => $__cf_row['cf_js_allpage'], 'tmp.main_content' => $main_content, 'tmp.m_web_link' => $m_web_link, 'tmp.web_link' => $web_link, 'tmp.web_link_v2dot0' => $web_link . str_replace('../', '', $dir_for_template), 'tmp.cf_ga_id' => $__cf_row['cf_ga_id'], 'tmp.cf_logo' => $web_link . $__cf_row['cf_logo'], 'tmp.cf_favicon' => $web_link . $__cf_row['cf_favicon'], 'tmp.cf_diachi' => nl2br($__cf_row['cf_diachi']), 'tmp.cf_hotline' => trim($__cf_row['cf_hotline']), 'tmp.cf_dienthoai' => $__cf_row['cf_dienthoai'], 'tmp.cf_email' => $__cf_row['cf_email'], 'tmp.web_name' => $web_name, 'tmp.update_version' => $web_version, 'tmp.year_curent' => $year_curent));
ob_end_flush();
