<?php function upload_file($file_tmp_name,$file_name,$file_size,$return){global $date_time;global $func;global $dir_index;global $mtv_id;global $_gl_min_width;global $_gl_max_width;global $_gl_min_height;global $_gl_max_height;$file_name=explode('?',$file_name);$file_name=$file_name[0];$file_name=$func->non_mark_seo($file_name);$file_name=str_replace('+','-',$file_name);$file_type=explode('.',$file_name);$file_type=$file_type[count($file_type)-1];switch($file_type){case "gif":case "jpg":case "jpeg":case "png":$img_size=getimagesize($file_tmp_name);$img_width=$img_size[0];$img_height=$img_size[1];$dir_upload=$dir_index.'upload/'.date('Y-m-d',$date_time).'/';if(!is_dir($dir_upload)){mkdir($dir_upload,0777);chmod($dir_upload,0777);}if(strlen($file_name)>30){$file_name=str_replace($file_type,'',$file_name);$file_name=substr($file_name,0,30).'.'.$file_type;}$file_name='u'.$mtv_id.'-'.$file_name;$file_name=$dir_upload.$file_name;if(file_exists($file_name)){$_SESSION['members_alert']='File has been uploaded...';return($return=='id')?0:$file_name;}break;case "swf":break;default:$_SESSION['members_alert']='Ảnh upload không đúng định dạng';return($return=='id')?0:'';}if(move_uploaded_file($file_tmp_name,$file_name)){$sql=mysql_query("INSERT INTO tbl_upload (ul_link, ul_ngay, tv_id) VALUES ('".$file_name."', ".$date_time.", ".$mtv_id.")")or die('<script type="text/javascript">alert("Error: 3489");</script>');$sql=mysql_query("SELECT ul_id, ul_link FROM tbl_upload WHERE ul_ngay = ".$date_time." AND tv_id = ".$mtv_id)or die('<script type="text/javascript">alert("select upload id");</script>');if(mysql_num_rows($sql)>0){$row=mysql_fetch_assoc($sql);$_SESSION['members_alert']='Upload Ảnh hoàn tất';return($return=='id')?$row['ul_id']:$row['ul_link'];}}else{$_SESSION['members_alert']='Không upload được Ảnh';}return($return=='id')?0:'';} 
