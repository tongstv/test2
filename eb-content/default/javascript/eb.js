var bg_lazyload_140 = 'data:image/gif;base64,R0lGODlhEgASAKIAAK6urpaWlujo6L6+vtDQ0IyMjHx8fP///yH/C05FVFNDQVBFMi4wAwEAAAAh+QQECgAAACwAAAAAEgASAAADSHi63P4wShWMNWoMWa2yhQAVl0KQxTMYRcWQW1MRR8AQht14D8/4O4zMQFsADjgdY5VaGACwB6p4aToEJOFFqYpdcpOwePxIAAAh+QQECgAAACwDAAEADAAQAAADRXgqRvrwFBNEVMNoY5+YG7AoU0FoVlAc2XoEA2kMQaM4N6VdymbwB00Nd8CdYAYXTRYriBiN0ugA8BU6C1/sIqi5gCdsAgAh+QQECgAAACwDAAEADAAQAAADQ3i6J8HwEEPgCCbnJYr+g+IVlaBVg1EsKbBglTIICpEakfLlRzbEglDN8FAADMKDJzTJ0Agj2UdToOk+geQwxgtYIQkAIfkEBAoAAAAsAwABAA0AEAAAAz14utz+ZwRjwlBBHFGoN8WkdQWhEB0lDGAzqay5vCrUCDgOfQBDGBdPj9EJUkonksIASH0KmsNQQrHYrtgEACH5BAQKAAAALAEAAwAQAAwAAANCeKoTZmGseUR52BRBFSiEQlwFxXXHJXGCAZwT8VyH80ii/RAyFoQM30Gz6wgABtZhoEFVKCTgKICyZGYwSuMRoSQAACH5BAQKAAAALAEAAwAQAAwAAANCeLpjFmPJM8ghzhUhseuFUSxBZgBTGB2C53ALFkjvsC4fbky2kCsly8KXIcAaIwnANFOECkJFUSIITQk3XsmQVSQAADs=';
if (top == self) {
    setInterval(function () {
        var jd = '_____eb_js_session_reset_timeout';
        if (dog(jd) == null) {
            $('<div id="' + jd + '"></div>').appendTo('body')
        }
        ajaxl('guest.php?act=reset_timeout', jd, 9, function () {
            console.log('Reset timeout')
        })
    }, 10 * 60 * 1000)
}

function dog(o, s) {
    if (typeof s != 'undefined') {
        try {
            document.getElementById(o).innerHTML = s
        } catch (e) {
            console.log('name: ' + e.name + '; message: ' + e.message)
        }
    }
    return document.getElementById(o)
}

function _date(phomat, t) {
    var result = '';
    if (typeof phomat != 'string' || phomat.replace(/\s/g, '') == '') {
        return _date('D, M d,Y H:i:s')
    } else {
        var type = typeof t, js_date = function (d) {
            var arr_D = "Sunday Monday Tuesday Wednesday Thursday Friday Saturday".split(" "),
                arr_M = "January February March April May June July August September October November December".split(" ");
            for (var i = 0, str = ''; i < phomat.length; i++) {
                str += (function (a) {
                    if (typeof a == 'undefined') {
                        return ''
                    }
                    a = a.replace(/\s/g, ' ');
                    switch (a) {
                        case "d":
                            a = d.getDate();
                            break;
                        case "D":
                            a = arr_D[d.getDay()].substr(0, 3);
                            break;
                        case "l":
                            a = arr_D[d.getDay()];
                            break;
                        case "F":
                            a = arr_M[d.getMonth()];
                            break;
                        case "M":
                            a = arr_M[d.getMonth()].substr(0, 3);
                            break;
                        case "m":
                            a = d.getMonth() + 1;
                            break;
                        case "Y":
                            a = d.getFullYear();
                            break;
                        case "y":
                            a = d.getFullYear().toString().substr(2);
                            break;
                        case "a":
                            a = d.getHours();
                            if (a >= 12) {
                                a = 'am'
                            } else {
                                a = 'pm'
                            }
                            break;
                        case "A":
                            a = d.getHours();
                            if (a >= 12) {
                                a = 'AM'
                            } else {
                                a = 'PM'
                            }
                            break;
                        case "H":
                            a = d.getHours();
                            break;
                        case "h":
                            a = d.getHours();
                            if (a > 12) {
                                a -= 12
                            }
                            break;
                        case "i":
                            a = d.getMinutes();
                            break;
                        case "s":
                            a = d.getSeconds();
                            break
                    }
                    if (a != ' ' && !isNaN(a) && a < 10) {
                        a = '0' + a
                    }
                    return a
                })(phomat.substr(i, 1))
            }
            return str
        };
        if (type == 'string') {
            t = parseInt(t, 10)
        }
        if (type == 'undefined' || isNaN(t)) {
            t = new Date().getTime()
        } else {
            t = t * 1000
        }
        var nd = new Date(t);
        result = js_date(nd)
    }
    return result
}

