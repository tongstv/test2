<?php $ant_ten=trim($_POST['t_ten']);$ant_seo=trim($_POST['t_seo']);if($ant_seo==''){$ant_seo=$ant_ten;}$ant_seo=$func->non_mark_seo($ant_seo);$ant_stt=(int)$_POST['t_stt'];$ant_trangthai=$_POST['t_trangthai'];$ant_color=str_replace('#','',trim($_POST['t_color']));if(strlen($ant_color)==3||strlen($ant_color)==6){$ant_color=strtoupper($ant_color);}else{$ant_color='';}$ant_bg=trim($_POST['t_bg']);$ant_bg_img=trim($_POST['t_bg_img']);if(isset($_FILES["file"]["name"])){$img=$_FILES["file"]["name"];if($img!=''){if($_FILES["file"]["error"]>0){$members_alert=$_FILES["file"]["error"];}else{$img=upload_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"],$_FILES["file"]["size"],'');if(isset($_SESSION['members_alert']))$members_alert=$_SESSION['members_alert'].' . ';if($img!='')$ant_bg_img=$img;}}}$ant_bg_nav=trim($_POST['t_bg_nav']);$ant_bg_nav=trim($_POST['t_bg_nav']);if(isset($_FILES["file2"]["name"])){$img=$_FILES["file2"]["name"];if($img!=''){if($_FILES["file2"]["error"]>0){$members_alert=$_FILES["file2"]["error"];}else{$img=upload_file($_FILES["file2"]["tmp_name"],$_FILES["file2"]["name"],$_FILES["file2"]["size"],'');if(isset($_SESSION['members_alert']))$members_alert=$_SESSION['members_alert'].' . ';if($img!='')$ant_bg_nav=$img;}}}$ant_title=$_POST['t_title'];$ant_meta_title=$_POST['t_meta_title'];$ant_keywords=$_POST['t_keywords'];$ant_news_keywords=$_POST['t_news_keywords'];$ant_description=$_POST['t_description'];if(strlen($ant_ten)>1){$func->q("UPDATE tbl_a_nhomtin SET ant_ten = '".$ant_ten."', ant_seo = '".$ant_seo."', ant_title = '".$ant_title."', ant_meta_title = '".$ant_meta_title."', ant_keywords = '".$ant_keywords."', ant_news_keywords = '".$ant_news_keywords."', ant_description = '".$ant_description."', ant_stt = ".$ant_stt.", ant_trangthai = ".$ant_trangthai.", ant_color = '".$ant_color."', ant_bg = '".$ant_bg."', ant_bg_img = '".$ant_bg_img."', ant_bg_nav = '".$ant_bg_nav."' WHERE ant_id = ".$cid);$m='CẬP NHẬT thông tin nhóm: '.$ant_ten;}else{$m='Tên nhóm quá ngắn';}$_SESSION['session_update_cache']=1;die('<script type="text/javascript">alert("'.$m.'");parent.show_ant_bg___("'.$ant_bg_img.'", "'.$ant_bg_nav.'");</script>');