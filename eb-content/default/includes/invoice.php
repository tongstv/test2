<?php $strLinkPager='u/invoice';$threadInPage=10;$part_page='';$sql=$func->q("SELECT hd_id FROM tbl_in_con_voi WHERE tv_id = ".$mtv_id);$totalThread=mysql_num_rows($sql);if($totalThread>0){$totalPage=ceil($totalThread/$threadInPage);if($page>$totalPage)$page=$totalPage;$offset=($page-1)*$threadInPage;$sql=$func->q("SELECT hd_id, hd_trangthai FROM tbl_in_con_voi WHERE tv_id = ".$mtv_id." ORDER BY hd_id DESC LIMIT ".$offset.", ".$threadInPage);while($row=mysql_fetch_assoc($sql)){$hd_id=$row['hd_id'];$hd_trangthai=$row['hd_trangthai'];$main_content.='<tr class="hd_status'.$hd_trangthai.'"><td><a title="Xem chi tiết hóa đơn này" href="u/invoice_details&id='.$hd_id.'">'.$hd_id.'</a></td><td>'.$arr_hd_trangthai[$hd_trangthai].'</td><td><a title="Xem chi tiết hóa đơn này" href="u/invoice_details&id='.$hd_id.'">Xem chi tiết &raquo;</a></td></tr>';}if($totalPage>1){$part_page=$func->part_page($page,$totalPage,$strLinkPager.'&p=');}}else{$part_page='<h2 align="center">Không có dữ liệu...</h2>';}$main_content=$func->str_template('template/m/invoice.html',array('tmp.part_page'=>$part_page,'tmp.main_content'=>$main_content)); 
