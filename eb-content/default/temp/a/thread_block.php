<?php if(isset($_GET['status'])){$status=(int)$_GET['status'];$func->q("UPDATE tbl_tinraovat SET trv_trangthai = ".$status." WHERE trv_id = ".$pid);die('<b>OK</b>');}else{die('<b>Status <em>NULL</em></b>');} 
