<?php if(isset($_SESSION["thread_view"])){$view=$_SESSION["thread_view"];}else{$view=array();}$sql=$func->q("SELECT * FROM tbl_tinraovat WHERE trv_id = ".$pid);if(mysql_num_rows($sql)>0){$row=mysql_fetch_assoc($sql);$trv_tieude=$row['trv_tieude'];$trv_tags=$row['trv_tags'];$trv_goithieu=$row['trv_goithieu'];$trv_img='<img alt="'.$row['trv_tieude'].'" title="'.$row['trv_tieude'].'" src="images/bg_lazyload_140.gif" data-img="'.$row['trv_img'].'" class="overload-avt" />';$trv_luotxem=$row['trv_luotxem'];$trv_tomtat=$row['trv_tomtat'];$trv_noidung=$row['trv_noidung'];if($trv_tomtat==''){$trv_tomtat=$func->del_line($func->short_string(str_replace("><","> <",$trv_noidung),300,0));}$trv_dieukien=$row['trv_dieukien'];$trv_giaban=$row['trv_giaban'];$trv_giamoi=$row['trv_giamoi'];$km=0;if($trv_giaban>0){$km=100-(int)($trv_giamoi*100/$trv_giaban);}$trv_mua=$row['trv_mua'];if(!isset($view[$pid])){if($trv_luotxem<($trv_mua*20)){$trv_luotxem=$trv_mua*rand(20,30);}$trv_luotxem++;$func->q("UPDATE tbl_tinraovat SET trv_luotxem = ".$trv_luotxem." WHERE trv_id = ".$pid);$view[$pid]=$pid;$_SESSION['thread_view']=$view;}$trv_trangthai=$row['trv_trangthai'];$trv_giovang=$row['trv_giovang'];$pro_giovang=0;if($trv_giovang>0){$pro_giovang=$date_time-$row['trv_giovang'];}$trv_title=$row['trv_title'];if($trv_title=='')$trv_title=$trv_tieude;$trv_meta_title=$row['trv_meta_title'];if($trv_meta_title=='')$trv_meta_title=$trv_tieude;$trv_keywords=$row['trv_keywords'];if($trv_keywords=='')$trv_keywords=$trv_tags;if($trv_keywords=='')$trv_keywords=$trv_tieude;$trv_news_keywords=$row['trv_news_keywords'];if($trv_news_keywords=='')$trv_news_keywords=$trv_tags;$trv_description=$row['trv_description'];if($trv_description==''){if($trv_goithieu==''){$trv_description=$func->del_line(str_replace('"','',strip_tags($row['trv_tomtat'])));}else{$trv_description=strip_tags($trv_goithieu);}}$web_title=$trv_title;$meta_title=$trv_meta_title;$keywords=$trv_keywords;$news_keywords=$trv_news_keywords;$description=$trv_description;$_arr_ant_ten=$arr_ant[$cid]['ten'];$_group_link='c'.$cid;if($sid>0){$_arr_ant_ten.=' &raquo; '.$arr_bnt[$sid]['ten'];$_group_link='s'.$sid;}if($fid>0){$_arr_ant_ten.=' &raquo; '.$arr_cnt[$fid]['ten'];$_group_link='f'.$fid;}$strFilterDetails=$strFilter." AND (ant_id = ".$cid." OR ant_id IN (select ant_id from tbl_a_nhomtin where ant_trangthai > 0 and (this_id = ".$cid." or this_id in (select ant_id from tbl_a_nhomtin where ant_trangthai > 0 and this_id = ".$cid.") ) ) )";$strsql=$func->q("SELECT ".$strForSelect." FROM tbl_tinraovat WHERE ".$strFilterDetails." ORDER BY trv_stt, trv_ngaycapnhat DESC LIMIT 0, 8");$thread_list=select_thread_www($strsql);$strFilterDaXem="";$thread_daxem='';foreach($view as $v){$v=(int)$v;if($v!=$pid){$strFilterDaXem.=",".$v;}}if($strFilterDaXem!=''){$strFilterDaXem=$strFilter." AND trv_id IN (".substr($strFilterDaXem,1).")";$strsql=$func->q("SELECT ".$strForSelect." FROM tbl_tinraovat WHERE ".$strFilterDaXem." ORDER BY trv_stt, trv_ngaycapnhat DESC LIMIT 0, 8");$thread_daxem=select_thread_www($strsql);}$main_content=$func->str_template('template/details.html',array('tmp.js'=>'var details_pro_status='.$trv_trangthai.',details_pro_soluong='.($row['trv_max_mua']-$row['trv_mua']).',details_pro_giovang='.$pro_giovang.';','tmp.trv_tieude'=>$trv_tieude,'tmp.p_link'=>$m_service_name.$row['trv_id'].'/','tmp.trv_img'=>$trv_img,'tmp.trv_giaban'=>number_format($trv_giaban),'tmp.trv_giamoi'=>number_format($trv_giamoi),'tmp.km'=>$km,'tmp.trv_mua'=>$trv_mua,'tmp.trv_luotxem'=>number_format($trv_luotxem),'tmp.go_to_cart'=>'actions/cart&id='.$pid,
'tmp._arr_ant_link'=>'c'.$cid.'/','tmp._arr_ant_ten'=>$_arr_ant_ten,'tmp.trv_dieukien'=>$trv_dieukien,'tmp.trv_tomtat'=>$trv_tomtat,'tmp.trv_noidung'=>$trv_noidung,'tmp._group_link'=>$_group_link,'tmp.thread_list'=>$thread_list,'tmp.thread_daxem'=>$thread_daxem));}else{$main_content=$strThreadIsNull;}