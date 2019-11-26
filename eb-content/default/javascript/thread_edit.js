
var arr_dcontent = {
    noidung: 'Gi\u1edbi thi\u1ec7u chi ti\u1ebft',
    tomtat: '\u0110i\u1ec3m n\u1ed5i b\u1eadt',
    dieukien: '\u0110i\u1ec1u ki\u1ec7n s\u1eed d\u1ee5ng'
};
var p_edit_class = {
    a: function () {
        var str_button = '', i = 0;
        for (var x in arr_dcontent) {
            if (i == 0) {
                $('#oc_' + x).show();
                i++
            }
            str_button += '<div data-id="' + x + '" class="cur lf titleCSS bold" style="padding:5px 15px;">' + arr_dcontent[x] + '</div> ';
            $w.a('t_' + x)
        }
        dog('oi_button_content', str_button);
        $('#oi_button_content div:first').addClass('redcolor');
        $('#oi_button_content div').click(function () {
            $('#oi_button_content div').removeClass('redcolor');
            for (var x in arr_dcontent) {
                $('#oc_' + x).hide()
            }
            $(this).addClass('redcolor');
            $('#oc_' + $(this).attr('data-id')).show()
        })
    }, b: function (obj) {
    }, giovang: function () {
        var dd = trv_ngayhethan.dd, mm = trv_ngayhethan.mm,
            yy = trv_ngayhethan.yy, gio = trv_giovang.h, phut = trv_giovang.i, d = trv_giovang.d, m = trv_giovang.m,
            y = trv_giovang.y, str_gio = '', str_phut = '', str_ngay = '', str_thang = '', str_nam = '';
        if (gio != 0 && d != 0) {
        }
        str_gio += '<option value="0">[ Gi\u1edd ]</option>';
        for (var i = 6; i <= 23; i++) {
            if (i == gio) {
                str_gio += '<option value="' + i + '" selected="selected">' + i + '</option>'
            } else {
                str_gio += '<option value="' + i + '">' + i + '</option>'
            }
        }
        dog('oi_gio_giovang').innerHTML = '<select name="t_gio_vang">' + str_gio + '</select>';
        str_phut += '<option value="0">[ Ph\u00fat ]</option>';
        for (var i = 0; i < 50; i += 15) {
            if (i == phut) {
                str_phut += '<option value="' + i + '" selected="selected">' + i + '</option>'
            } else {
                str_phut += '<option value="' + i + '">' + i + '</option>'
            }
        }
        dog('oi_phut_giovang').innerHTML = '<select name="t_phut_vang">' + str_phut + '</select>';
    }, load_da_mua: function (type) {
        var uri = 'guest.php?act=str_damua&id=' + pid;
        if (trv_giovang.h != 0 || trv_giovang.d != 0) {
            uri += '&finish=true'
        }
        ajaxl(uri, 'oi_da_mua_list', 9)
    }, yt: function () {
        var u = dog('yt_link').value;
        if (u != '') {
            u = u.split("&");
            u = u[0];
            if (u.indexOf("v=") != -1) {
                u = u.split("v=");
                if (u[1]) {
                    u = u[1]
                } else {
                    u = u[0]
                }
            }
            u = '<iframe width="560" height="315" src="http://www.youtube.com/embed/' + u + '" frameborder="0" allowfullscreen></iframe>';
            dog('yt_link').value = '';
            insertHTML(u, 't_noidung')
        }
    }, support_bang: function (hidden_id) {
        if (!hidden_id) {
            hidden_id = 'oi_gioithieu_bang'
        }
        if (dog(hidden_id).style.display == 'none') {
            dog(hidden_id).style.display = 'block'
        } else {
            dog(hidden_id).style.display = 'none'
        }
    }, hidden_damua: function () {
        var animate_id = 'oi_da_mua_list';
        if ($('#' + animate_id).height() < 100) {
            $("#" + animate_id).show().animate({height: '400px'}, 600)
        } else {
            $("#" + animate_id).show().animate({height: '0'}, 600, function () {
                $("#" + animate_id).hide().animate({}, 100)
            })
        }
    }
};
var load_ds_khachhang = true;

