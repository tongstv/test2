<?php
$dir_index = '../../';
include $dir_index . 'common.php';



// process
if (isset($_GET['domain'])) {
	$domain = $_GET['domain'];
} else {
	$domain = '';
}
$m = '';
$returnFileName = '';
// class resize img
class SimpleImage {
	var $image;
	var $image_type;
	function load($filename) {
		$image_info = getimagesize($filename);
		$this->image_type = $image_info[2];
		if( $this->image_type == IMAGETYPE_JPEG ) {
			$this->image = imagecreatefromjpeg($filename);
		} elseif( $this->image_type == IMAGETYPE_GIF ) {
			$this->image = imagecreatefromgif($filename);
		} elseif( $this->image_type == IMAGETYPE_PNG ) {
			$this->image = imagecreatefrompng($filename);
		}
	}
	function save($filename, $image_type=IMAGETYPE_JPEG, $compression=95, $permissions=null) {
		if( $image_type == IMAGETYPE_JPEG ) {
			imagejpeg($this->image,$filename,$compression);
		} elseif( $image_type == IMAGETYPE_GIF ) {
			imagegif($this->image,$filename);
		} elseif( $image_type == IMAGETYPE_PNG ) {
			imagepng($this->image,$filename);
		}
		if( $permissions != null) {
			chmod($filename,$permissions);
		}
	}
	function output($image_type=IMAGETYPE_JPEG) {
		if( $image_type == IMAGETYPE_JPEG ) {
			imagejpeg($this->image);
		} elseif( $image_type == IMAGETYPE_GIF ) {
			imagegif($this->image);
		} elseif( $image_type == IMAGETYPE_PNG ) {
			imagepng($this->image);
		}
	}
	function getWidth() {
		return imagesx($this->image);
	}
	function getHeight() {
		return imagesy($this->image);
	}
	function resizeToHeight($height) {
		$ratio = $height / $this->getHeight();
		$width = $this->getWidth() * $ratio;
		$this->resize($width,$height);
	}
	function resizeToWidth($width) {
		$ratio = $width / $this->getWidth();
		$height = $this->getheight() * $ratio;
		$this->resize($width,$height);
	}
	function scale($scale) {
		$width = $this->getWidth() * $scale/100;
		$height = $this->getheight() * $scale/100;
		$this->resize($width,$height);
	}
	function resize($width,$height) {
		$new_image = imagecreatetruecolor($width, $height);
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		$this->image = $new_image;
	}      
}
// function
function set_logo_copyright ($tmpname, $file_type) {
	$dest_size = getimagesize($tmpname);
	// xác định chiều rộng, chiều cao của ảnh và trừ đi 1 để padding 1 px
	$dest_x = $dest_size[0];
	$dest_y = $dest_size[1];
	// logo mặc định là JPG
	$src = 'font/logo_copyright.jpg';
	// xác định chiều dài, rộng của logo (cả 3 định dạng như 1) -> căn giữa WM
	$arr = getimagesize($src);
	$logo_size_x = $arr[0];
	$logo_size_y = $arr[1];
	// nếu chiều Dài hoặc Rộng của ảnh mà nhỏ hơn WM -> hủy luôn
	if ($dest_x < $logo_size_x || $dest_y < $logo_size_y) {
		return;
	}
	// căn giữa
//	$dest_x = ceil($dest_x/ 3) * 2;
//	$dest_y = ceil($dest_y/ 3) * 2;
	$toa_do_anh = 0;
	// căn góc
	$logo_size_x += $toa_do_anh;
	$logo_size_y += $toa_do_anh;
	// tính tọa độ chèn logo
	switch ( rand(0, 4) ) {
		// ở góc trên cùng bên trái
		case 1:
			$dest_x = $toa_do_anh;
			$dest_y = $toa_do_anh;
			break;
		// ở góc trên cùng bên phải
		case 2:
			$dest_x = $toa_do_anh;
			$dest_y -= $logo_size_y;
			break;
		// ở góc dưới cùng bên trái
		case 3:
			$dest_x -= $logo_size_x;
			$dest_y = $toa_do_anh;
			break;
		// mặc định là góc dưới cùng của ảnh
		default:
			$dest_x -= $logo_size_x;
			$dest_y -= $logo_size_y;
			break;
	}
	// độ trong suốt của hình ảnh
	$pct = 20;
	// xác định định dạng ảnh
	switch ($file_type) {
		/*
		case "gif":
			// img
			$dest = imagecreatefromgif($tmpname);
			$src = imagecreatefromgif($src);
			// Copy and merge
			imagecopymerge($dest, $src, $dest_x, $dest_y, 0, 0, $logo_size_x, $logo_size_y, $pct);
			imagegif($dest, $tmpname);
			break;
		*/
		case "jpg":
		case "jpeg":
			// img
			$dest = imagecreatefromjpeg($tmpname);
			$src = imagecreatefromjpeg($src);
			// Copy and merge
			imagecopymerge($dest, $src, $dest_x, $dest_y, 0, 0, $logo_size_x, $logo_size_y, $pct);
			imagejpeg($dest, $tmpname);
			break;
		case "png":
			// img
			$dest = imagecreatefrompng($tmpname);
			$src = imagecreatefrompng($src);
			// Copy and merge
			imagecopymerge($dest, $src, $dest_x, $dest_y, 0, 0, $logo_size_x, $logo_size_y, $pct);
			imagepng($dest, $tmpname);
			break;
	}
	// giải phóng bộ nhớ
	imagedestroy($dest);
	imagedestroy($src);
	return;
}
function set_text_copyright($tmpname, $file_type, $xy) {
	$r = 204;
	$g = 204;
	$b = 204;
	$logo_text = '';
	$font = 'font/55-11871-Orion-Pax.ttf';
	if ($file_type == 'swf') return;
	//
	$size = 15;
//	$r = 0; // red
//	$g = 0; // green
//	$b = 0; // blue
	if (1 == 1) {
		$x = rand(1, 400);
		$y = $size + rand(1, 400);
	} else {
		// xác định chiều rộng, chiều cao của ảnh và trừ đi 1 để padding 1 px
		$dest_size = getimagesize($tmpname);
		$dest_x = $dest_size[0];
		$dest_y = $dest_size[1];
		if ($dest_x < 250) {
			$chia = 8;
		} else if ($dest_x < 350) {
			$chia = 6;
		} else if ($dest_x < 450) {
			$chia = 4;
		} else {
			$chia = 3;
		}
		$x = ceil($dest_x/ $chia) + $xy;
		$y = ceil($dest_y/ 2) + $xy;
	}
	// copy đè lên ảnh theo các định dạng ảnh đưa ra
	switch ($file_type) {
		case "gif":
			$img = imagecreatefromgif($tmpname);
			// màu của chữ
			$color = imagecolorallocate($img, $r, $g, $b);
			imagettftext($img, $size, 0, $x, $y, $color, $font, $logo_text);
			imagegif($img, $tmpname);
			break;
		case "jpg":
		case "jpeg":
			$img = imagecreatefromjpeg($tmpname);
			$color = imagecolorallocate($img, $r, $g, $b);
			imagettftext($img, $size, 0, $x, $y, $color, $font, $logo_text);
			imagejpeg($img, $tmpname);
			break;
		case "png":
			$img = imagecreatefrompng($tmpname);
			$color = imagecolorallocate($img, $r, $g, $b);
			imagettftext($img, $size, 0, $x, $y, $color, $font, $logo_text);
			imagepng($img, $tmpname);
			break;
	}
	// free from memory
	imagedestroy($img);
//	imagedestroy($tmpname);
	return;
}
// quét và tìm các file php có trong thư mục này và xóa nó đi
function scan_delete_php ($source_folder) {
	$dir = opendir($source_folder);
	// thư mục chưa dữ liệu
	while ( ($file_name = readdir($dir)) != false ) {
		$filetype =  filetype($source_folder . $file_name);
		if( $filetype == 'file' ) {
			$ee = explode('.', $file_name);
			$ee = $ee[count($ee) - 1];
			$ee = strtolower($ee);
			switch ($ee) {
				case "gif":
				case "jpg":
				case "jpeg":
				case "png":
					break;
				default:
					// xóa file ko cần thiết
					$xoaFile = $source_folder . $file_name;
					if (file_exists($xoaFile)) {
						unlink($xoaFile);
					}
			}
		}
	}
	closedir($dir);
}
function non_mark_seo ($str) {
	$unicode = array(
		'a' => array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ','Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
		'd' => array('đ','Đ'),
		'e' => array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ','É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
		'i' => array('í','ì','ỉ','ĩ','ị', 'Í','Ì','Ỉ','Ĩ','Ị'),
		'o' => array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
		'u' => array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự','Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
		'y' => array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
		'-' => array(' ','~','`','!','@','#','$','%','^','&','*','(',')','=','[',']','{','}','\\','|',';',':','\'','"',',','<','>','/','?')
	);
	foreach ($unicode as $nonUnicode=>$uni) {
		foreach ($uni as $v) {
			$str = str_replace($v,$nonUnicode,$str);
		}
	}
	return strtolower($str);
}
//
$dir_index = '../';


