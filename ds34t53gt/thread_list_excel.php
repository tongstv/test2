<?php if(isset($_SESSION['cacheExportProduct'])){$arrProdcutExcel=$_SESSION['cacheExportProduct'];}else{$arrProdcutExcel=array();}$arrModuleType=array('threadExcelHomQua','threadExcelHomNay','threadExcelThangTruoc','threadExcelThangNay','threadExcelGioVang','threadExcelToanBo');$seconse_in_day=24*3600;$web_title='Danh sách sản phẩm đang đăng bán trên website';$strLinkPager='9999/thread_excel';$strFilter="";$part_page='';$thread_list='';$threadInPage=10;$sql=$func->q("SELECT trv_id, trv_tieude, trv_giovang, trv_ngaygui FROM tbl_tinraovat WHERE trv_trangthai > 0 AND trv_ngayhethan > ".$date_time." ORDER BY trv_stt, trv_ngaycapnhat DESC");$totalThread=mysql_num_rows($sql);while($row=mysql_fetch_assoc($sql)){$trv_id=$row['trv_id'];$trv_tieude=$row['trv_tieude'];$trv_giovang=$row['trv_giovang'];$trv_ngaygui=$row['trv_ngaygui'];$trv_ngaygui=$date_time-$trv_ngaygui;if($trv_ngaygui<$seconse_in_day){$trv_ngaygui='Hôm nay';}else{$trv_ngaygui='<strong>'.($trv_ngaygui-($trv_ngaygui%$seconse_in_day))/$seconse_in_day.'</strong> ngày trước';}$thread_list.='<tr><td>#'.$trv_id.'</td><td>'.$trv_tieude.'</td><td class="small">'.$trv_ngaygui.'</td>';foreach($arrModuleType as $v){$animate_id=$v.$trv_id;if($v=='threadExcelGioVang'){if($trv_giovang>0){if(isset($arrProdcutExcel[$v][$trv_id])){$thread_list.='<td>'.$arrProdcutExcel[$v][$trv_id].'</td>';}else{$thread_list.='<td id="'.$animate_id.'" class="'.$v.'">'.$trv_id.'</td>';}}else{$thread_list.='<td>-</td>';}}else{if(isset($arrProdcutExcel[$v][$trv_id])){$thread_list.='<td>'.$arrProdcutExcel[$v][$trv_id].'</td>';}else{$thread_list.='<td id="'.$animate_id.'" class="'.$v.'">'.$trv_id.'</td>';}}}$thread_list.='</tr>';}$main_content=$func->str_template($dir_admin.'template/thread_list_excel.html',array('tmp.totalThread'=>$totalThread,'tmp.thread_list'=>$thread_list)); 