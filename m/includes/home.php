<?php $web_title=$__cf_row['cf_title'];$meta_title=$__cf_row['cf_meta_title'];$keywords=$__cf_row['cf_keywords'];$news_keywords=$__cf_row['cf_news_keywords'];$description=$__cf_row['cf_description'];$strCacheFilter='home';$main_content=$func->get_static_html($strCacheFilter);if($main_content==false){$total_thread_select=40;$thread_select=4;$sql=$func->q("SELECT ant_id, ant_ten, ant_seo FROM tbl_a_nhomtin WHERE ant_trangthai > 0 AND this_id = 0 ORDER BY ant_stt");$thread_select=$total_thread_select/mysql_num_rows($sql);$thread_select=ceil($thread_select);$thread_list='';while($row=mysql_fetch_assoc($sql)){$ant_id=$row['ant_id'];$ant_ten=$row['ant_ten'];$cidFilter=" AND (ant_id = ".$ant_id." OR ant_id IN (select ant_id from tbl_a_nhomtin where ant_trangthai > 0 and (this_id = ".$ant_id." or this_id in (select ant_id from tbl_a_nhomtin where ant_trangthai > 0 and this_id = ".$ant_id.") ) ) )";$strsql=$func->q("SELECT ".$strForSelect." FROM tbl_tinraovat WHERE ".$strFilter.$cidFilter." ORDER BY trv_stt, trv_ngaycapnhat DESC LIMIT 0, ".$thread_select);$count=mysql_num_rows($strsql);if($count>0){$thread_list.=select_thread_www($strsql);}}$main_content=$func->str_template('template/home.html',array('tmp.thread_list'=>$thread_list));$func->get_static_html($strCacheFilter,$main_content);}