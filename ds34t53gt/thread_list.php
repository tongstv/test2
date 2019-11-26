<?php $web_title = 'Thread list | ';
$strLinkPager = '9999/thread';
$strFilter = " trv_trangthai >= 0 AND color_id = 0";
$str_page = '';
$thread_list = '';
$threadInPage = 25;
$thread_title = '';
$product_key = '';
$strLinkFrom = '&p=' . $page;
$strLinkAjaxl = '';
$mod_view_img = 18;
$str_view_img = 'Xem ảnh cỡ lớn';
$str_sort = 'Ngày cập nhật';
$order_by = "trv_stt, trv_ngaycapnhat DESC";
if (isset($_SESSION['admin_pro_sort'])) {
    $str_sort = 'Ngày đăng';
    $order_by = "trv_id DESC";
}

if(isset($_GET['delid']))
{
    $delid=(int) $_GET['delid'];
    $func->q("delete FROM tbl_tinraovat WHERE trv_id = " .
                $delid);
                
                echo "Xóa thành công!";
}
if ($id > 0) {
    if (isset($_GET['act_thread']) && ($act_thread = trim($_GET['act_thread'])) !=
        '') {
        if ($act_thread == 'order' && isset($_GET['t'], $_GET['stt']) && ($type = trim($_GET['t'])) !=
            '') {
            $trv_stt = (int)$_GET['stt'];
            if ($type == 'up') {
                $trv_stt--;
                if ($trv_stt < 0) {
                    $trv_stt = 0;
                }
            } else {
                $trv_stt++;
            }
            $func->q("UPDATE tbl_tinraovat SET trv_stt = " . $trv_stt . " WHERE trv_id = " .
                $id);
        } else
            if ($act_thread == 'giahan') {
                $sql = $func->q("SELECT trv_ngayhethan FROM tbl_tinraovat WHERE trv_id = " . $id);
                $row = mysql_fetch_assoc($sql);
                $trv_ngayhethan = (int)$row['trv_ngayhethan'];
                if ($trv_ngayhethan < $date_time) {
                    $trv_ngayhethan = $date_time;
                }
                $trv_ngayhethan += (24 * 3600 * 7);
                $sql = "UPDATE tbl_tinraovat SET trv_ngayhethan = " . $trv_ngayhethan .
                    " WHERE trv_id = " . $id;
                $func->q($sql);
            } else
                if ($act_thread == 'reset') {
                    $func->q("UPDATE tbl_tinraovat SET trv_ngaycapnhat = " . $date_time .
                        " WHERE trv_id = " . $id);
                    unset($_SESSION['convert_order_time']);
                }
        $id = 0;
    } else {
        if (isset($arr_ant_ten[$id])) {
            $cid = $id;
        } else
            if (isset($arr_cnt_ten[$id])) {
                $fid = $id;
            } else {
                $sid = $id;
            }
    }
}
if (!isset($_SESSION['convert_order_time'])) {
    $_SESSION['convert_order_time'] = 1;
    $thread_order_time_max = 1000000000;
    $sql = $func->q("SELECT trv_id, trv_ngaycapnhat FROM tbl_tinraovat WHERE trv_ngaycapnhat > " .
        $thread_order_time_max . " ORDER BY trv_ngaycapnhat ASC");
    if (mysql_num_rows($sql) > 0) {
        $strsql = $func->q("SELECT trv_ngaycapnhat FROM tbl_tinraovat WHERE trv_ngaycapnhat < " .
            $thread_order_time_max . " ORDER BY trv_ngaycapnhat DESC LIMIT 0, 1");
        $thread_order_time_min = 0;
        if (mysql_num_rows($strsql) > 0) {
            $rows = mysql_fetch_assoc($strsql);
            $thread_order_time_min = (int)$rows['trv_ngaycapnhat'];
        }
        while ($row = mysql_fetch_assoc($sql)) {
            $thread_order_time_min++;
            $strsql = "UPDATE tbl_tinraovat SET trv_ngaycapnhat = " . $thread_order_time_min .
                " WHERE trv_id = " . $row['trv_id'];
            $func->q($strsql);
        }
        $func->log_admin('Update thread_order_time_max > ' . number_format($thread_order_time_max)) .
            ' to ' . $thread_order_time_min;
    }
}
if ($fid > 0) {
    $strFilter .= " AND ant_id = " . $fid;
    $thread_title = ' &raquo; ' . $arr_cnt_ten[$fid];
} else
    if ($sid > 0) {
        $strFilter .= " AND (ant_id = " . $sid .
            " OR ant_id IN (select ant_id from tbl_a_nhomtin where ant_trangthai > 0 and this_id = " .
            $sid . ") )";
        $thread_title = ' &raquo; ' . $arr_bnt_ten[$sid];
    } else
        if ($cid > 0) {
            $strFilter .= " AND (ant_id = " . $cid .
                " OR ant_id IN ( select ant_id from tbl_a_nhomtin where this_id = " . $cid .
                " or this_id in ( select ant_id from tbl_a_nhomtin where this_id = " . $cid .
                " ) ) )";
            $strLinkPager .= '&cid=' . $cid;
            $strLinkFrom .= '&cid=' . $cid;
            $thread_title = ' &raquo; ' . $arr_ant_ten[$cid];
        } else
            if (isset($_GET['giovang'])) {
                $strFilter .= " AND trv_giovang > 0";
                $strLinkPager .= '&giovang=true';
            }