var g_func = {
    non_mark: function (str) {
        str = str.toLowerCase();
        str = str.replace(/\u00e0|\u00e1|\u1ea1|\u1ea3|\u00e3|\u00e2|\u1ea7|\u1ea5|\u1ead|\u1ea9|\u1eab|\u0103|\u1eb1|\u1eaf|\u1eb7|\u1eb3|\u1eb5/g, "a");
        str = str.replace(/\u00e8|\u00e9|\u1eb9|\u1ebb|\u1ebd|\u00ea|\u1ec1|\u1ebf|\u1ec7|\u1ec3|\u1ec5/g, "e");
        str = str.replace(/\u00ec|\u00ed|\u1ecb|\u1ec9|\u0129/g, "i");
        str = str.replace(/\u00f2|\u00f3|\u1ecd|\u1ecf|\u00f5|\u00f4|\u1ed3|\u1ed1|\u1ed9|\u1ed5|\u1ed7|\u01a1|\u1edd|\u1edb|\u1ee3|\u1edf|\u1ee1/g, "o");
        str = str.replace(/\u00f9|\u00fa|\u1ee5|\u1ee7|\u0169|\u01b0|\u1eeb|\u1ee9|\u1ef1|\u1eed|\u1eef/g, "u");
        str = str.replace(/\u1ef3|\u00fd|\u1ef5|\u1ef7|\u1ef9/g, "y");
        str = str.replace(/\u0111/g, "d");
        return str
    }, non_mark_seo: function (str) {
        str = this.non_mark(str);
        str = str.replace(/\s/g, "-");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|$|_/g, "");
        str = str.replace(/-+-/g, "-");
        str = str.replace(/^\-+|\-+$/g, "");
        for (var i = 0; i < 5; i++) {
            str = str.replace(/--/g, '-')
        }
        str = (function (s) {
            var str = '', re = /^\w+$/, t = '';
            for (var i = 0; i < s.length; i++) {
                t = s.substr(i, 1);
                if (t == '-' || t == '+' || re.test(t) == true) {
                    str += t
                }
            }
            return str
        })(str);
        return str
    }, strip_tags: function (input, allowed) {
        if (!allowed) {
            allowed = ''
        }
        allowed = (((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('');
        var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi, cm = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
        return input.replace(cm, '').replace(tags, function ($0, $1) {
            return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
        })
    }, jconfirm: function (msn, url, id, bg) {
        if (confirm(msn + ' - Click [OK] continue') == true) {
            ajaxl(url, id, bg)
        }
    }, trim: function (str) {
        return str.replace(/^\s+|\s+$/g, "")
    }, setc: function (c_name, value, exdays) {
        if (!exdays) {
            exdays = 3600
        } else {
            if (exdays < 10) {
                exdays = exdays * (24 * 3600)
            }
        }
        var exdate = new Date();
        exdate = new Date(exdate.getFullYear(), exdate.getMonth(), exdate.getDate(), exdate.getHours(), exdate.getMinutes(), (exdate.getSeconds() + exdays));
        exdate = "; expires=" + exdate.toUTCString();
        var c_value = escape(value), domain = "";
        c_value += exdate;
        c_value += "; path=/";
        if (value != '' && web_link != '') {
            domain = web_link.replace('www.', '').split("//")[1].split('/')[0]
        }
        document.cookie = c_name + "=" + c_value;
        return true
    }, getc: function (c_name) {
        var i, x, y, ARRcookies = document.cookie.split(";");
        for (var i = 0; i < ARRcookies.length; i++) {
            x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
            y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
            x = x.replace(/^\s+|\s+$/g, "");
            if (x == c_name) {
                return unescape(y)
            }
        }
        return null
    }, delck: function (c_name) {
        this.setc(c_name, "", -1)
    }, money_format: function (str) {
        return g_func.formatCurrency(str)
    }, formatCurrency: function (num) {
        if (!num || num == '') {
            return 0
        }
        var arr = num.toString().replace(/\s/g, ''), re = /^\d+$/;
        num = '';
        for (var i = 0, c = ''; i < arr.length; i++) {
            c = arr.substr(i, 1);
            if (re.test(c) == true) {
                num += c
            }
        }
        if (num == '' || isNaN(num)) {
            return 0
        }
        num = parseInt(num, 10);
        var sign = (num == (num = Math.abs(num)));
        num = Math.floor(num * 100 + 0.50000000001);
        num = Math.floor(num / 100).toString();
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++) {
            num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3))
        }
        return (((sign) ? '' : '-') + num)
    }, opopup: function (o) {
        if (o == 'close') {
            $('#oi_popup').hide();
        } else {
            dog('oi_popup').innerHTML = '<div id="oi_popup_inner"><div align="center" style="padding:168px 0">Load...</div></div>';
            ajaxl('guest.php?act=' + o, 'oi_popup_inner', 9);
            $('#oi_popup').show();
            dog('oi_popup').style.height = $(document).height() + 'px';
            window.scroll(0, 0)
        }
    }, mb_v2: function () {
        var a = navigator.userAgent || navigator.vendor || window.opera || '';
        if (a == '') {
            return false
        }
        a = a.toLowerCase();
        if (screen.width < 600 || a.match(/mac|android|iphone|ipad/i)) {
            return true
        }
        if (g_func.mb(a) == true) {
            return true
        }
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) {
            return true;
        }
        return false
    }, mb: function (a) {
        var arr = ['midp', 'j2me', 'avantg', 'ipad', 'iphone', 'docomo', 'novarra', 'palmos', 'palmsource', '240x320', 'opwv', 'chtml', 'pda', 'windows ce', 'mmp/', 'mib/', 'symbian', 'wireless', 'nokia', 'hand', 'mobi', 'phone', 'cdm', 'up.b', 'audio', 'sie-', 'sec-', 'samsung', 'htc', 'mot-', 'mitsu', 'sagem', 'sony', 'alcatel', 'lg', 'erics', 'vx', 'nec', 'philips', 'mmm', 'xx', 'panasonic', 'sharp', 'wap', 'sch', 'rover', 'pocket', 'benq', 'java', 'pt', 'pg', 'vox', 'amoi', 'bird', 'compal', 'kg', 'voda', 'sany', 'kdd', 'dbt', 'sendo', 'sgh', 'gradi', 'jb', 'dddi', 'moto', 'opera mobi', 'opera mini', 'android'];
        for (var i = 0; i < arr.length; i++) {
            if (a.split(arr[i]).length > 1) {
                return true;
                break
            }
        }
        return false
    }, go_id: function (jd, _top, _loop) {
        if (jd && jd != '' && dog(jd) != null) {
            if (!_top) {
                _top = 0
            }
            if (!_loop) {
                _loop = 5
            }
            var to = $('#' + jd).offset().top - _top;
            $('html,body').animate({scrollTop: (to)}, 'slow', function () {
                _loop--;
                if (_loop && _loop > 1) {
                    setTimeout(function () {
                        var to = $('#' + jd).offset().top - _top, _min = $(window).scrollTop(), _max = _min + 100;
                        _min = _min - 100;
                        if (to > _min && to < _max) {
                        } else {
                            g_func.go_id(jd, _top, _loop)
                        }
                    }, 500)
                }
            })
        }
    }
};

function ajaxl(url, id, bg, callBack) {
    if (dog(id) == null) {
        alert(id + ' is NULL')
    } else {
        if (bg > 0) {
            url = 'temp/' + url
        }
        $.ajax({type: 'POST', url: url, data: ''}).done(function (msg) {
            $('#' + id).html(msg);
            if (callBack && typeof callBack == 'function') {
                callBack()
            }
        })
    }
    return false
}

