<?php echo 'aaaaaaaaaaaa';if(isset($_GET['image'])&&($image=$_GET['image'])!=''){$sql=$func->q("INSERT INTO tbl_upload (ul_link, ul_ngay, tv_id, trv_id) VALUES ('".$image."', ".$date_time.", ".$mtv_id.", ".$id.")");if($id>0){$sql=$func->q("UPDATE tbl_upload SET trv_id = ".$id." WHERE trv_id = 0 AND ul_ngay > ".strtotime($date_server)." AND tv_id = ".$mtv_id);}}