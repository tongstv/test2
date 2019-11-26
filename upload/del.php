<?php
if (isset($_REQUEST['pic']) && ($pic = $_REQUEST['pic']) != '') {
	$pic = explode('/', $pic);
	if (count($pic) > 1) {
		$pic = (count($pic) - 2). '/' .(count($pic) - 1);
		if (file_exists($pic)) {
			unlink($pic);
		} else {
			echo $pic;
		}
	}
}
?>