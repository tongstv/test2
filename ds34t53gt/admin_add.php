<?php $js_admin='';$email='';if($id>0&&isset($_GET['email'])&&($email=trim($_GET['email']))!=''){$sql=$func->q("SELECT * FROM tbl_admin WHERE tv_id = (select tv_id from tbl_thanhvien where tv_id = ".$id." and tv_email = '".$email."' limit 0, 1)");if(mysql_num_rows($sql)>0){$row=mysql_fetch_assoc($sql);foreach($row as $k=>$v){$js_admin.=','.$k.':'.(int)$v.'';}}}$main_content=$func->str_template($dir_admin.'template/admin_add.html',array('tmp.js'=>'var quan_ly_nhan_su='.$arr_session_admin['ad_nhansu'].',arr_admin_group={'.substr($js_admin,1).'};','tmp.email'=>$email)); 