//
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// thư mục upload
	$dirReturn = date('Y-m-d', time()). '/';
	$dir_upload = $dir_index . $dirReturn;
	$dir_upload_128 = $dir_upload. '128/';
	$dir_upload_228 = $dir_upload. '228/';
	// kiem tra thu muc upload da co chua, neu chua co, tao thu muc upload moi
	if(!is_dir($dir_upload)) {
		mkdir($dir_upload, 0777) or die('mkdir error');
		// server window ko cần chmod
		chmod($dir_upload, 0777) or die('chmod ERROR');
		/*
		* Tạo thư mục chứa thumb
		*/
		if(!is_dir($dir_upload_128)) {
			mkdir($dir_upload_128, 0777) or die('mkdir error');
			// server window ko cần chmod
			chmod($dir_upload_128, 0777) or die('chmod ERROR');
		}
		if(!is_dir($dir_upload_228)) {
			mkdir($dir_upload_228, 0777) or die('mkdir error');
			// server window ko cần chmod
			chmod($dir_upload_228, 0777) or die('chmod ERROR');
		}
	}
	//
	if (count($_FILES['filesToUpload'])) {
		// chạy vòng lặp để upload tất cả các file lên server
		for ($i = 0; $i < count($_FILES['filesToUpload']['name']); $i++) {
			// tạo file upload
			$strBasename = basename($_FILES['filesToUpload']['name'][$i]);
				$strBasename = non_mark_seo($strBasename);
			$target_path = $dir_upload . $strBasename;
			// kiểm tra xem file đã được upload chưa
			if (file_exists($target_path)) {
				$m = $strBasename. ': <em style="color:#f00">Exist</em><br />';
//				echo $m;
			} else {
				// kiểm tra định dạng file xem có được upload không
				$file_type = explode('.', $strBasename);
				$file_type = $file_type[count($file_type) - 1];
				$file_type = strtolower($file_type);
				switch ($file_type) {
					case "gif":
					case "jpg":
					case "jpeg":
					case "png":
					case "swf":
						if (move_uploaded_file($_FILES['filesToUpload']['tmp_name'][$i], $target_path)) {
							// resize thumb
							$reImage = new SimpleImage();
							$reImage->load($target_path);
							// resize theo chiều cố định
//							$image->resize(250,400);
							// resize theo %
//							$image->scale(50);
							//
							$new_thumb128 = $dir_upload_128 . $strBasename;
							$reImage->resizeToWidth(128);
							$reImage->save($new_thumb128);
							//
							$new_thumb228 = $dir_upload_228 . $strBasename;
							$reImage->resizeToWidth(228);
							$reImage->save($new_thumb228);
							// đóng dấu logo
//							set_text_copyright($target_path, $file_type, 2);
							//set_text_copyright($target_path, $file_type, 0);
//							set_logo_copyright($target_path, $file_type);
							//
							$m = $strBasename. ': <strong style="color:#0f0">OK</strong><br/>';
//							echo $m;
//							$returnFileName .= ',' .$web_link . $dirReturn . $strBasename;
							$returnFileName .= ',upload/' .$dirReturn . $strBasename;
						} else {
							$m = $strBasename. ': <em style="color:#f00">ERROR</em><br/>';
//							echo $m;
						}
						break;
					default:
						$m = $strBasename. ': <em style="color:#f00">File type</em><br/>';
				}
			}
		}
	}
} else {
	$dir_images = '../';
	if ( isset($_GET['copy'], $_GET['img']) && ( $img_source = trim($_GET['img']) ) != '' ) {
		// thư mục upload
		$dirReturn = date('Y-m-d', time()). '/';
		$dir_upload = $dir_index . $dirReturn;
		if(!is_dir($dir_upload)) {
			mkdir($dir_upload, 0777) or die('mkdir error');
			// server window ko cần chmod
			chmod($dir_upload, 0777) or die('chmod ERROR');
			
			
			// Thư mục copy
			echo 'DIR: ' .$dir_upload. "\n";
		}


		// Ảnh nguồn
		echo 'SOURCE: ' .$img_source. "\n";


		
		
		// Ảnh mới
		$file_name = explode('/', $img_source);
		$file_name = $file_name[ count($file_name) - 1 ];
		$file_name = non_mark_seo( $file_name );
		
		
		// file copy
		$file_copy = $dir_upload . $file_name;
		
		
		$file_url = '';
		if ( file_exists( $file_copy ) ) {
			$file_url = $web_link. 'upload/' .$dirReturn . $file_name;

			echo "FILE EXIST\n";
		} else {
			//
			echo 'FILENAME: ' .$file_name. "\n";


			echo 'FILECOPY: ' .$file_copy. "\n";
			
			if ( copy( $img_source, $file_copy ) ) {
				// url file
				$file_url = $web_link. 'upload/' .$dirReturn . $file_name;
			}
		}
		
		if ( $file_url == '' ) {
			echo "ERROR COPY IMG\n";
		} else {
			echo 'FILEURL: ' .$file_url. "\n";
		}
		
	}
	// resize
	else if (isset($_GET['resize_day']) && ($resize_day = trim($_GET['resize_day'])) != '') {
		// resize thumb
		$reImage = new SimpleImage();
		//
		$dir_images .= $resize_day. '/';
		echo $dir_images. '<br />';
		// tạo thư mục chứa thumb
		$dir_images_128 = $dir_images. '128/';
		if(!is_dir($dir_images_128)) {
			mkdir($dir_images_128, 0777) or die('mkdir error');
			// server window ko cần chmod
			chmod($dir_images_128, 0777) or die('chmod ERROR');
		}
		$dir_images_228 = $dir_images. '228/';
		if(!is_dir($dir_images_228)) {
			mkdir($dir_images_228, 0777) or die('mkdir error');
			// server window ko cần chmod
			chmod($dir_images_228, 0777) or die('chmod ERROR');
		}
		//
		$dir = opendir($dir_images);
		while ( ($file_name = readdir($dir)) != false ) {
			$filetype =  filetype($dir_images . $file_name);
			if ($filetype == 'file' ) {
				$target_path = $dir_images . $file_name;
				// xóa ảnh khi test
				/*
				$a = explode('_', $file_name);
				$a = $a[count($a) - 1];
				$a = explode('.', $a);
				if ($a[0] == '228') {
					unlink($target_path);
					echo $target_path. '<br />';
				}
				*/
				echo $target_path;
				if (isset($_GET['watermark']) && ($watermark = trim($_GET['watermark'])) != '') {
					// kiểm tra định dạng file xem có được upload không
					$file_type = explode('.', $file_name);
					$file_type = $file_type[count($file_type) - 1];
					$file_type = strtolower($file_type);
					//
				//	set_text_copyright($target_path, $file_type, 0);
				} else {
					$reImage->load($target_path);
					// 128px
					$new_thumb128 = $dir_images_128 . $file_name;
					if (file_exists($new_thumb128)) {
						echo ' &raquo; <font color="#FF0000">' .$new_thumb128. '</font>';
					} else {
						$reImage->resizeToWidth(128);
						$reImage->save($new_thumb128);
						echo ' &raquo; <font color="#00FF00">' .$new_thumb128. '</font>';
					}
					// 228px
					$new_thumb228 = $dir_images_228 . $file_name;
					if (file_exists($new_thumb228)) {
						echo ' &raquo; <font color="#FF0000">' .$new_thumb228. '</font>';
					} else {
						$reImage->resizeToWidth(228);
						$reImage->save($new_thumb228);
						echo ' &raquo; <font color="#00FF00">' .$new_thumb228. '</font>';
					}
				}
				echo '<br />';
			}
		}
		closedir($dir);
	} else if (isset($_GET['show_data'])) {
		$dir = opendir($dir_images);
		while ( ($file_name = readdir($dir)) != false ) {
			$filetype =  filetype($dir_images . $file_name);
			if( $filetype == 'dir' && strlen($file_name) == 10) {
//				echo '<a href="p.php?resize_day=' .$file_name. '" target="_blank">' .$file_name. '</a><br />';
				echo '<a href="p.php?resize_day=' .$file_name. '&watermark=true" target="_blank">' .$file_name. '</a><br />';
			}
		}
		closedir($dir);
	}
	exit();
}
?>
<script type="text/javascript">
// finish
var domainDomain = '<?php echo $domain; ?>';
//if (domainDomain != '') {
//	document.domain = domainDomain;
//}
var trv_img = '<?php echo $returnFileName; ?>';
parent.multiUpload.cpl(trv_img);
</script>


<?php
exit();
?>