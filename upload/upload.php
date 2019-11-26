<?php
session_start();
error_reporting(E_ALL);
// config
$dir_index = '';
//
function non_mark_seo($str)
{
    $unicode = array(
        'a' => array('á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ặ', 'ằ', 'ẳ', 'ẵ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ặ', 'Ằ', 'Ẳ', 'Ẵ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ'),
        'd' => array('đ', 'Đ'),
        'e' => array('é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ'),
        'i' => array('í', 'ì', 'ỉ', 'ĩ', 'ị', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị'),
        'o' => array('ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ'),
        'u' => array('ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự'),
        'y' => array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'),
        '-' => array(' ', '~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '=', '[', ']', '{', '}', '\\', '|', ';', ':', '\'', '"', ',', '<', '>', '/', '?')
    );
    foreach ($unicode as $nonUnicode => $uni) {
        foreach ($uni as $v) {
            $str = str_replace($v, $nonUnicode, $str);
        }
    }
//	$str = urlencode($str);
    return strtolower($str);
}

//
function upload_file($file_tmp_name, $file_name, $file_size, $return)
{
    global $dir_index;
    //
//	print_r($file_tmp_name);
//	exit();
    //
    $upload_process = 0;
    if (isset($_SERVER['HTTPS'])) {
        if ($_SERVER['HTTPS'] == "on") {
            $secure_connection = true;
        }
    }

    if ($secure_connection) {
        $web_link = 'https://' . $_SERVER['HTTP_HOST'] . '/';

    } else {
        $web_link = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    }


    //
    $file_name = explode('?', $file_name);
    $file_name = $file_name[0];
    $file_name = non_mark_seo($file_name);
    $file_name = str_replace('+', '-', $file_name);
    // kiem tra dinh dang file
    $file_type = explode('.', $file_name);
    $file_type = $file_type[count($file_type) - 1];
    $file_type = strtolower($file_type);
    //
    switch ($file_type) {
        case "gif":
        case "jpg":
        case "jpeg":
        case "png":
        case "swf":
            // thu muc upload
            $dir_upload = date('Y-m-d', time()) . '/';
//			$dir_upload = $dir_index . 'test/';
            $returnFileName = $web_link . $dir_upload . $file_name;
            $dir_upload = $dir_index . $dir_upload;
            // kiem tra thu muc upload da co chua, neu chua co, tao thu muc upload moi
            if (!is_dir($dir_upload)) {
                if (mkdir($dir_upload, 0777)) {
                } else {
                    echo 'mkdir error';
                }
//				if (chmod($dir_upload, 0777)) {
//				} else {
//					echo 'chmod error';
//				}
            }
            // thiet lap ten file
            if (strlen($file_name) > 30) {
                $file_name = str_replace($file_type, '', $file_name);
                $file_name = substr($file_name, 0, 30) . '.' . $file_type;
            }
            $file_name = $dir_upload . $file_name;
            // neu file da ton tai
            if (file_exists($file_name)) {
                $members_alert = 'File has been uploaded...';
            } else {
                // tien hanh upload file
                if (move_uploaded_file($file_tmp_name, $file_name)) {
                    $members_alert = 'Upload finish';
                    // upload thành công
                    $upload_process = 1;
                } else {
                    $members_alert = 'Upload error';
                }
            }
            break;
        default:
            $members_alert = 'Format file not support';
    }
    //
    return array(
        'img' => $returnFileName,
        'mes' => $members_alert,
        'f' => $upload_process
    );
}

// RUN
$m = '';
$f = 0;
if (isset($_FILES["file"]["name"])) {
    if ($_FILES["file"]["error"] > 0) {
        $trv_img = 'ERROR: ' . $_FILES["file"]["error"];
    } else {
        $arr_upload = upload_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"], $_FILES["file"]["size"]);
        //
        $trv_img = $arr_upload['img'];
        $m = $arr_upload['mes'];
        $f = $arr_upload['f'];
    }
} else {
    $m = 'File not found';
}
$domain = $_GET['domain'];
?>
<script type="text/javascript">
    document.domain = '<?php echo $domain; ?>';
    var trv_img = '<?php echo $trv_img; ?>';
    var f = '<?php echo $f; ?>';
    var m = '<?php echo $m; ?>';
    parent.subUpload.cpl(trv_img, f, m);
</script>