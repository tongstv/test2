<?php $so_donhang=0;$soloai_sanpham=0;$soluong_sanpham=0;$doanhthu=0;$doanhthu_trungbinh=0;$sql=$func->q("SELECT hd_id FROM tbl_in_con_voi WHERE tbl_in_con_voi.hd_ngaygui > ".($date_time-(24*3600*30))." AND tbl_in_con_voi.hd_ngaygui < ".strtotime($date_server));$so_donhang=mysql_num_rows($sql);while($row=mysql_fetch_assoc($sql)){$strsql=$func->q("SELECT cthd_soluong, trv_gia FROM tbl_chitiethoadon WHERE hd_id = ".$row['hd_id']."");$soloai_sanpham+=mysql_num_rows($strsql);while($rows=mysql_fetch_assoc($strsql)){$soluong_sanpham+=$rows['cthd_soluong'];$doanhthu+=$rows['trv_gia'];}}if($doanhthu>0&&$so_donhang>0){$doanhthu_trungbinh=$doanhthu/$so_donhang;}$main_content=$func->str_template($dir_admin.'template/ecom.html',array('tmp.js'=>'','tmp.so_donhang'=>number_format($so_donhang),'tmp.soloai_sanpham'=>number_format($soloai_sanpham),'tmp.soluong_sanpham'=>number_format($soluong_sanpham),'tmp.doanhthu'=>number_format($doanhthu),'tmp.doanhthu_trungbinh'=>number_format($doanhthu_trungbinh),)); 