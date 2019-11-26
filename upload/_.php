<?php
session_start();
#error_reporting (E_ALL);
//
// lấy dữ liệu theo thông số của từng site -> kiểm tra tất cả các thuộc tính
//if (1 == 1) {
//}
// nếu không có sẽ sử dụng tài khoản mặc định
//else {
//	die('<h3 style="color:#f00">Account not found</h3>');
//}
$domain = $_GET['domain'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="Upload subdomain"/>
    <meta name="keywords" content="Upload subdomain"/>
    <title>Picase Upload</title>
    <link id="page_favicon" href="favicon.ico" rel="icon" type="image/x-icon"/>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <script type="text/javascript">
        function dog(id) {
            return document.getElementById(id)
        }

        if (top != self) {
            document.domain = '<?php echo $domain; ?>';
        }
    </script>
    <script type="text/jscript" src="script.js"></script>
</head>
<body>
<div class="upload-frm">
    <form name="upload_form" action="upload.php?domain=<?php echo $domain; ?>" method="post"
          enctype="multipart/form-data" target="target_subdomain_uploader" onsubmit="return subUpload.startUpload()">
        <input name="file" id="file" size="22" onchange="subUpload.change()" type="file"/>
        <input title="Upload Ảnh" type="submit" value="Upload" name="bt_submit" id="bt_submit"/>
        <img src="load_3.gif" id="upload_process" align="absmiddle" onclick="subUpload.stopUpload()"/>
    </form>
</div>
<input type="hidden" name="img_return" id="img_return" value=""/>
<iframe id="target_subdomain_uploader" name="target_subdomain_uploader" src="about:blank" width="100%" height="1"
        frameborder="0" scrolling="no">Loading...
</iframe>
</body>
</html>