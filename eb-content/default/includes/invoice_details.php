<?php $sql=$func->q("SELECT * FROM tbl_in_con_voi WHERE hd_id = ".$id." AND tv_id = ".$mtv_id." LIMIT 0, 1 ");if(mysql_num_rows($sql)>0){$row=mysql_fetch_assoc($sql);$hd_ten=$row['hd_ten'];$hd_diachi=$row['hd_diachi'];$hd_ghichu=$row['hd_ghichu'];$hd_dienthoai=$row['hd_dienthoai'];$hd_ngaygui=$row['hd_ngaygui'];$hd_trangthai=$row['hd_trangthai'];$strsql=$func->q("SELECT tbl_chitiethoadon.*, tbl_tinraovat.trv_tieude, tbl_tinraovat.trv_seo, tbl_tinraovat.trv_img FROM tbl_chitiethoadon, tbl_tinraovat WHERE tbl_chitiethoadon.hd_id = ".$id." AND tbl_chitiethoadon.trv_id = tbl_tinraovat.trv_id GROUP BY tbl_chitiethoadon.trv_id ORDER BY tbl_chitiethoadon.cthd_id DESC");$product_invoi_list='';$tongtien=0;if(mysql_num_rows($strsql)>0){while($rows=mysql_fetch_assoc($strsql)){$cthd_soluong=$rows['cthd_soluong'];$trv_id=$rows['trv_id'];$trv_gia=$rows['trv_gia'];$trv_tieude=$rows['trv_tieude'];$trv_seo=$rows['trv_seo'];$trv_img=$rows['trv_img'];$tongtien_line=$trv_gia*$cthd_soluong;$tongtien+=$tongtien_line;$product_invoi_list.=' <tr> <td>'.$trv_id.'</td> <td><a href="'.$func->_p_link($trv_id,$trv_seo).'" target="_blank">'.$trv_tieude.'</a></td> <td>'.number_format($trv_gia).'</td> <td>'.$cthd_soluong.'</td> <td>'.number_format($tongtien_line).'</td> </tr> ';}}$main_content=$func->str_template('template/m/invoice_details.html',array('tmp.js'=>'var hd_id='.$id.',hd_trangthai='.$hd_trangthai.';','tmp.id'=>$id,'tmp.hd_ten'=>$hd_ten,'tmp.hd_diachi'=>$hd_diachi,'tmp.hd_dienthoai'=>$hd_dienthoai,'tmp.hd_ngaygui'=>date('d-m-Y (H:i)',$hd_ngaygui),'tmp.str_hd_trangthai'=>'<span class="hd_status'.$hd_trangthai.'">'.$arr_hd_trangthai[$hd_trangthai].'</span>','tmp.hd_ghichu'=>$hd_ghichu,'tmp.tongtien'=>str_replace(',','.',number_format($tongtien)),'tmp.product_invoi_list'=>$product_invoi_list));}else{$main_content='<h2 align="center">Không có dữ liệu...</h2>';} 