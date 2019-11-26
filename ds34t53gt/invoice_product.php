<?php if(isset($_SESSION['invoice_by_product'])){unset($_SESSION['invoice_by_product']);}else{$_SESSION['invoice_by_product']=1;}include($dir_admin.'invoice.php'); 
