<?php $_POST=$func->checkPostServerClient();echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';switch($_GET['module_id']){case "register":case "qregister":case "referrer":include('guest/'.$_GET['module_id'].'.php');break;case "booking":require('guest/booking.php');break;case "forgot_password":require('guest/forgot_password.php');break;default:die('default...');break;}die('<script type="text/javascript">window.location="'.$web_link.'";</script>');