if (isset($_GET['ost']) && ($ost = trim($_GET['ost'])) != '') {
    $strLinkPager .= '&ost=' . $ost;
    $strLinkFrom .= '&ost=' . $ost;
    if ($ost == 'search' && isset($_REQUEST['t_product_key']) && ($product_key =
        trim($_REQUEST['t_product_key'])) != '') {
        $product_key = $func->non_mark($product_key);
        $strFilter .= " AND trv_tags LIKE '%{$product_key}%'";
        $strLinkPager .= '&t_product_key=' . $product_key;
        $strLinkFrom .= '&t_product_key=' . $product_key;
    }
}
$sql = $func->q("SELECT trv_id FROM tbl_tinraovat WHERE " . $strFilter);
$totalThread = mysql_num_rows($sql);
if ($totalThread > 0) {
    if (isset($_SESSION['mod_view_img'])) {
        $mod_view_img = 128;
        $str_view_img = 'Xem ảnh cỡ nhỏ';
    }
    $totalPage = ceil($totalThread / $threadInPage);
    if ($page > $totalPage) {
        $page = $totalPage;
    }
    $offset = ($page - 1) * $threadInPage;
    $sql = $func->q("SELECT trv_id, trv_tieude, trv_seo, trv_img, trv_giaban, trv_giamoi, trv_giovang, trv_ngayhethan, trv_ngaycapnhat, trv_stt, trv_trangthai, ant_id FROM tbl_tinraovat WHERE " .
        $strFilter . " ORDER BY " . $order_by . " LIMIT " . $offset . ", " . $threadInPage);
    while ($row = mysql_fetch_assoc($sql)) {
        $trv_id = $row['trv_id'];
        $strLinkAjaxl = $strLinkFrom . '&id=' . $trv_id;
        $trv_tieude = $row['trv_tieude'];
        $trv_seo = $row['trv_seo'];
        $trv_link = $func->_p_link($trv_id, $trv_seo);
        $trv_img = $row['trv_img'];
        if ($trv_img == '') {
            $trv_img = $unknow_pic_img;
        }
        $trv_giaban = $row['trv_giaban'];
        $trv_giamoi = $row['trv_giamoi'];
        $trv_giovang = $row['trv_giovang'];
        if ($trv_giovang != 0) {
            $class_giovang = ' class="border-giovang"';
        } else {
            $class_giovang = '';
        }
        $trv_ngayhethan = $row['trv_ngayhethan'];
        if ($trv_ngayhethan > $date_time) {
            $trv_ngayhethan = $trv_ngayhethan - $date_time;
            if ($trv_ngayhethan < 3600) {
                $trv_ngayhethan = '<strong class="redcolor">Sắp hết hạn</strong>';
            } else
                if ($trv_ngayhethan < 86400) {
                    $trv_ngayhethan = '<font class="greencolor">' . (($trv_ngayhethan - ($trv_ngayhethan %
                        3600)) / 3600) . ' giờ</font>';
                } else {
                    $trv_ngayhethan = '<font class="bluecolor">' . (($trv_ngayhethan - ($trv_ngayhethan %
                        86400)) / 86400) . ' ngày</font>';
                }
        } else {
            $trv_ngayhethan = '<em class="redcolor">Hết hạn</em>';
        }
        $trv_stt = $row['trv_stt'];
        $trv_trangthai = $row['trv_trangthai'];
        $ant_id = $row['ant_id'];
        $view_by_group = '';
        if (isset($arr_ant_ten[$ant_id])) {
            $view_by_group = $arr_ant_ten[$ant_id];
        } else
            if (isset($arr_cnt_ten[$ant_id])) {
                $view_by_group = $arr_cnt_ten[$ant_id];
            } else
                if (isset($arr_bnt_ten[$ant_id])) {
                    $view_by_group = $arr_bnt_ten[$ant_id];
                }
        if ($view_by_group != '') {
            $view_by_group = '<a href="9999/thread&id=' . $ant_id . '" class="small">' . $view_by_group .
                '</a>';
        }
        $thread_list .= ' <tr ' . $class_giovang . '> <td><a href="' . $trv_link .
            '" target="_blank">' . $trv_id . '</a></td> <td><img src="' . $trv_img .
            '" height="' . $mod_view_img . '" /></td> <td><a title="' . $trv_tieude .
            '" href="9999/thread_edit&pid=' . $trv_id . '"> ' . $row['trv_tieude'] .
            ' <i class="fa fa-edit fa-icons"></i></a></td> <td>' . $view_by_group .
            '</td> <td>' . number_format($trv_giaban) . '</td> <td>' . number_format($trv_giamoi) .
            '</td> <td><a href="9999/log_cart&id=' . $trv_id .
            '" target="_blank">Xem</a></td> <td>' . $trv_ngayhethan .
            ' <i title="Gia hạn thêm 7 ngày" data-ajax="' . $strLinkAjaxl .
            '" class="cur click-giahan-thread fa fa-icons fa-send"></i></td> <td>' . $trv_stt .
            ',' . $row['trv_ngaycapnhat'] .
            '</td> <td><div class="div-inline-block"> <div><i title="Reset ngày" data-ajax="' .
            $strLinkAjaxl . '" class="cur click-reset-thread fa fa-icons fa-refresh"></i></div> <div><i title="Up" data-ajax="' .
            $strLinkAjaxl . '&t=up&stt=' . $trv_stt .
            '" class="cur click-order-thread fa fa-icons fa-caret-up"></i></div> <div><i title="Down" data-ajax="' .
            $strLinkAjaxl . '&t=down&stt=' . $trv_stt .
            '" class="cur click-order-thread fa fa-icons fa-caret-down"></i></div> <div><i title="Trạng thái" class="fa fa-icons fa-unlock-alt ' . (($trv_trangthai >
            0) ? '' : 'fa-lock-alt') . '"></i></div>  <div><a href="/9999/thread&delid='.$trv_id.'">Xóa</aa></div> </div></td> </tr> ';
    }
    if ($totalPage > 1) {
        $str_page = $func->part_page($page, $totalPage, $strLinkPager . '&p=');
    }
}
$main_content = $func->str_template($dir_admin . 'template/thread_list.html',
    array(
    'tmp.thread_title' => $thread_title,
    'tmp.str_view_img' => $str_view_img,
    'tmp.str_sort' => $str_sort,
    'tmp.str_page' => $str_page,
    'tmp.product_key' => $product_key,
    'tmp.totalThread' => $totalThread,
    'tmp.thread_list' => $thread_list));
