<?php $trv_size=$_POST['t_size'];$only_update_size=(int)$_POST['only_update_size'];if($only_update_size==1){$func->q("UPDATE tbl_tinraovat SET trv_size = '".$trv_size."' WHERE trv_id = ".$pid);exit();}$trv_color=trim($_POST['t_color']);$trv_cungmua=trim($_POST['t_cungmua']);$ant_id=(int)$_POST['t_ant'];if(isset($_POST['t_cnt'])&&($check_ant=(int)$_POST['t_cnt'])>0)$ant_id=$check_ant;else if(isset($_POST['t_bnt'])&&($check_ant=(int)$_POST['t_bnt'])>0)$ant_id=$check_ant;$th_id=(int)$_POST['t_thuonghieu'];$trv_giaban=$func->un_money_format($_POST['t_giaban']);if($trv_giaban<0){$trv_giaban=0;}$trv_giamoi=$func->un_money_format($_POST['t_giamoi']);if($trv_giamoi<=0){$trv_giamoi=0;}$trv_giadattruoc=$func->un_money_format($_POST['t_giadattruoc']);$trv_mua=(int)$_POST['t_mua'];$trv_max_mua=(int)$_POST['t_max_mua'];$trv_stt=(int)$_POST['t_stt'];$gio=(int)$_POST['t_gio_vang'];$phut=(int)$_POST['t_phut_vang'];$trv_giovang=trim($_POST['t_ngayvang']);if($trv_giovang!=''){$trv_giovang=strtotime($trv_giovang.' '.$gio.':'.$phut);if($trv_giovang<($date_time-(24*3600*30))){$trv_giovang=0;}}else{$trv_giovang=0;}$trv_ngayhethan=strtotime($_POST['t_ngayhethan']);if($trv_ngayhethan>$date_time)$trv_ngayhethan+=($date_time-strtotime($date_server));else $trv_ngayhethan=0;$trv_baohanh=(int)$_POST['t_baohanh'];$trv_giaohang=(int)$_POST['t_giaohang'];$trv_chinhang=0;if(isset($_POST['t_chinhhang']))$trv_chinhang=1;$trv_trangthai=(int)$_POST['t_trangthai'];$trv_tieude=trim(strip_tags($_POST['t_tieude']));$trv_tieude=$func->shes_title($func->check_strlen($trv_tieude));$trv_seo=trim($_POST['t_seo']);$trv_tags=trim($_POST['t_tags']);if($trv_tags=='')$trv_tags=$func->non_mark($trv_tieude);else $trv_tags=$func->non_mark($trv_tags);$trv_goithieu=trim(strip_tags($_POST['t_goithieu']));$trv_title=$_POST['t_title'];$trv_meta_title=$_POST['t_meta_title'];$trv_keywords=$_POST['t_keywords'];$trv_news_keywords=$_POST['t_news_keywords'];$trv_description=$_POST['t_description'];$trv_img=$_POST['t_img'];$trv_img_hover=$_POST['t_img_hover'];$trv_tomtat=$_POST['t_tomtat'];if(isset($_POST['t_noidung_img_copy'])&&trim($_POST['t_noidung_img_copy'])!=''){$trv_noidung=$_POST['t_noidung_img_copy'];}else{$trv_noidung=$_POST['t_noidung'];}$trv_dieukien=$_POST['t_dieukien'];$check=strip_tags($trv_noidung);if(strlen($trv_tieude)>10&&strlen($check)>50){$nhanban=0;$_continue='';if(isset($_POST['t_nhanban'])&&($nhanban=(int)$_POST['t_nhanban'])>0){$func->q("INSERT INTO tbl_tinraovat (trv_ngaygui, trv_ngaycapnhat, tv_id) VALUES (".$date_time.", ".$date_time.", ".$mtv_id.")");$sql=$func->q("SELECT trv_id FROM tbl_tinraovat WHERE tv_id = ".$mtv_id." ORDER BY trv_id DESC LIMIT 0, 1");if(mysql_num_rows($sql)>0){$row=mysql_fetch_assoc($sql);$pid=(int)$row['trv_id'];$_continue=$web_link.'9999/thread_edit&pid='.$pid;$func->log_admin('Copy product #'.$pid);}}$func->q("UPDATE tbl_tinraovat SET trv_tieude = '".$trv_tieude."', trv_seo = '".$trv_seo."', trv_tags = '".$trv_tags."', trv_goithieu = '".$trv_goithieu."', trv_title = '".$trv_title."', trv_meta_title = '".$trv_meta_title."', trv_keywords = '".$trv_keywords."', trv_news_keywords = '".$trv_news_keywords."', trv_description = '".$trv_description."', trv_img = '".$trv_img."', trv_img_hover = '".$trv_img_hover."', trv_size = '".$trv_size."', trv_tomtat = '".$trv_tomtat."', trv_noidung = '".$trv_noidung."', trv_dieukien = '".$trv_dieukien."', trv_giaban = ".$trv_giaban.", trv_giamoi = ".$trv_giamoi.", trv_giadattruoc = ".$trv_giadattruoc.", trv_giovang = ".$trv_giovang.", trv_baohanh = ".$trv_baohanh.", trv_ngayhethan = ".$trv_ngayhethan.", trv_stt = ".$trv_stt.", 
trv_mua = ".$trv_mua.", trv_max_mua = ".$trv_max_mua.", trv_giaohang = ".$trv_giaohang.", trv_chinhang = ".$trv_chinhang.", trv_trangthai = ".$trv_trangthai.", trv_color = '".$trv_color."', trv_cungmua = '".$trv_cungmua."', ant_id = ".$ant_id.", th_id = ".$th_id." WHERE trv_id = ".$pid);if($_continue!=''){die('<script type="text/javascript">alert("Copy SP/ Dịch vụ thành công");parent.window.location = "'.$_continue.'";</script>');}else{$func->log_admin('Update product #'.$pid);die('<script type="text/javascript">alert("CẬP NHẬT SP thành công");</script>');}}else{die('<script type="text/javascript">alert("Tiêu đề hoặc nội dung tin của bạn quá ngắn");</script>');} 