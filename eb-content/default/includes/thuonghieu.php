<?php if($id>0){include $dir_for_template.'includes/thread.php';}else{$th_list='';$logo_list='';$sql=$func->q("SELECT * FROM tbl_thuonghieu WHERE th_trangthai > 0 ORDER BY th_stt LIMIT 0, 50");while($row=mysql_fetch_assoc($sql)){$th_id=$row['th_id'];$th_ten=$row['th_ten'];$th_seo=$row['th_seo'];$th_link='thuonghieu-'.$th_id.'/'.$th_seo.'/';$th_logo=$row['th_logo'];$th_banner=$row['th_banner'];$th_phantram=$row['th_phantram'];$count_th=$func->c("SELECT trv_id FROM tbl_tinraovat WHERE trv_trangthai > 0 AND trv_giaban > 0 AND trv_giamoi > 0 AND trv_ngayhethan > ".$date_time." AND color_id = 0 AND th_id = ".$th_id);if($count_th>0){$th_list.=' <li class="s_mod"> <div class="s_percent">'.$th_phantram.'%</div> <div><a href="'.$th_link.'"><img src="'.$th_banner.'" height="180" /></a></div> <div class="s_info cf"> <div class="lf f38"><span class="s_name">'.$th_ten.'</span></div> <div class="lf f62 cf"> <div align="center" class="lf f62">Có <span class="bold">'.$count_th.'</span> khuyến mãi</div> <div align="right" class="lf f38"> <div class="s-chi-tiet"><a href="'.$th_link.'">Chi tiết</a></div> </div> </div> </div> </li> ';$logo_list.='<li><a href="'.$th_link.'" title="'.$th_ten.'"><img src="'.$th_logo.'" /></a></li>';}}$main_content=$func->str_template('template/g/thuonghieu.html',array('tmp.logo_list'=>$logo_list,'tmp.th_list'=>$th_list));}