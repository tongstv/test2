<?php if(isset($_SESSION['invoice_restore'])){unset($_SESSION['invoice_restore']);}else{$_SESSION['invoice_restore']=true;}include($dir_admin.'invoice.php'); 
