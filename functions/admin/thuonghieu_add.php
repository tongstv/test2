<?php $sql=$func->q("SELECT th_id FROM tbl_thuonghieu");$th_stt=mysql_num_rows($sql);$arr_bnt_ten=trim($_POST['t_a_ten']);$arr_bnt_ten=explode("\n",$arr_bnt_ten);foreach($arr_bnt_ten as $k=>$th_ten){$th_ten=str_replace("'","",trim($th_ten));if(strlen($th_ten)>2){$th_seo=$func->non_mark_seo($th_ten);$th_seo=str_replace('--','-',$th_seo);$th_seo=str_replace('--','-',$th_seo);$th_stt++;$func->q("INSERT INTO tbl_thuonghieu (th_ten, th_seo, th_stt) VALUES ('".$th_ten."', '".$th_seo."', ".$th_stt.")");}}die('<script type="text/javascript">parent.gadd.completeAddGroup();</script>'); 
