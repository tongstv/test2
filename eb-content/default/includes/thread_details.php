<?php $sql=$func->q("SELECT * FROM tbl_tinraovat WHERE trv_id = ".$pid." AND trv_trangthai >= 0");if(mysql_num_rows($sql)>0){$row=mysql_fetch_assoc($sql);$fix_url_pid=$func->_p_link($pid,$row['trv_seo']);$trv_tieude=$row['trv_tieude'];if($row['trv_color']!=''){$trv_tieude.=' ('.$row['trv_color'].')';}$trv_tags=$row['trv_tags'];$trv_goithieu=$row['trv_goithieu'];$trv_title=$row['trv_title'];if($trv_title=='')$trv_title=$trv_tieude;$trv_meta_title=$row['trv_meta_title'];if($trv_meta_title=='')$trv_meta_title=$trv_tieude;$trv_keywords=$row['trv_keywords'];if($trv_keywords=='')$trv_keywords=$trv_tags;$trv_news_keywords=$row['trv_news_keywords'];if($trv_news_keywords=='')$trv_news_keywords=$trv_tags;$trv_description=$row['trv_description'];if($trv_description==''){if($trv_goithieu==''){$trv_description=$func->del_line(str_replace('"','',strip_tags($row['trv_tomtat'])));}else{$trv_description=strip_tags($trv_goithieu);}}$trv_img=$row['trv_img'];$trv_size=$row['trv_size'];$trv_tomtat=$row['trv_tomtat'];$trv_noidung=$row['trv_noidung'];$trv_dieukien=$row['trv_dieukien'];$trv_giaban=$row['trv_giaban'];$trv_giamoi=$row['trv_giamoi'];$trv_giadattruoc=$row['trv_giadattruoc'];$trv_giovang=$row['trv_giovang'];$str_trv_giovang='';if($trv_giovang>0){$str_trv_giovang=date('H:i d-m-Y',$trv_giovang);$trv_giovang-=$date_time;}$trv_ngaygui=$row['trv_ngaygui'];$trv_ngayhethan=$row['trv_ngayhethan'];$trv_ngayhethan=$trv_ngayhethan-$date_time;$trv_luotxem=$row['trv_luotxem'];$trv_mua=$row['trv_mua'];$trv_max_mua=$row['trv_max_mua'];$trv_chinhang=$row['trv_chinhang'];$view=array();if(isset($_SESSION['thread_view'])){$view=$_SESSION['thread_view'];}if(!isset($view[$pid])){if($trv_luotxem<($trv_mua*20)){$trv_luotxem=$trv_mua*rand(20,30);}$trv_luotxem++;$func->q("UPDATE tbl_tinraovat SET trv_luotxem = ".$trv_luotxem." WHERE trv_id = ".$pid);$view[$pid]=$pid;$_SESSION['thread_view']=$view;}$trv_comment=$row['trv_comment'];$trv_trangthai=$row['trv_trangthai'];$color_id=$row['color_id'];$fake_fb_comment_id=$pid;if($color_id==0){$color_id=$pid;}else{$fake_fb_comment_id=$color_id;}$trv_cungmua=$row['trv_cungmua'];$str_color_id='';if($str_trv_giovang==''){$strsql=$func->q("SELECT trv_id, trv_seo, trv_img, trv_color FROM tbl_tinraovat WHERE trv_trangthai > 0 AND (trv_id = ".$color_id." OR color_id = ".$color_id.") ORDER BY trv_id LIMIT 0, 10");if(mysql_num_rows($strsql)>1){while($rows=mysql_fetch_assoc($strsql)){$str_color_id.=',{id:'.$rows['trv_id'].',seo:\''.$rows['trv_seo'].'\',img:\''.$rows['trv_img'].'\',colorName:\''.$rows['trv_color'].'\'}';}$str_color_id=substr($str_color_id,1);}}$admin_edit='';if(isset($_SESSION['stv_admin'])){$admin_edit='<a title="Sửa tin này" href="9999/thread_edit&pid='.$pid.'"><i class="fa pencil-edit">&nbsp;</i></a>';}$arr_product_js=array('bk'=>'\''.$__cf_row['cf_email_bk'].'\'','tieude'=>'\''.$trv_tieude.'\'','gia'=>$trv_giaban,'gm'=>$trv_giamoi,'giadattruoc'=>$trv_giadattruoc,'status'=>$trv_trangthai,'giovang'=>'\''.$trv_giovang.'\'','_giovang'=>'\''.$str_trv_giovang.'\'','hdb'=>$trv_ngayhethan,'mua'=>$trv_mua,'mmua'=>$trv_max_mua,'ngaygui'=>'\''.date('d-m-Y H:i:s',$trv_ngaygui).'\'','bk_percent'=>$_gl_percent_bk);$product_js='';foreach($arr_product_js as $k=>$v){$product_js.=','.$k.':'.$v;}$strsql=$func->q("SELECT cthd_id FROM tbl_chitiethoadon WHERE trv_id = ".$pid." LIMIT 0, 1");$count_da_mua=mysql_num_rows($strsql);$_SESSION['_168CaptchaProduct']=$pid;$web_title=$trv_title;$meta_title=$trv_meta_title;$keywords=$trv_keywords;$news_keywords=$trv_news_keywords;$description=$trv_description;$group_go_to='<a href="'.$func->_c_link($cid,$arr_ant_seo[$cid]).'">'.$arr_ant_ten[$cid].'</a>';
if($tid>0&&isset($arr_brand_ten[$tid])){$group_go_to.='<a href="actions/thuonghieu&id='.$tid.'&t='.$arr_brand_seo[$tid].'">'.$arr_brand_ten[$tid].'</a>';}if($sid>0&&isset($arr_bnt_ten[$sid])){$group_go_to.='<a href="'.$func->_c_link($sid,$arr_ant_seo[$sid],'s').'">'.$arr_bnt_ten[$sid].'</a>';}if($fid>0&&isset($arr_cnt_ten[$fid])){$group_go_to.='<a href="'.$func->_c_link($fid,$arr_ant_seo[$fid],'f').'">'.$arr_cnt_ten[$fid].'</a>';}$group_go_to.=' <span>'.$trv_tieude.'</span>';$tv_email='';$tv_hoten='';$tv_dienthoai='';$tv_diachi='';if(isset($_SESSION['cache_booikng_user'])){$tv_email=$_SESSION['cache_booikng_user']['mail'];$tv_hoten=$_SESSION['cache_booikng_user']['ten'];$tv_dienthoai=$_SESSION['cache_booikng_user']['dt'];$tv_diachi=$_SESSION['cache_booikng_user']['dc'];}else if($mtv_id>0){$strsql=$func->q("SELECT tv_email, tv_hoten, tv_dienthoai, tv_diachi FROM tbl_thanhvien WHERE tv_id = ".$mtv_id);if(mysql_num_rows($strsql)>0){$rows=mysql_fetch_assoc($strsql);$tv_email=$rows['tv_email'];$tv_hoten=$rows['tv_hoten'];$tv_dienthoai=$rows['tv_dienthoai'];$tv_diachi=$rows['tv_diachi'];}}$strsql=$func->q("SELECT ".$strSelect." FROM tbl_tinraovat WHERE trv_trangthai > 0 AND (ant_id = ".$cid." OR ant_id IN (select ant_id from tbl_a_nhomtin where ant_trangthai > 0 and (this_id = ".$cid." or this_id in (select ant_id from tbl_a_nhomtin where ant_trangthai > 0 and this_id = ".$cid.") ) ) ) AND trv_ngayhethan > ".$date_time." AND trv_id != ".$pid." AND color_id = 0 ORDER BY trv_ngaycapnhat DESC LIMIT 0, 8");$arr=select_thread_list_all($strsql);$other_post=$arr['str'];$str_trv_cungmua='';if($trv_cungmua!=''){$strsql=$func->q("SELECT ".$strSelect." FROM tbl_tinraovat WHERE trv_trangthai > 0 AND trv_id IN (".$trv_cungmua.") AND color_id = 0 LIMIT 0, 8");$arr=select_thread_list_all($strsql);$str_trv_cungmua=$arr['str'];}$history_list='';$str_history_list='';$new_history_list='';$limit_history=8;if(isset($_COOKIE['c_history_list'])){$str_history_list=$_COOKIE['c_history_list'];if($str_history_list!=''){$str_history_list=substr($str_history_list,1);$strHistory=$str_history_list;$str_history_list=explode(',',$str_history_list);$i=0;foreach($str_history_list as $k=>$v){if($v!=$pid){$new_history_list.=','.$v;$i++;}if($i>=$limit_history-1){break;}}$strsql=$func->q("SELECT ".$strSelect." FROM tbl_tinraovat WHERE trv_trangthai > 0 AND trv_id IN (".$strHistory.") AND color_id = 0 LIMIT 0, ".$limit_history);$arr=select_thread_list_all($strsql);$history_list=$arr['str'];}}$new_history_list=','.$pid.$new_history_list;setcookie('c_history_list',$new_history_list,time()+(24*3600*7),'/');$comment_list='';include($dir_index.'chap_comment.php');if($localhost==1){$link_for_fb_comment='http://dochanh.net/';}else{$link_for_fb_comment=$web_link.$func->_p_link($fake_fb_comment_id,'comment');}$main_content=$func->str_template('template/g/thread_details.html',array('tmp.js'=>'var hang_chinh_hang='.$trv_chinhang.',old_comments_count='.$trv_comment.',fix_url_pid=\''.$fix_url_pid.'\',product_js={'.substr($product_js,1).'},count_da_mua='.$count_da_mua.',arr_product_size=['.$trv_size.'],arr_product_color=['.$str_color_id.'];','tmp.trv_id'=>$pid,'tmp.trv_tieude'=>$trv_tieude,'tmp.trv_goithieu'=>$trv_goithieu,'tmp.trv_img'=>$trv_img,'tmp.trv_giaban'=>number_format($trv_giaban),'tmp.trv_giamoi'=>number_format($trv_giamoi),'tmp.trv_tietkiem'=>number_format($trv_giaban-$trv_giamoi),'tmp.admin_edit'=>$admin_edit,'tmp.link_for_fb_comment'=>$link_for_fb_comment,'tmp.other_post'=>$other_post,'tmp.str_trv_cungmua'=>$str_trv_cungmua,'tmp.history_list'=>$history_list,'tmp.comment_list'=>$comment_list,'tmp.cf_dienthoai'=>$__cf_row['cf_dienthoai'],'tmp.cf_hotline'=>$__cf_row['cf_hotline'],'tmp.cf_yahoo'=>$__cf_row['cf_yahoo'],'tmp.cf_skype'=>$__cf_row['cf_skype'],'tmp.cf_ten_cty'=>$__cf_row['cf_ten_cty'],'tmp.cf_diachi'=>nl2br($__cf_row['cf_diachi']),'tmp.tv_email'=>$tv_email,'tmp.tv_hoten'=>$tv_hoten,'tmp.tv_dienthoai'=>$tv_dienthoai,'tmp.tv_diachi'=>$tv_diachi,'tmp.trv_tomtat'=>$trv_tomtat,'tmp.trv_dieukien'=>$trv_dieukien,'tmp.trv_noidung'=>$trv_noidung));}else{$main_content='<h3 style="padding:128px 0" align="center">Dữ liệu bạn đang tìm kiếm đang bị kiểm duyệt hoặc đã bị xóa bởi người dùng...</h3>';}