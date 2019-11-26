<?php if(isset($_SESSION['admin_pro_sort'])){unset($_SESSION['admin_pro_sort']);}else{$_SESSION['admin_pro_sort']=true;}include($dir_admin.'thread_list.php'); 