function func_load_ds_khachhang() {
    if (load_ds_khachhang == true) {
        load_ds_khachhang = false;
        p_edit_class.load_da_mua()
    }
}

(function () {
    var load_img_date = dog('oi_hidden_img').getElementsByTagName('img'), str_date = '',
        ex_date = '', arr_date = [], export_img = '';
    for (var x = 0; x < load_img_date.length; x++) {
        load_img_date[x].src = load_img_date[x].src;
        if (load_img_date[x].src.split(location.protocol+'//').length == 1) {
            load_img_date[x].src = web_link + load_img_date[x].src
        }
        if (load_img_date[x].alt == '') {
            load_img_date[x].alt = document.frm_thread_add.t_tieude.value.replace(/\"/g, '') + ' (' + (x + 1) + ')'
        }
        export_img += '<li><div><a href="javascript:void(addAvatar(\'' + load_img_date[x].src + '\'));">\u0110\u1eb7t l\u00e0m \u1ea3nh \u0111\u1ea1i di\u1ec7n</a></div> <img src="' + load_img_date[x].src + '" /></li>';
        ex_date = load_img_date[x].src;
        if (ex_date.indexOf(web_link.replace(location.protocol+'//', '').replace('www.', '').split('/')[0]) != -1) {
            ex_date = ex_date.split("/");
            ex_date = ex_date[ex_date.length - 2];
            arr_date[ex_date] = true
        }
    }
    for (var x in arr_date) {
        str_date += ',' + x
    }
    str_date = str_date.substr(1);
    dog('oi_date_sp').innerHTML = '<div><a href="javascript:ajaxl(\'member.php?act=avatar&id=' + pid + '\',\'oiAvatar\',1)">\u1ea2nh s\u1ea3n ph\u1ea9m n\u00e0y</a></div>' + '<div><a href="javascript:ajaxl(\'member.php?act=avatar&date_sp=' + str_date + '\',\'oiAvatar\',1)">\u1ea2nh \u0111\u0103ng c\u00f9ng ng\u00e0y</a></div>' + '<div><a href="javascript:ajaxl(\'member.php?act=avatar\',\'oiAvatar\',1)">(Xem t\u1ea5t c\u1ea3 \u1ea3nh \u0111\u00e3 \u0111\u0103ng)</a></div>';
    ajaxl('member.php?act=avatar&id=' + pid, 'oiAvatar', 9);
    dog('export_product_image', '<ul class="cf">' + export_img + '</ul>');
    dog('t_noidung').value = dog('oi_hidden_img').innerHTML;
    $('#oi_date_sp div:first a').addClass('bold');
    $('#oi_date_sp a').click(function () {
        $('#oi_date_sp a').removeClass('bold');
        $(this).addClass('bold')
    })
})();
thread_func.city();
thread_func.ant();
p_edit_class.a();
p_edit_class.giovang();
p_edit_class.hidden_damua();
(function (f) {
    if (f.t_img.value != '') {
        addAvatar(f.t_img.value)
    }
    if (f.t_img_hover.value != '') {
        addAvatar(f.t_img_hover.value, '_oiAvatarHover')
    }
})(document.frm_thread_add);

function func_auto_update_size() {
    var f = document.frm_thread_add;
    f.only_update_size.value = 1;
    f.submit();
    setTimeout(function () {
        f.only_update_size.value = 0
    }, 600);
    console.log('Only update size')
}

function pancel_product_size() {
    if (arr_trv_size_parent.length > 1) {
        if (arr_product_size.length == 0) {
            arr_product_size = arr_trv_size_parent;
            for (var i in arr_product_size) {
                arr_product_size[i].soluong = 0
            }
        }
    }
    var str = '', str_size_value = '', re = /^\d+$/;
    for (var i in arr_product_size) {
        if (arr_product_size[i].ten.replace(/\s/g, '') != '') {
            arr_product_size[i].ten = arr_product_size[i].ten.replace(/\'|\s/g, '').toUpperCase();
            if (re.test(arr_product_size[i].soluong) == false) {
                arr_product_size[i].soluong = 0
            }
            str += '<li data-arr-node="' + i + '" data-id="' + arr_product_size[i].ten + '" data-soluong="' + arr_product_size[i].soluong + '" title="Size: ' + arr_product_size[i].ten + '/ S\u1ed1 l\u01b0\u1ee3ng: ' + arr_product_size[i].soluong + '">' + arr_product_size[i].ten + '/ ' + arr_product_size[i].soluong + '</li>';
            str_size_value += ',{ten:\'' + arr_product_size[i].ten + '\',soluong:' + arr_product_size[i].soluong + '}'
        }
    }
    str += '<li data-id="" data-soluong=""><span class="small">Th\u00eam size m\u1edbi</span></li>';
    $('#oi_product_size').html('<ul class="cf">' + str + '</ul>');
    $('#oi_product_size li').click(function () {
        var data_soluong = $(this).attr('data-soluong') || '';
        if (data_soluong == '') {
            var tten = prompt('T\u00ean size:', '') || '', sooluong = '';
            if (tten != '') {
                sooluong = prompt('S\u1ed1 l\u01b0\u1ee3ng:', '') || '';
                if (sooluong != '') {
                    arr_product_size[arr_product_size.length] = {ten: tten, soluong: sooluong};
                    pancel_product_size();
                    func_auto_update_size()
                }
            }
        } else {
            data_soluong = parseInt(data_soluong, 10);
            if (isNaN(data_soluong)) {
                data_soluong = 0
            }
            dog('oi_edit_size_id').value = $(this).attr('data-arr-node') || '';
            dog('oi_edit_size_ten').value = $(this).attr('data-id') || '';
            dog('oi_edit_size_soluong').value = data_soluong;
            $('#oi_edit_size').hide().fadeIn();
            dog('oi_edit_size_ten').focus()
        }
    });
    $('#oi_edit_size_ten, #oi_edit_size_soluong').change(function () {
        var soluong = dog('oi_edit_size_soluong').value || 0;
        soluong = parseInt(soluong, 10);
        if (isNaN(soluong)) {
            soluong = 0
        }
        arr_product_size[dog('oi_edit_size_id').value] = {ten: dog('oi_edit_size_ten').value, soluong: soluong};
        pancel_product_size();
        dog('oi_edit_size_soluong').value = soluong
    });
    $('#oi_edit_size_xoa').click(function () {
        if (confirm('X\u00e1c nh\u1eadn x\u00f3a size s\u1ea3n ph\u1ea9m?') == true) {
            arr_product_size[dog('oi_edit_size_id').value] = {ten: '', soluong: 0};
            func_auto_update_size();
            $('#oi_edit_size').hide();
            pancel_product_size()
        }
    });
    $('#oi_edit_size_dong').click(function () {
        func_auto_update_size();
        $('#oi_edit_size').hide()
    });
    dog('oi_t_size').value = str_size_value.substr(1)
}

pancel_product_size();
(function () {
    var color_id = parseInt(dog('t_color_id').value, 10);
    if (color_id == 0) {
        color_id = pid
    }
    var uri = 'admin.php?act=thread_color_list&id=' + color_id;
    ajaxl(uri, 'oi_color_id', 9, function () {
        $('.trv-id' + pid).addClass('selected')
    })
})();
$('#click_add_color').click(function () {
    if (confirm('X\u00e1c nh\u1eadn th\u00eam m\u00e0u m\u1edbi') == true) {
        var color_id = parseInt(dog('t_color_id').value, 10);
        if (color_id == 0) {
            color_id = pid
        }
        var uri = web_link + 'temp/admin.php?act=thread_color_add&id=' + color_id;
        window.open(uri, 'target_eb_iframe')
    }
});
if (parseInt(dog('t_color_id').value, 10) != 0) {
    $('.hide-if-color-true').hide()
}
if (dog('t_noidungwysiwyg') != null) {
    $("#t_noidungwysiwyg").contents().find('img').each(function () {
        $(this).on('click', function (event) {
            var a = $(this).attr('alt') || '', n = prompt('Change alt content for image:', a);
            if (n != null) {
                $(this).attr({alt: n})
            }
        })
    })
}