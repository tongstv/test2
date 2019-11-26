var subUpload = {
	startUpload:function () {
		with (document.upload_form) {
			if (file.value == '') {
				alert('Chưa chọn tệp upload');
				return false;
			}
		}
//		alert('test'); return false;
		return true;
	},
	stopUpload:function () {
		dog('bt_submit').style.visibility = 'visible';
		dog('upload_process').style.visibility = 'hidden';
		document.upload_form.file.disabled = false;
		document.upload_form.reset();
	},
	change:function () {
		if (subUpload.startUpload() == false) {
			return false;
		}
		document.upload_form.submit();
		dog('bt_submit').style.visibility = 'hidden';
		dog('upload_process').style.visibility = 'visible';
		document.upload_form.file.disabled = true;
		return true;
	},
	cpl:function (img, finish, m) {
		if (finish == 1) {
//			alert(finish);
		} else if (m && m != '') {
			alert(m);
		}
		if (img && img != '') {
			dog('img_return').value = img;
			if (top == self) {
				alert(img);
			} else {
				parent.picasaUploadEchbay.cpl(img, finish);
			}
		}
		subUpload.stopUpload();
	}
};