var _global_js_eb = {
    c_func: {
        check_email: function (email, alert_true) {
            var r = 0;
            if (typeof email == 'undefined' || email.replace(/\s/g, '') == '') {
            } else {
                var check_e = email.split('@');
                if (check_e.length == 2) {
                    if (check_e[1].split('.').length > 1) {
                        r = 1
                    }
                }
                if (r == 0) {
                    var re = /^\w+([\-\.]?\w+)*@\w+(\.\w+){1,3}$/;
                    if (re.test(email) == true) {
                        r = 1
                    }
                }
            }
            if (r == 0) {
                if (typeof alert_true != 'undefined' && alert_true == 1) {
                    alert('Email kh\u00f4ng \u0111\u00fang \u0111\u1ecbnh d\u1ea1ng')
                }
                return false
            }
            return true
        }, check_forgot_password: function () {
            with (document.frm_forgot_password) {
                if (this.check_email(t_email.value, 1) == false) {
                    t_email.focus();
                    return false
                }
            }
            return true
        },
        c_qregister: function () {
            with (document.frm_dk_nhantin) {
                if (this.check_email(t_email.value, 1) == false) {
                    t_email.focus();
                    return false
                }
            }
            return true
        }, check_login: function () {
            with (document.frm_dangnhap) {
                if (this.check_email(t_email.value, 1) == false) {
                    t_email.focus();
                    return false
                }
                if (t_matkhau.value.length < 6) {
                    alert('Nh\u1eadp m\u1eadt kh\u1ea9u c\u1ee7a b\u1ea1n');
                    t_matkhau.focus();
                    return false
                }
            }
            return true
        }, register: function () {
            with (document.frm_register) {
                if (this.check_email(t_email.value, 1) == false) {
                    t_email.focus();
                    return false
                }
                if (t_matkhau.value.length < 6) {
                    alert('Nh\u1eadp m\u1eadt kh\u1ea9u c\u1ee7a b\u1ea1n');
                    t_matkhau.focus();
                    return false
                }
                if (t_matkhau.value != t_matkhau_r.value) {
                    alert('M\u1eadt kh\u1ea9u x\u00e1c nh\u1eadn kh\u00f4ng ch\u00ednh x\u00e1c');
                    t_matkhau_r.focus();
                    return false
                }
                if (t_captcha.value.length < 3) {
                    alert('Nh\u1eadp m\u00e3 x\u00e1c nh\u1eadn \u0111\u0103ng k\u00fd');
                    t_captcha.focus();
                    return false
                }
            }
            return true
        }
    }, i_func: {
        top: function () {
            var arr_top_menu = [{lnk: '', ten: 'Trang ch\u1ee7'}, {
                lnk: 'ganday',
                ten: 'Gi\u00e1 t\u1ed1t g\u1ea7n \u0111\u00e2y'
            }, {lnk: 'thuonghieu', ten: 'Th\u01b0\u01a1ng hi\u1ec7u'}, {lnk: 'giovang', ten: 'Gi\u1edd v\u00e0ng'}];
            var str = '', sl = '', tg = '', tit = '';
            for (var i = 0; i < arr_top_menu.length; i++) {
                if (arr_top_menu[i].ten == '') {
                    str += '<li>&nbsp;</li>'
                } else {
                    sl = '';
                    if (arr_top_menu[i].lnk == act) {
                        sl = 'selected'
                    }
                    if (arr_top_menu[i].lnk == '') {
                        arr_top_menu[i].lnk = web_link
                    } else {
                        tit = arr_top_menu[i].ten;
                        if (arr_top_menu[i].lnk == 'giovang') {
                            arr_top_menu[i].ten = '&nbsp;';
                            sl += ' gio-vang'
                        }
                        tg = '';
                        if (arr_top_menu[i].lnk.split(location.protocol+'//').length > 1) {
                            tg = ' target="_blank"'
                        } else {
                            arr_top_menu[i].lnk = 'actions/' + arr_top_menu[i].lnk
                        }
                    }
                    str += '<li class="' + sl + '"><a title="' + tit + '" href="' + arr_top_menu[i].lnk + '"' + tg + '>' + arr_top_menu[i].ten + '</a></li>';
                }
            }
            dog('oi_t_menu').innerHTML = '<ul class="cf">' + str + '</ul>'
        }, tim_theo_gia: function (id, str_lnk) {
            var arr_gia = [{v: '<300000', t: 'D\u01b0\u1edbi 300,000\u0111'}, {
                v: '300000-1000000',
                t: '300,000\u0111 ~ 1,000,000\u0111'
            }, {v: '1000000-2000000', t: '1,000,000\u0111 ~ 2,000,000\u0111'}, {
                v: '2000000-3000000',
                t: '2,000,000\u0111 ~ 3,000,000\u0111'
            }, {v: '3000000-5000000', t: '3,000,000\u0111 ~ 5,000,000\u0111'}, {
                v: '5000000>',
                t: 'Tr\u00ean 5,000,000\u0111'
            }];
            if (typeof str_price == 'undefined') str_price = ''; else str_price = str_price.replace(/\s/g, '').split('/')[0].split('&')[0];
            if (typeof str_lnk == 'undefined') {
                if (typeof strLinkPager != 'undefined') str_lnk = strLinkPager; else str_lnk = ''
            }
            for (var i = 0, str = '', lnk = '', sl = ''; i < arr_gia.length; i++) {
                sl = '';
                if (arr_gia[i].v == str_price) sl = ' class="selected"';
                lnk = str_lnk;
                lnk += '&price=' + arr_gia[i].v;
                str += '<div><a href="' + lnk + '"' + sl + '>' + arr_gia[i].t + '</a></div>'
            }
            if (typeof id != 'undefined' && id != '' && dog(id) != null) {
                str = '<div class="price-for-thread">' + str + '</div>';
                dog(id, str)
            }
            return str
        }, nav: function () {
            var str = '', sl = '', str_menu_uutien = '', str_submenu = '', node = 0, arr_node = [], c_link = '';
            for (var x in site_group) {
                sl = '';
                if (site_group[x].id == cid) {
                    sl = ' class="selected"'
                }
                str_submenu = (function (arr_bnt) {
                    var str = '', sl = '';
                    if (arr_bnt.length > 0) {
                        str += '<div><a href="' + _global_js_eb._c_link(site_group[x].id, site_group[x].seo) + '" class="bold upper">' + site_group[x].ten + '</a></div>';
                        for (var i = 0; i < arr_bnt.length; i++) {
                            sl = '';
                            if (arr_bnt[i].id == sid) {
                                sl = ' class="selected"'
                            }
                            str += '<div' + sl + '><a href="' + _global_js_eb._c_link(arr_bnt[i].id, arr_bnt[i].seo, 's') + '">' + arr_bnt[i].ten + '</a></div>';
                        }
                        str = '<div class="sub-menu">' + str + '</div>'
                    }
                    return str
                })(site_group[x].bnt);
                str += '<li><h2' + sl + '><a href="' + _global_js_eb._c_link(site_group[x].id, site_group[x].seo) + '" class="fa">' + site_group[x].ten + '</a></h2>' + str_submenu + '</li>'
            }
            dog('nav', '<ul class="cf">' + str + '</ul>');
            $('#nav .sub-menu').css({'min-height': (site_group.length * 35) + 'px'})
        }, city: function (obj) {
        }, load_mem: function () {
            if (isLogin > 0) {
                dog('oi_member_func', '<a href="u/" class="bold">T\u00e0i kho\u1ea3n</a> <a onclick="return confirm(\'Tho\u00e1t kh\u1ecfi h\u1ec7 th\u1ed1ng - [OK] \u0111\u1ec3 ti\u1ebfp t\u1ee5c\');" href="logout.html">Tho\u00e1t</a>')
            }
        }, rs: function () {
        }, to_register_mail: function (obj) {
        }, cpl_register_email: function (m, okey) {
        }, to_top: function () {
            $('html,body').animate({scrollTop: 0}, 'slow')
        }
    }, cart_func: {
        a: function () {
            if (dog('oi_re_link') != null) {
                dog('oi_re_link').value = window.location.href
            }
            if (arr_cart_value.length > 0) {
                $('#oi_cart').fadeIn();
                _global_js_eb.cart_func.tongtien()
            } else {
                $('#cart_null').fadeIn()
            }
        }, tongtien: function () {
            var show_tong_tien = 0, tong_tien_line = 0, tong_san_pham = 0;
            for (var i = 0; i < arr_cart_value.length; i++) {
                if (arr_cart_value[i] != null) {
                    tong_tien_line = parseInt(arr_cart_value[i].giaban.replace(/,/g, ''), 10);
                    tong_tien_line *= arr_cart_value[i].soluong;
                    show_tong_tien += tong_tien_line;
                    dog('cong' + arr_cart_value[i].id).innerHTML = g_func.formatCurrency(tong_tien_line) + '\u0111';
                    tong_san_pham += parseInt(arr_cart_value[i].soluong, 10)
                }
            }
            dog('cart_sl').innerHTML = g_func.formatCurrency(show_tong_tien);
            dog('hidden_amount').value = show_tong_tien;
            dog('show_tong_sp').innerHTML = tong_san_pham
        }, only_number: function (mon) {
            if (!mon || mon == '') {
                return 0
            }
            var re = /^\d+$/;
            mon = mon.toString();
            mon = mon.split('');
            var new_mon = '';
            for (var moni = 0; moni < mon.length; moni++) {
                if (re.test(mon[moni]) == true) {
                    new_mon += mon[moni]
                }
            }
            new_mon = parseInt(new_mon, 10);
            if (isNaN(new_mon)) {
                return 0
            }
            return new_mon
        }, pro_add: function (pro_id, other_option) {
            if (!pro_id) {
                pro_id = pid
            }
            pro_id = parseInt(pro_id, 10);
            if (pro_id > 0) {
                var uri = web_link + 'temp/guest.php?act=cart_add' + '&id=' + pro_id;
                if (typeof other_option == 'object') {
                    for (var x in other_option) {
                        if (typeof other_option[x] != 'undefined') {
                            uri += '&' + x + '=' + other_option[x]
                        }
                    }
                }
                $.ajax({type: 'POST', url: uri, data: ''}).done(function (msg) {
                    var d = new Date();
                    window.location = web_link + 'actions/cart&nse=' + d.getFullYear().toString() + (d.getMonth() + 1).toString() + d.getDate().toString();
                })
            }
        }, soluong: function (pro_id, new_so_luong) {
            if (pro_id) {
                pro_id = parseInt(pro_id, 10);
                if (pro_id > 0) {
                    new_so_luong = parseInt(new_so_luong, 10);
                    new_so_luong = _global_js_eb.cart_func.only_number(new_so_luong);
                    ajaxl('guest.php?act=cart_sl&id=' + pro_id + '&sl=' + new_so_luong, 'cart_process', 1);
                    for (var i = 0; i < arr_cart_value.length; i++) {
                        if (arr_cart_value[i] != null && arr_cart_value[i].id == pro_id) {
                            arr_cart_value[i].soluong = new_so_luong
                        }
                    }
                    _global_js_eb.cart_func.tongtien()
                }
            }
        }, xoa: function (pro_id, hidden_id) {
            if (pro_id) {
                pro_id = parseInt(pro_id, 10);
                if (pro_id > 0) {
                    if (!hidden_id) {
                        hidden_id = ''
                    }
                    if (hidden_id != '' && confirm('X\u00e1c nh\u1eadn - X\u00f3a SP kh\u1ecfi gi\u1ecf h\u00e0ng') == true) {
                        $('#' + hidden_id).fadeOut();
                        ajaxl('guest.php?act=cart_del&id=' + pro_id, 'cart_process', 1);
                        for (var i = 0; i < arr_cart_value.length; i++) {
                            if (arr_cart_value[i] != null && arr_cart_value[i].id == pro_id) {
                                arr_cart_value[i] = null;
                            }
                        }
                        _global_js_eb.cart_func.tongtien();
                        count_cart--;
                        if (count_cart > 0) {
                        } else {
                            $('#cart_null').fadeIn();
                            $('#oi_cart').hide()
                        }
                    }
                }
            }
        }, cart_check_money: function () {
            if (dog('hidden_amount').value > 0) {
                return true
            } else {
                alert('Vui l\u00f2ng nh\u1eadp s\u1ed1 l\u01b0\u1ee3ng s\u1ea3n ph\u1ea9m b\u1ea1n mu\u1ed1n mua');
                return false
            }
        }, check_cart: function () {
            var f = document.frm_cart;
            if (f.t_dienthoai.value.length < 10) {
                alert('Vui l\u00f2ng nh\u1eadp \u00edt nh\u1ea5t m\u1ed9t s\u1ed1 \u0111i\u1ec7n tho\u1ea1i b\u1ea1n \u0111ang s\u1eed d\u1ee5ng');
                f.t_dienthoai.focus();
                return false
            }
            if (_global_js_eb.c_func.check_email(f.t_email.value) == false) {
                var new_email = g_func.non_mark_seo(f.t_dienthoai.value);
                try {
                    new_email += '@' + web_link.split('//')[1].split('/')[0].replace('www.', '')
                } catch (e) {
                }
                ;f.t_email.value = new_email
            }
            if (f.t_diachi.value.replace(/\s/g, '') == '') {
                f.t_diachi.value = f.t_dienthoai.value
            }
            _global_js_eb.cart_agent();
            $('#rME').css({opacity: 0.2});
            f.sb_submit_cart.disabled = true;
            return true
        }, c: function () {
        }, spayment: function (o) {
        }, payment: function (o) {
        }, httt: function (o) {
        }, coml: function (m, hd_id, request_url) {
            document.frm_cart.sb_submit_cart.disabled = false;
            if (hd_id > 0) {
                if (request_url && request_url != '') {
                    dog('target_eb_iframe').src = 'about:blank';
                    window.location = request_url
                } else {
                    window.location = web_link + 'actions/hoan-tat'
                }
            } else {
                if (!m || m == '') {
                    m = 'L\u1ed7i ch\u01b0a x\u00e1c \u0111\u1ecbnh'
                }
                alert(m);
                window.location = window.location.href
            }
        }
    }, mem_func: {
        left_menu: function () {
            var arr_left_menu = [{
                'ten': 'T\u00e0i kho\u1ea3n - \u0110\u01a1n h\u00e0ng',
                'menu': [{
                    'ten': 'Th\u00f4ng tin t\u00e0i kho\u1ea3n',
                    'lnk': 'canhan'
                }, {'ten': '\u0110\u01a1n h\u00e0ng c\u1ee7a t\u00f4i', 'lnk': 'invoice'}]
            }];
            var str = '', sl = '';
            for (var x in arr_left_menu) {
                str += '<div class="member-menu">' + '<h4>' + arr_left_menu[x].ten + '</h4>' + (function (arr_menu) {
                    var str = '', sl = '';
                    for (var i = 0; i < arr_menu.length; i++) {
                        if (arr_menu[i].lnk == '') {
                            arr_menu[i].lnk = 'javascript://'
                        } else {
                            if (arr_menu[i].lnk == act) {
                                sl = ' class="selected"'
                            } else {
                                sl = ''
                            }
                            arr_menu[i].lnk = 'u/' + arr_menu[i].lnk
                        }
                        str += '<div><a href="' + arr_menu[i].lnk + '"' + sl + '>' + arr_menu[i].ten + '</a></div>'
                    }
                    return str
                })(arr_left_menu[x].menu) + '</div>'
            }
            dog('oi_left_menu').innerHTML = str
        }
    },
    product_func: {
        info: function () {
            var gia = product_js['gia'], gm = product_js['gm'], pro_status = product_js['status'],
                giovang = product_js['giovang'], _giovang = product_js['_giovang'], hdb = product_js['hdb'], pt = 0,
                n = 0, du = 0, mua = product_js['mua'], mmua = product_js['mmua'], bk = product_js['bk'],
                p_ten = product_js['tieude'];
            if (gia > gm) {
                pt = 100 - parseInt(gm * 100 / gia, 10);
                dog('oi_giamgia').innerHTML = pt
            }
            if (pt <= 0 || isNaN(pt) || gia <= gm) {
                $('.hide-if-gia-zero').hide()
            }
            if (pro_status == 0) {
                $('.hide-if-chayhang').hide();
                dog('product_time_alert').innerHTML = '';
                dog('time_line').innerHTML = '<em>S\u1ea3n ph\u1ea9m \u0111\u00e3 ng\u1eebng b\u00e1n</em>'
            } else {
                if (mua >= mmua) {
                    $('.hide-if-chayhang').hide();
                    $('.show-if-chay-hang').show().removeClass('d-none')
                } else {
                    if (giovang != 0) {
                        $('.hide-if-chayhang').hide();
                        $('#oi_gio_vang').show();
                        dog('oi_gio_vang_left').innerHTML = _giovang;
                        dog('product_time_alert').innerHTML = 'B\u1ea1n c\u00f3 th\u1ec3 mua sau';
                        this.gv()
                    } else {
                        if (hdb > 86400) {
                            du = hdb % 86400;
                            n = (hdb - du) / 86400;
                            if (n > 0) {
                                dog('day_line').innerHTML = n + ' ng\u00e0y '
                            }
                        } else {
                            du = hdb
                        }
                        _global_js_eb.product_func.ltime(n, du)
                    }
                }
            }
            if (mmua - mua > 0) {
                dog('oi_con_phieu').innerHTML = mmua - mua
            } else {
                dog('oi_con_phieu').innerHTML = 0
            }
            dog('oi_max_mua').innerHTML = mmua;
            dog('oi_da_mua').innerHTML = mua;
            pt = parseInt(mua * 100 / mmua, 10);
            if (pt > 100) {
                pt = 100
            }
            dog('oi_mua_max').style.width = pt.toString() + '%'
        }, ltime: function (n, t) {
            var h = 0, p = 0, g = 0, du = 0;
            du = t % 3600;
            h = (t - du) / 3600;
            g = du % 60;
            p = (du - g) / 60;
            if (g >= 0) {
                dog('time_line').innerHTML = h + ':' + p + '"' + g
            } else {
                n--;
                if (n > 0) {
                    dog('day_line').innerHTML = n + ' ng\u00e0y '
                } else {
                    dog('day_line').innerHTML = ''
                }
                if (g > 0 || p > 0 || h > 0 || n > 0) {
                    dog('time_line').innerHTML = '23:59"59';
                    t = 86400
                } else {
                    return
                }
            }
            t--;
            setTimeout(function () {
                _global_js_eb.product_func.ltime(n, t)
            }, 1000)
        }, gv: function () {
            if (product_js['giovang'] > 1) {
                var h = 0, p = 0, g = 0, du = 0;
                du = product_js['giovang'] % 3600;
                h = (product_js['giovang'] - du) / 3600;
                g = du % 60;
                p = (du - g) / 60;
                dog('time_line').innerHTML = h + ' gi\u1edd ' + p + ':' + g;
                setTimeout(function () {
                    _global_js_eb.product_func.gv()
                }, 1000)
            } else {
                dog('time_line').innerHTML = '\u0110\u00e3 b\u1eaft \u0111\u1ea7u b\u00e1n';
                dog('product_time_alert').innerHTML = 'S\u1ea3n ph\u1ea9m si\u00eau gi\u1ea3m gi\u00e1';
                $('.hide-if-chayhang').show();
                $('#oi_gio_vang').hide()
            }
            product_js['giovang']--
        }, cn: function (o) {
        }, bk: function () {
        }, sh: function () {
        }, toCart: function (product_id) {
            if (!product_id) {
                product_id = pid
            }
            if (product_id > 0) {
                window.location = web_link + 'actions/cart&id=' + product_id
            } else {
                alert('Kh\u00f4ng x\u00e1c \u0111\u1ecbnh \u0111\u01b0\u1ee3c s\u1ea3n ph\u1ea9m')
            }
        }, alnk: function () {
            var arr_a = dog('thread_content_pack').getElementsByTagName('a'), nlnk = '';
            for (var i = 0; i < arr_a.length; i++) {
                if (!arr_a[i].href || arr_a[i].href == '') {
                    nlnk = arr_a[i].innerHTML;
                    if (nlnk != '') {
                        if (nlnk.indexOf(location.protocol+"//") == -1) {
                            nlnk = location.protocol+'//' + nlnk
                        }
                        arr_a[i].href = nlnk
                    }
                }
                arr_a[i].target = '_blank'
            }
        }
    },
    pl_func: {
        ng: function () {
            var n = 0, h = 0, du = 0;
            for (var x in time_ngay) {
                du = time_ngay[x] % 86400;
                n = (time_ngay[x] - du) / 86400;
                if (product_sell[x].giovang != 0) {
                } else {
                    dog('d_line' + x).innerHTML = n + ' ng\u00e0y '
                }
                time_ngay[x] = time_ngay[x] - du;
                time_gio[x] = du
            }
        }, gi: function () {
            var h = 0, p = 0, g = 0, du = 0;
            for (var x in time_gio) {
                if (product_sell[x].giovang != 0) {
                    if (time_gio[x] != null) {
                        if (product_sell[x].giovang > 1) {
                            du = product_sell[x].giovang % 3600;
                            h = (product_sell[x].giovang - du) / 3600;
                            g = du % 60;
                            p = (du - g) / 60;
                            dog(product_sell[x].alert_id).innerHTML = 'B\u1eaft \u0111\u1ea7u b\u00e1n sau';
                            dog('h_line' + x).innerHTML = 'B\u1eaft \u0111\u1ea7u b\u00e1n sau: ' + h + ':' + p + '"' + g;
                            product_sell[x].giovang--
                        } else {
                            dog(product_sell[x].alert_id).innerHTML = 'S\u1ea3n ph\u1ea9m si\u00eau gi\u1ea3m gi\u00e1';
                            dog('h_line' + x).innerHTML = '\u0110\u00e3 b\u1eaft \u0111\u1ea7u b\u00e1n';
                            time_gio[x] = null
                        }
                    }
                } else {
                    du = time_gio[x] % 3600;
                    h = (time_gio[x] - du) / 3600;
                    g = du % 60;
                    p = (du - g) / 60;
                    if (g >= 0) {
                        dog('h_line' + x).innerHTML = h + ':' + p + '"' + g
                    } else if (time_ngay[x]) {
                        var nn = time_ngay[x] / 86400;
                        nn--;
                        if (nn > 0) {
                            dog('d_line' + x).innerHTML = nn + ' ng\u00e0y ';
                            time_gio[x] = time_ngay[x] - 86400
                        } else {
                            dog('d_line' + x).innerHTML = '';
                            time_gio[x] = time_ngay[x]
                        }
                        dog('h_line' + x).innerHTML = '23:59:"59'
                    } else {
                        dog('d_line' + x).innerHTML = ''
                    }
                    time_gio[x]--
                }
                if (product_sell[x].mua >= product_sell[x].mmua) {
                    dog('d_line' + x).innerHTML = '&nbsp;';
                    dog('h_line' + x).innerHTML = '&nbsp;';
                    time_gio[x] = null
                }
            }
            setTimeout(function () {
                _global_js_eb.pl_func.gi()
            }, 1000)
        }, gia: function () {
            var gia = 0, gm = 0, pt = 0;
            for (var x in product_sell) {
                if (product_sell[x].giovang != 0) {
                    dog(product_sell[x].gv_id).innerHTML = 'Th\u1eddi gian b\u1eaft \u0111\u1ea7u ' + product_sell[x]._giovang
                }
            }
        }, st: function () {
        }
    }, lienhe_func: {
        ch: function () {
            with (document.frm_contact) {
                if (_global_js_eb.c_func.check_email(t_email.value, 1) == false) {
                    t_email.focus();
                    return false
                }
                if (t_noidung.value.length < 20) {
                    alert('N\u1ed9i dung li\u00ean h\u1ec7 t\u1ed1i thi\u1ec3u ph\u1ea3i c\u00f3 20 k\u00fd t\u1ef1');
                    t_noidung.focus();
                    return false
                }
            }
            return true
        }, ck: function () {
            dog('t_email').focus();
            if (window.location.href.indexOf("ck=") != -1) {
                var str = "S\u1ed1 t\u00e0i kho\u1ea3n: \nNg\u00e2n h\u00e0ng: ";
                dog('t_noidung').value = str
            }
        }
    },
    ads: {
        bottom: function () {
            if (qc_day.length > 0) {
                var str = '', li_width = 100 / qc_day.length;
                for (var i = 0; i < qc_day.length; i++) {
                    if (qc_day[i].lnk.indexOf(location.protocol+"//") == -1) {
                        qc_day[i].lnk = location.protocol+'//' + qc_day[i].lnk
                    }
                    str += '<li style="width:' + li_width + '%"><a href="' + qc_day[i].lnk + '" target="_blank"><img src="' + qc_day[i].img + '" /></a></li>'
                }
                dog('oi_ads_bottom').innerHTML = '<ul class="clearfix">' + str + '</ul>';
                $('.lien-ket-site').removeClass('d-none').show()
            }
        }
    }, ads2ben: {
        l2b: function () {
            var str = '', str1 = '', str2 = '', x = 1;
            for (var i = 0; i < qc_2ben.length; i++) {
                if (qc_2ben[i].lnk.indexOf(location.protocol+"//") == -1) {
                    qc_2ben[i].lnk = location.protocol+'//' + qc_2ben[i].lnk
                }
                str = '<a href="' + qc_2ben[i].lnk + '" target="_blank"><img src="' + qc_2ben[i].img + '" /></a>';
                if (x % 2 == 0) {
                    str2 += str
                } else {
                    str1 += str
                }
                x++
            }
            dog('qc_2ben_left').innerHTML = str1;
            dog('qc_2ben_right').innerHTML = str2
        }, l2h: function (o) {
            o += 34;
            dog('qc_2ben_left').style.top = o + 'px';
            dog('qc_2ben_right').style.top = o + 'px';
            o += 34;
            $("#qc_2ben_left").stop().animate({top: o + "px"}, 600);
            $("#qc_2ben_right").stop().animate({top: o + "px"}, 600)
        }
    },
    _trafic: function (o, return_id, _time_out) {
        (function () {
            if (!o || o == '' || dog(return_id) == null) {
                return false
            }
            if (!_time_out || _time_out <= 0) {
                _time_out = 2000
            }
            setTimeout(function () {
                dog(return_id).src = o
            }, _time_out)
        })()
    }, _time_line: {
        show: function (time_lnk, time_select, run_function) {
            if (!time_lnk || time_lnk == '') {
                document.write('<h3>_time_line not data: link</h3>');
                return false
            }
            time_lnk += '&d=';
            if (!time_select) {
                time_select = ''
            }
            var arr_quick_connect = {
                today: 'H\u00f4m nay',
                thismonth: 'Th\u00e1ng n\u00e0y',
                yesterday: 'H\u00f4m qua',
                lastmonth: 'Th\u00e1ng tr\u01b0\u1edbc',
                last7days: '7 ng\u00e0y qua',
                last30days: '30 ng\u00e0y qua',
                all: 'To\u00e0n b\u1ed9 th\u1eddi gian'
            }, str = '', click_click_lick_lick = false, _get = function (p) {
                var wl = window.location.href, a = wl.split(p + '='), s = '';
                if (a.length > 1) s = a[1].split('&')[0];
                return s
            }, __hide_popup_day_select = function () {
                setTimeout(function () {
                    click_click_lick_lick = false
                }, 200);
                $('#oi_quick_connect .connect-padding').hide()
            }, betwwen1 = _get('d1'), betwwen2 = _get('d2');
            for (var x in arr_quick_connect) {
                if (x == time_select && dog('oi_time_line_name') != null) {
                    dog('oi_time_line_name').value = arr_quick_connect[x]
                }
                str += '<li><a href="' + time_lnk + x + '">' + arr_quick_connect[x] + '</a></li>'
            }
            if (betwwen1 != '' && betwwen2 != '') dog('oi_time_line_name').value = betwwen1 + ' - ' + betwwen2;
            str = '<ul class="clearfix">' + str + '</ul>';
            str = '<div class="cf"><div class="bold lf f50">Ph\u1ea1m vi ng\u00e0y</div><div title="\u0110\u00f3ng" align="right" class="lf f50 cur click-how-to-hide-day-selected">\u0110\u00f3ng [x]</div></div><div class="ad-pham-vi-ngay">' + '<input type="text" value="' + betwwen1 + '" id="oi_input_value_tu_ngay" maxlength="10" />' + '<input type="text" value="' + betwwen2 + '" id="oi_input_value_den_ngay" maxlength="10" />' + '<input type="button" value="Xem" id="oi_click_get_show_by_day" />' + '</div>' + str;
            str = '<div class="connect-padding"><div class="cf"><div class="lf" style="width:20%;"><div class="hode-hide-popup-show-day" style="height:150px;margin-right:30px;">&nbsp;</div></div><div class="lf" style="width:80%">' + str + '</div></div><div class="hode-hide-popup-show-day" style="height:30px;margin-top:20px;">&nbsp;</div></div>';
            dog('oi_quick_connect').innerHTML += str;
            if (run_function && typeof run_function == 'function') run_function(arr_quick_connect);
            $('.hode-hide-popup-show-day').hover(function () {
                __hide_popup_day_select()
            });
            $('.click-how-to-hide-day-selected').click(function () {
                __hide_popup_day_select()
            });
            $('#oi_quick_connect').hover(function () {
                if (click_click_lick_lick == false) {
                    click_click_lick_lick = true;
                    $('#oi_quick_connect .connect-padding').show()
                }
            });
            _global_js_eb.select_date('#oi_input_value_tu_ngay', {numberOfMonths: 3, defaultDate: '-2m'});
            _global_js_eb.select_date('#oi_input_value_den_ngay');
            $('#oi_click_get_show_by_day').click(function () {
                var a = $('#oi_input_value_tu_ngay').val(), b = $('#oi_input_value_den_ngay').val();
                if (a != '' && b != '') {
                    window.location = web_link + time_lnk + 'between&d1=' + a + '&d2=' + b
                } else {
                    alert('Ch\u1ecdn ng\u00e0y th\u00e1ng c\u1ea7n xem')
                }
            })
        }, count_view_ads: function (o) {
            var arr_count_view = document.getElementsByName('check_count_view');
            if (o) {
                var change_check = o.checked;
                for (var i = 0; i < arr_count_view.length; i++) {
                    arr_count_view[i].checked = change_check
                }
                this.count_view_ads()
            } else {
                var str_count = 0;
                for (var i = 0; i < arr_count_view.length; i++) {
                    if (arr_count_view[i].checked == true) {
                        str_count += parseInt(arr_count_view[i].value, 10);
                    }
                }
                dog('js_count_view').innerHTML = str_count;
                if (dog('count_view_top') != null) {
                    dog('count_view_top').innerHTML = '(' + str_count + ')'
                }
            }
        }
    }, searchFrm: {
        bl: function () {
            if (dog('search_keys').value == '') {
                dog('search_keys').value = dog('search_keys').title
            }
        }, ch: function () {
            var f = document.frm_search, n = '';
            if (f.q.value.replace(/\s/g, '').length < 2 || f.q.value == f.q.title) {
                alert('Vui l\u00f2ng nh\u1eadp t\u1eeb kh\u00f3a t\u00ecm ki\u1ebfm');
                f.q.focus();
                return false
            }
            n = g_func.non_mark_seo(f.q.value);
            f.q.value = n.replace(/-/g, ' ');
            return true
        }, s: function (e) {
            var v = dog('search_keys').value;
            if (v.length > 3 && e == 32) {
                ajaxl('guest.php?act=search&key=' + v.replace(/\s/gi, '+'), 'oiSearchAjax', 9)
            }
        }
    }, img_to_thumb: function (str_img, dir_thumb) {
        if (!dir_thumb) {
            dir_thumb = '228/'
        }
        var split_img = '';
        if (str_img.split('upload.').length > 1) {
            split_img = str_img.split('/');
            split_img = split_img[split_img.length - 1];
            return str_img.replace(split_img, '') + dir_thumb + split_img
        } else {
            return str_img
        }
    }, auto_margin: function () {
        if (pid == 0 && cid > 0 && dog('responsive-thread-list') != null) {
            var cot_tong = $('#responsive-thread-list').width(), cot_trai = 250,
                cot_phai = cot_phai = 100 - parseInt(cot_trai * 100 / cot_tong, 10);
            cot_trai = 100 - cot_phai;
            $('.responsive-thread-left').css({width: cot_trai + '%'});
            $('.responsive-thread-right').css({width: cot_phai + '%'})
        }
        $('.thread-list').each(function () {
            $('.thread-list-avt, .thread-list-avt img', this).css({height: $('.thread-list-avt', this).width() + 'px'})
        })
    }, money_format_keyup: function () {
        $('.change-tranto-money-format').off('keyup').off('change').keyup(function (e) {
            var k = e.keyCode, a = $(this).val() || '';
            if ((k >= 48 && k <= 57) || (k >= 96 && k <= 105) || k == 8 || k == 46) {
                a = g_func.formatCurrency(a);
                if (a == 0 || a == '0') {
                    $(this).val(a).select()
                } else {
                    $(this).val(a).focus()
                }
            }
        }).change(function () {
            $(this).val(g_func.formatCurrency($(this).val()))
        })
    }, select_date: function (id, op) {
        if (typeof op == 'undefined') {
            op = {}
        }
        if (typeof op['dateFormat'] == 'undefined') {
            op['dateFormat'] = 'yy/mm/dd'
        }
        $.datepicker.regional['de'] = {
            monthNames: ['Th\u00e1ng 1', 'Th\u00e1ng 2', 'Th\u00e1ng 3', 'Th\u00e1ng 4', 'Th\u00e1ng 5', 'Th\u00e1ng 6', 'Th\u00e1ng 7', 'Th\u00e1ng 8', 'Th\u00e1ng 9', 'Th\u00e1ng 10', 'Th\u00e1ng 11', 'Th\u00e1ng 12'],
            monthNamesShort: ['Jan', 'Feb', 'M&auml;r', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
            dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
            dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
            dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7']
        };
        $.datepicker.setDefaults($.datepicker.regional['de']);
        $(id).datepicker(op)
    }, fix_url_id: function () {
        if (cid > 0) {
            var uri = window.location.href.split('/'), last_url = uri[uri.length - 1], url_fisrt = '', url_last = '',
                new_url = '';
            if (last_url.replace(/\s/g, '') == '') {
                last_url = uri[uri.length - 2]
            }
            last_url = last_url.split('.htm')[0];
            url_fisrt = last_url.replace(last_url.split('-')[0], '').substr(1);
            url_last = last_url.split('-');
            url_last = last_url.replace(url_last[url_last.length - 1], '');
            url_last = url_last.substr(0, url_last.length - 1);
            if (pid > 0) {
                if (typeof fix_url_pid != 'undefined' && fix_url_pid != '') {
                    var split_url = fix_url_pid.split('/');
                    if (split_url[split_url.length - 1].replace(/\s/g, '') == '') {
                        split_url = split_url[split_url.length - 2]
                    } else {
                        split_url = split_url[split_url.length - 1]
                    }
                    split_url = split_url.split('.htm')[0];
                    if (last_url != split_url) {
                        new_url = fix_url_pid
                    }
                }
            } else if (fid > 0) {
                for (var i = 0; i < site_group.length; i++) {
                    if (new_url == '') {
                        (function (arr) {
                            for (var i = 0; i < arr.length; i++) {
                                (function (arr) {
                                    for (var i = 0; i < arr.length; i++) {
                                        if (arr[i].id == fid) {
                                            if (last_url == arr[i].seo || url_fisrt == arr[i].seo || url_last == arr[i].seo) {
                                            } else {
                                                new_url = _global_js_eb._c_link(fid, arr[i].seo, 'f')
                                            }
                                            break
                                        }
                                    }
                                })(arr[i].cnt)
                            }
                        })(site_group[i].bnt)
                    }
                }
            } else if (sid > 0) {
                for (var i = 0; i < site_group.length; i++) {
                    if (new_url == '') {
                        (function (arr) {
                            for (var i = 0; i < arr.length; i++) {
                                if (arr[i].id == sid) {
                                    if (last_url == arr[i].seo || url_fisrt == arr[i].seo || url_last == arr[i].seo) {
                                    } else {
                                        new_url = _global_js_eb._c_link(sid, arr[i].seo, 's')
                                    }
                                    break
                                }
                            }
                        })(site_group[i].bnt);
                    }
                }
            } else {
                for (var i = 0; i < site_group.length; i++) {
                    if (site_group[i].id == cid) {
                        if (last_url == site_group[i].seo || url_fisrt == site_group[i].seo || url_last == site_group[i].seo) {
                        } else {
                            new_url = _global_js_eb._c_link(cid, site_group[i].seo)
                        }
                        break
                    }
                }
            }
            if (new_url != '') {
                if (window.location.href.split('/actions/thread&').length > 1) {
                    console.log('Part page')
                } else {
                    console.log(new_url);
                    window.history.pushState("", '', new_url)
                }
            }
        }
    }, cart_agent: function () {
        if (dog('cart_user_agent') != null) {
            (function () {
                var pad = function (number, length) {
                    var str = "" + number;
                    while (str.length < length) {
                        str = '0' + str
                    }
                    return str
                }, offset = new Date().getTimezoneOffset(), str = '';
                offset = ((offset < 0 ? '+' : '-') + pad(parseInt(Math.abs(offset / 60)), 2) + pad(Math.abs(offset % 60), 2));
                var arr = {
                    hd_url: window.location.href,
                    hd_title: (function (str) {
                        return str
                    })(document.title || ''),
                    hd_timezone: offset,
                    hd_lang: (function (str) {
                        return str
                    })(navigator.userLanguage || navigator.language || ''),
                    hd_usertime: (function () {
                        var t = new Date().getTime();
                        t = parseInt(t / 1000, 10);
                        return t
                    })(),
                    hd_window: $(window).width() + 'x' + $(window).height(),
                    hd_document: $(document).width() + 'x' + $(document).height(),
                    hd_screen: screen.width + 'x' + screen.height,
                    hd_agent: navigator.userAgent
                };
                for (var x in arr) {
                    str += '<input type="text" name="' + x + '" value="' + arr[x] + '" />'
                }
                $(str).appendTo('#cart_user_agent')
            })()
        }
    }, _run: function () {
        $('.thread-list li').each(function () {
            var a = $(this).attr('data-giovang') || '', b = $(this).attr('data-soluong') || 0,
                gia = $(this).attr('data-gia') || 0, per = $(this).attr('data-per') || 0;
            if (a != '' && a != '0') {
                $('.thread-logo-giovang', this).show()
            }
            b = parseInt(b, 10);
            gia = parseInt(gia, 10);
            per = parseInt(per, 10);
            if (b <= 0 || isNaN(b)) {
                $('.thread-list-chayhang', this).addClass('thread-list-soldout')
            }
            if (per <= 0 || gia <= 0 || isNaN(per) || isNaN(gia)) {
                $('.thread-logo-giamgia, .thread-list-gia font', this).hide()
            }
        });
        $('.thread-list-xem i').click(function () {
            var a = $(this).attr('data-id') || '0';
            a = parseInt(a, 10);
            if (!isNaN(a)) {
                _global_js_eb.cart_func.pro_add(a)
            }
        });
        _global_js_eb.fix_url_id();
        _global_js_eb.i_func.top();
        _global_js_eb.i_func.nav();
        _global_js_eb.i_func.load_mem();
        _global_js_eb.ads.bottom();
        dog('show_count_cart', count_shop_cart);
        (function () {
            var f = function (lnk, clat) {
                if (lnk != '') {
                    $('.' + clat + ' div').each(function () {
                        $(this).attr({'data-href': lnk, 'data-width': $(this).width()})
                    })
                }
            }, al = function (lnk, clat) {
                if (lnk != '') {
                    $('.' + clat).each(function () {
                        $(this).attr({href: lnk})
                    })
                }
            };
            f(cf_facebook_page, 'each-to-facebook');
            f(cf_google_plus, 'each-to-gooplus');
            al(cf_facebook_page, 'ahref-to-facebook');
            al(cf_google_plus, 'ahref-to-gooplus');
            al(cf_youtube_chanel, 'each-to-youtube-chanel');
            al(cf_twitter_page, 'each-to-twitter-page')
        })();
        if (check_lazyload == 1) {
            $(function () {
                $("#oi_thread_list img").lazyload({placeholder: bg_lazyload_140, effect: "fadeIn"})
            })
        }
        var sTop = 0, load_ads_2ben = false, clearTimeOutScrolljQuery = null;
        $('#oi_scroll_top').click(function () {
            $('body,html').animate({scrollTop: 0}, 800)
        });
        (function (dr, wl) {
            if (dr == '') return false;
            var domain = function (s) {
                return s.split('//')[1].split('/')[0].replace('www.', '')
            }, _get = function (par) {
                if (par || par != '') {
                    var a = wl.split(par + '=');
                    if (a.length > 1) {
                        return a[1].split('&')[0]
                    }
                }
                return ''
            }, dd = 'oi_update_urm_source';
            if (domain(wl) != domain(dr)) {
                if (dog(dd) == null) $('<div id="' + dd + '" style="style:none;"></div>').appendTo('body');
                setTimeout(function () {
                    var uri = '', utm_source = _get('utm_source'), utm_medium = _get('utm_medium'),
                        utm_campaign = _get('utm_campaign');
                    if (utm_source != '' || utm_medium != '' || utm_campaign != '') {
                        if (dr.split('?').length > 1) {
                            dr += '&'
                        } else {
                            dr += '?'
                        }
                        if (utm_source != '') {
                            dr += 'utm_source=' + utm_source
                        }
                        if (utm_medium != '') {
                            dr += '&utm_medium=' + utm_medium
                        }
                        if (utm_campaign != '') {
                            dr += '&utm_campaign=' + utm_campaign
                        }
                    }
                    uri = 'guest.php?act=update_urm_source&uri=' + encodeURIComponent(dr);
                    console.log(uri);
                    ajaxl(uri, dd, 9)
                }, 100)
            }
        })(document.referrer, window.location.href);
        _global_js_eb.auto_margin();
        $(window).load(function () {
            if (pid <= 0 && qc_2ben.length > 0 && $(window).width() > 1100) {
                load_ads_2ben = true
            }
        }).resize(function () {
            if ($(window).width() > 1240) {
                $('#qc_2ben_left, #qc_2ben_right').show()
            } else {
                $('#qc_2ben_left, #qc_2ben_right').hide()
            }
            _global_js_eb.auto_margin()
        }).scroll(function () {
            clearTimeout(clearTimeOutScrolljQuery);
            clearTimeOutScrolljQuery = setTimeout(function () {
                if ($(window).scrollTop() > 500) {
                    $('#oi_scroll_top').show()
                } else {
                    $('#oi_scroll_top').hide()
                }
            }, 600)
        })
    }, _p_link: function (id, seo) {
        return service_name + id + '/' + seo + '/'
    }, _c_link: function (id, seo, _name) {
        if (typeof _name == 'undefined' || _name == '') {
            _name = 'c';
        }
        return _name + id + '/' + seo + '/'
    }
};