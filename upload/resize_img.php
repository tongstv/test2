<?php
// up vào thư mục upload
if (isset($_GET['uri'])) {
    $img = $_GET['uri'];

    if (isset($_SERVER['HTTPS'])) {
        if ($_SERVER['HTTPS'] == "on") {
            $secure_connection = true;
        }
    }

    if ($secure_connection) {
        $http = 'https://';

    } else {
        $http = 'http://';
    }


    
    $img = str_replace($http, '', str_replace('www.', '', $img));
    $filename = strstr($img, '/');
    $filename = substr($filename, 1);
    if (file_exists($filename)) {
//		echo $filename; exit();
        // Get new sizes
        list($width, $height) = getimagesize($filename);
        // chiều rộng mới
        if (isset($_GET['w']) && ($w = (int)$_GET['w']) > 50) {
            $newwidth = $w;
            // ~> tính chiều cao
            $newheight = ceil($height * ($newwidth / $width));
        } else if (isset($_GET['h']) && ($h = (int)$_GET['h']) > 50) {
            $newheight = $h;
            // ~> tính chiều rộng
            $newwidth = ceil($width * ($newheight / $height));
        } else {
            $newwidth = 250;
            // ~> tính chiều cao
            $newheight = ceil($height * ($newwidth / $width));
        }
        // Content type
        header('Content-Type: image/jpeg');
//		echo $newwidth/ $width; exit();

        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($filename);

        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        // Output
        imagejpeg($thumb, null, 100);
    } else {
        echo 'File not found';
    }
}
?>