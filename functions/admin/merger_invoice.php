<?php $invoice_id=$_POST['invoice_id_value'];$m='';$ketqua=0;$arr_invoice_id=explode(',',$invoice_id);if(count($arr_invoice_id)>1){$new_hd_id=$arr_invoice_id[0];$update_invoice_id=strstr($invoice_id,',');$update_invoice_id=substr($update_invoice_id,1);$strFilter=" hd_id IN (".$update_invoice_id.")";$sql="UPDATE tbl_chitiethoadon SET hd_id = ".$new_hd_id." WHERE ".$strFilter;$func->q($sql);$sql="UPDATE tbl_in_con_voi SET hd_trangthai = 4 WHERE ".$strFilter;$func->q($sql);$m='Gộp các hóa đơn được chọn thành công';$ketqua=1;$func->log_admin('Merger invoice #'.$new_hd_id);}else{$m='Cần từ 2 hóa đơn trở lên mới có thể gộp';}die('<script type="text/javascript">parent.cpl_gop_hd("'.$m.'",'.$ketqua.')</script>'); 
