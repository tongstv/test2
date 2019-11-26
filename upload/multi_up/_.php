<?php
session_start();
error_reporting (E_ALL);
//
// lấy dữ liệu theo thông số của từng site -> kiểm tra tất cả các thuộc tính
//if (1 == 1) {
//}
// nếu không có sẽ sử dụng tài khoản mặc định
//else {
//	die('<h3 style="color:#f00">Account not found</h3>');
//}
if (isset($_GET['domain'])) {
	$domain = $_GET['domain'];
} else {
	$domain = '';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Upload subdomain"/>
<meta name="keywords" content="Upload subdomain"/>
<title>Multi Upload</title>
<link id="page_favicon" href="favicon.ico" rel="icon" type="image/x-icon" />
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function dog (id) {
	return document.getElementById(id)
}
//if (top != self) {
//	document.domain = '<?php echo $domain; ?>';
//}
</script>
<script language="javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</head>
<body>
<form name="frm_multi_upload" id="frm_multi_upload" method="post" action="p.php?domain=<?php echo $domain; ?>" enctype="multipart/form-data" target="target_subdomain_uploader">
  <input type="file" name="filesToUpload[]" id="filesToUpload" onchange="multiUpload.chan()" multiple="multiple" />
  <input type="submit" name="bt_submit" id="bt_submit" value="Upload" />
  <img src="load_3.gif" id="upload_process" align="absmiddle" onclick="multiUpload.stopUpload()" style="visibility:hidden" />
</form>
<ul id="file_list" style="display:none">
</ul>
<iframe id="target_subdomain_uploader" name="target_subdomain_uploader" src="about:blank" width="100%" height="600" frameborder="0" scrolling="no" allowtransparency="true">Loading...</iframe>
</body>
</html>