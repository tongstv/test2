<?php $web_title='Tạo blog mới | ';$bl_trangthai=-4;$func->q("DELETE FROM tbl_blog WHERE bl_trangthai = ".$bl_trangthai." AND bl_ngaygui < ".($date_time-(24*3600)));$func->q("INSERT INTO tbl_blog (bl_ngaygui, bl_trangthai) VALUES (".$date_time.", ".$bl_trangthai.")");$_continue=$web_link.'9999/blog';$sql=$func->q("SELECT bl_id FROM tbl_blog WHERE bl_trangthai = ".$bl_trangthai." ORDER BY bl_id DESC LIMIT 0, 1");if(mysql_num_rows($sql)>0){$row=mysql_fetch_assoc($sql);$_continue=$web_link.'9999/blog_details&id='.(int)$row['bl_id'];$func->log_admin('Blog add #'.$row['bl_id']);}die(header('Location: '.$_continue));