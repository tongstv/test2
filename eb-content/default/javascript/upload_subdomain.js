var picasaUploadEchbay = {
    nap: function (picasa_post_uri, domainDomain) {
        if (!picasa_post_uri) {
            picasa_post_uri = 'media/index.php';
            picasa_post_uri += '?v=' + Math.random();
            if (picasa_user != '' && picasa_user.indexOf('@gmail.com') != -1 && picasa_pass != '' && picasa_album != '') {
                picasa_post_uri += '&user=' + picasa_user;
                picasa_post_uri += '&pass=' + picasa_pass;
                picasa_post_uri += '&albumId=' + picasa_album
            }
        } else {
            picasa_post_uri += '?domain=' + domainDomain
        }
        document.getElementById('target_picasa_uploader').src = picasa_post_uri
    }, rs: function (img, _size) {
        if (!_size) {
            _size = 0
        }
        switch (_size) {
            case 150:
            case 640:
            case 800:
            case 1024:
                break;
            default:
                _size = 600;
                break
        }
        _size = _size.toString();
        img = img.split('/');
        str = '';
        for (i = 0; i < img.length - 1; i++) {
            str += img[i] + '/'
        }
        str += 's' + _size + '/' + img[i];
        return str
    }, cpl: function (img, finish) {
        if (img && img != '') {
            if (finish && finish == 1) {
                var jd = 'procee_upload_pic_finish';
                $('#' + jd).remove();
                $('<div id="' + jd + '"></div>').appendTo('body');
                ajaxl('member.php?act=picasa_upload&image=' + img + '&id=' + pid, jd, 9, function () {
                    ajaxl('member.php?act=avatar&id=' + pid, 'oiAvatar', 9)
                })
            }
        } else {
            console.log('IMG return NULL')
        }
    }, getImg: function () {
        var myIFrame = document.getElementById('target_picasa_uploader');
        var content = myIFrame.contentWindow.document.body.innerHTML;
        alert(content);
        setTimeout(function () {
            picasaUploadEchbay.getImg()
        }, 1000)
    }
};
var domain_domain = document.domain.replace('www.', '');
with (picasaUploadEchbay) {
    nap(web_link + 'upload/multi_up/_.php', domain_domain)
}