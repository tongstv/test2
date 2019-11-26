var multiUpload = {
	chan:function () {
		var file_list = $('#filesToUpload')[0];
		var list_item = $('#file_list');
		list_item.find('li').remove();
		if (file_list.files.length > 0) {
			for (var i = 0; i < file_list.files.length; i++) {
				var _item = $('<li class="item-' + i + '">' + '<span class="name">' + file_list.files[i].name + '</span> ' + '<span class="type">(' + file_list.files[i].type + ')</span> ' + '<span class="size">' + multiUpload.bytesToSize(file_list.files[i].size) + '</span>' + '</li>');
				_item.appendTo(list_item);
			}
			//
			document.frm_multi_upload.submit();
			dog('bt_submit').style.visibility = 'hidden';
			dog('upload_process').style.visibility = 'visible';
			document.frm_multi_upload.filesToUpload.disabled = true;
			return true;
		} else {
			alert('Không có tệp nào được chọn');
			return false;
			var _item = $('<li>Không có file nào được chọn.</li>');
			_item.appendTo(list_item);
		}
	},
	/*
	 * Convert number of bytes into human readable format
	 *
	 * @param integer bytes     Number of bytes to convert
	 * @param integer precision Number of digits after the decimal separator
	 * @return string
	 */
	bytesToSize:function (bytes, precision) {
		var kilobyte = 1024;
		var megabyte = kilobyte * 1024;
		var gigabyte = megabyte * 1024;
		var terabyte = gigabyte * 1024;
	
		if ((bytes >= 0) && (bytes < kilobyte)) {
			return bytes + ' B';
	
		} else if ((bytes >= kilobyte) && (bytes < megabyte)) {
			return (bytes / kilobyte).toFixed(precision) + ' KB';
	
		} else if ((bytes >= megabyte) && (bytes < gigabyte)) {
			return (bytes / megabyte).toFixed(precision) + ' MB';
	
		} else if ((bytes >= gigabyte) && (bytes < terabyte)) {
			return (bytes / gigabyte).toFixed(precision) + ' GB';
	
		} else if (bytes >= terabyte) {
			return (bytes / terabyte).toFixed(precision) + ' TB';
	
		} else {
			return bytes + ' B';
		}
	},
	stopUpload:function () {
		dog('bt_submit').style.visibility = 'visible';
		dog('upload_process').style.visibility = 'hidden';
		document.frm_multi_upload.filesToUpload.disabled = false;
		document.frm_multi_upload.reset();
		dog('target_subdomain_uploader').src = 'about:blank';
	},
	// complete
	cpl:function (img) {
		if (img && img != '') {
			img = img.substr(1);
			if (top == self) {
				alert(img);
			} else {
				// finish = 1
				img = img.split(',');
				for (i = 0; i < img.length; i++) {
					parent.picasaUploadEchbay.cpl(img[i], 1);
				}
			}
		} else {
			alert('Không có dữ liệu trả về');
		}
		multiUpload.stopUpload();
	}
};
