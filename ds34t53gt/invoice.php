<?php function cereate_filter($o){global $date_server;global $year_curent;global $month_curent;global $day_curent;global $date_time;global $tbl_hoadon;if($o=='all'){return '';}switch($o){case "between":if(isset($_GET['d1'])&&($d1=trim($_GET['d1']))!=''&&isset($_GET['d2'])&&($d2=trim($_GET['d2']))!=''){$thang_trc=strtotime($d1);$thang_sau=strtotime($d2)+(24*3600);$return_filter="hd_ngaygui > ".$thang_trc." AND hd_ngaygui < ".$thang_sau;}break;case "thismonth":$thang_nay=strtotime($year_curent."-".$month_curent."-01");$return_filter="hd_ngaygui > ".$thang_nay;break;case "yesterday":$str_date=strtotime($date_server);$return_filter="(hd_ngaygui > ".($str_date-(24*3600))." AND hd_ngaygui < ".$str_date.")";break;case "lastmonth":$_month_curent=$month_curent-1;$_year_curent=$year_curent;if($_month_curent==0){$_month_curent=12;$_year_curent-=1;}$thang_truoc=strtotime($_year_curent."-".$_month_curent."-01");$thang_nay=strtotime($year_curent."-".$month_curent."-01");$return_filter="(hd_ngaygui > ".$thang_truoc." AND hd_ngaygui < ".$thang_nay.")";break;case "last30days":$return_filter="hd_ngaygui > ".($date_time-(24*3600*30));break;case "today":$return_filter="hd_ngaygui > ".strtotime($date_server);break;default:$return_filter="hd_ngaygui > ".($date_time-(24*3600*7));}return " AND ".$return_filter;}$strFilter="";$strLinkPager='9999/invoice';$threadInPage=30;$part_page='';$type_display='';$view_status='';$show_invoice_status='';$invoice_key='';$ost='';$status=0;$type_search='';$by_city='Hà Nội';$khoa_don_theo_ip='';$by_product='Xem theo sản phẩm';$view_product=0;if(isset($_SESSION['invoice_restore'])){$tbl_hoadon='tbl_in_con_voi_restore';$str_view_restore='Đơn lưu trữ';$class_button='red-button';}else{$tbl_hoadon='tbl_in_con_voi';$str_view_restore='Đơn hiện tại';$class_button='blue-button';}if(isset($_GET['ost'])&&($ost=trim($_GET['ost']))!=''){$strLinkPager.='&ost='.$ost;if($ost=='search'&&isset($_REQUEST['invoice_key'])&&($invoice_key=trim($_REQUEST['invoice_key']))!=''){$strLinkPager.='&invoice_key='.str_replace(' ','+',$invoice_key);$strStrFilter="";if(isset($_REQUEST['status_invoice'])){$status_invoice=$_REQUEST['status_invoice'];if($status_invoice!=''){$status_invoice=(int)$status_invoice;$view_status='&status='.$status_invoice;$show_invoice_status=' &raquo; '.$arr_hd_trangthai[$status_invoice];$strLinkPager.='&status_invoice='.$status_invoice;$strStrFilter=" AND hd_trangthai = ".$status_invoice;$strFilter.=$strStrFilter;}}if(isset($_REQUEST['type_search'])){$type_search=$_REQUEST['type_search'];$strLinkPager.='&type_search='.$type_search;}if($type_search=='id'){$invoice_key=(int)$invoice_key;$strFilter.=" AND hd_id LIKE '%{$invoice_key}%'";}else if($type_search=='dt'){$invoice_key=(int)$invoice_key;$strFilter.=" AND hd_dienthoai LIKE '%{$invoice_key}%'";}else if($type_search=='sp'){$sql=$func->q("SELECT trv_id FROM tbl_tinraovat WHERE trv_tags LIKE '%{$invoice_key}%'");$filterSP='';while($row=mysql_fetch_assoc($sql)){$trv_id=$row['trv_id'];$filterSP.=','.$trv_id;}if($filterSP!=''){$filterSP=substr($filterSP,1);$sql=$func->q("SELECT hd_id FROM tbl_chitiethoadon WHERE trv_id IN (".$filterSP.") AND hd_id IN (select hd_id from tbl_in_con_voi where tv_id > 0 ".$strStrFilter.") ORDER BY cthd_id DESC LIMIT 0, 100");$filterHD='';while($row=mysql_fetch_assoc($sql)){$hd_id=$row['hd_id'];$filterHD.=','.$hd_id;}if($filterHD!=''){$filterHD=substr($filterHD,1);$strFilter.=" AND hd_id IN (".$filterHD.")";}}}}}else{if(isset($_GET['status'])){$status=(int)$_GET['status'];$view_status='&status='.$status;$show_invoice_status=' &raquo; '.$arr_hd_trangthai[$status];
$strFilter.=" AND hd_trangthai = ".$status;$strLinkPager.='&status='.$status;}else if(isset($_GET['ip'])&&($hoadon_ip=trim($_GET['ip']))!=''){$show_invoice_status=' &raquo; IP: '.$hoadon_ip;$strFilter.=" AND hd_ip = '".$hoadon_ip."'";$strLinkPager.='&ip='.$hoadon_ip;$khoa_don_theo_ip=$hoadon_ip;if(isset($_GET['khoa_ip'])){$func->q("UPDATE tbl_in_con_voi SET hd_trangthai = 4 WHERE hd_trangthai != 4 AND hd_ip = '".$hoadon_ip."'");$check_sql_ip=$func->c("SELECT hd_id FROM tbl_in_con_voi WHERE hd_trangthai != 4 AND hd_ip = '".$hoadon_ip."'");if($check_sql_ip>0){$func->log_admin('Khóa '.$check_sql_ip.' hóa đơn của dải IP '.$hoadon_ip);echo '<div align="center" class="greencolor">Khóa '.$check_sql_ip.' hóa đơn có cùng IP '.$hoadon_ip.'</div>';}else{echo '<div align="center" class="redcolor">Không có dữ liệu đủ điều kiện để KHÓA</div>';}}}else if($arr_session_admin['ad_oder_change']==1){$func->q("UPDATE tbl_in_con_voi SET hd_trangthai = 0 WHERE hd_time_update < ".($date_time-300)." AND hd_trangthai = 3");}$filter='';if(isset($_GET['d'])&&($filter=trim($_GET['d']))!=''){$type_display=$filter;$strLinkPager.='&d='.$filter;}$search_by_city=0;if(isset($_SESSION['invoice_by_city'])){$search_by_city=$_SESSION['invoice_by_city'];if($search_by_city==2){$by_city='Ngoại thành';}$strFilter.=" AND ttp_id = ".$search_by_city;}else{$by_city='Tất cả';}if(isset($_SESSION['invoice_by_product'])){$by_product='Chỉ xem hóa đơn';$view_product=1;$threadInPage=30;}if($tbl_hoadon=='tbl_in_con_voi'){$strFilter.=cereate_filter($filter);}}$sql=$func->q("SELECT hd_id FROM ".$tbl_hoadon." WHERE tv_id > 0".$strFilter);$totalThread=mysql_num_rows($sql);if($totalThread>0){$totalPage=ceil($totalThread/$threadInPage);if($page>$totalPage){$page=$totalPage;}$offset=($page-1)*$threadInPage;$sql=$func->q("SELECT * FROM ".$tbl_hoadon." WHERE tv_id > 0 ".$strFilter." ORDER BY hd_id DESC LIMIT ".$offset.", ".$threadInPage);while($row=mysql_fetch_assoc($sql)){$hd_id=$row['hd_id'];$hd_diachi=$row['hd_diachi'];$hd_dienthoai=$row['hd_dienthoai'];$hd_ngaygui=$row['hd_ngaygui'];$hd_trangthai=$row['hd_trangthai'];$tv_id=$row['tv_id'];$hd_status='hd_status';if($hd_trangthai==3){if($date_time-$row['hd_time_update']<300){$hd_status.=$hd_trangthai;}else{$hd_status.='red';}}else{$hd_status.=$hd_trangthai;}$strsql=$func->q("SELECT trv_tieude, trv_giovang FROM tbl_tinraovat WHERE trv_id IN (select trv_id from tbl_chitiethoadon where hd_id = ".$hd_id.")");$trv_list='';while($rows=mysql_fetch_assoc($strsql)){$trv_tieude=$rows['trv_tieude'];$trv_giovang=$rows['trv_giovang'];if($trv_giovang>0){$hd_status.=' invoice-vang-auto';}$trv_list.='<div>'.$trv_tieude.'</div>';}if($trv_list==''){$trv_list='<em>Không có sản phẩm</em>';}$strsql=$func->q("SELECT tv_email FROM tbl_thanhvien WHERE tv_id = ".$tv_id);$rows=mysql_fetch_assoc($strsql);$tv_email=$rows['tv_email'];$main_content.=' <tr data-ip="'.$row['hd_ip'].'" class="'.$hd_status.'"> <td><a href="9999/invoice_details&id='.$hd_id.'" class="a-hidden-invoice">'.$hd_id.'</a></td> <td>'.$trv_list.'</td> <td><a href="9999/members_details&tv_id='.$tv_id.'" name="alopicaso" target="_blank">'.$tv_email.'</a></td> <td>'.$hd_dienthoai.'</td> <td>'.$hd_diachi.'</td> <td>'.date('H:i:s d/m',$hd_ngaygui).'</td> <td>'.$arr_hd_trangthai[$hd_trangthai].'</td> </tr> ';}if($totalPage>1){$part_page=$func->part_page($page,$totalPage,$strLinkPager.'&p=');}}else{$part_page='<h2 align="center">Không có dữ liệu...</h2>';}$main_content=$func->str_template($dir_admin.'template/invoice.html',array('tmp.js'=>'var strLinkPager=\''.$strLinkPager.'\',type_display=\''.$type_display.'\',view_status=\''.$view_status.'\',type_search=\''.$type_search.'\',year_curent='.$year_curent.',month_curent='.$month_curent.',day_curent='.$day_curent.',khoa_don_theo_ip=\''.$khoa_don_theo_ip.'\';',
'tmp.totalThread'=>number_format($totalThread),'tmp.by_city'=>$by_city,'tmp.by_product'=>$by_product,'tmp.str_view_restore'=>$str_view_restore,'tmp.class_button'=>$class_button,'tmp.invoice_key'=>$invoice_key,'tmp.show_invoice_status'=>$show_invoice_status,'tmp.part_page'=>$part_page,'tmp.main_content'=>$main_content)); 
