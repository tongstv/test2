<?php
ini_set("display_errors",1);
require "scss.inc.php";

require_once "../../../conf2.php";

$db= new mysqli("localhost",$dbuser,$dbpass,$dbname) or die('die');

$res = $db->query("select * from tbl_config order by cf_id DESC limit 1");

$row = $res->fetch_object();

header("Content-type: text/css; charset=utf-8");

$scss = new scssc();
echo $scss->compile('
$nav-bg:'.$row->cf_nav.';
$orange:  '.$row->cf_color.';
$btn-cart:#50A791;

$text-color:#fff;

$footer-a-color: #fff;
$footer-text:#fff;



$nav-hover-bg: lighten($nav-bg,40%);


$orange-light: lighten($orange,8%);
$footer-bg:$orange;
$footer-bg-light:darken($footer-bg,15%);
$bottom-company:$footer-a-color;
$bg-tra-hang:$orange;
$footer-social:$footer-a-color;



@charset "utf-8";
@font-face {
  font-family: \'FontAwesome\';
  src: url(\'../fonts/fontawesome-webfont.eot?v=4.2.0\');
  src: url(\'../fonts/fontawesome-webfont.eot?#iefix&v=4.2.0\') format(\'embedded-opentype\'), url(\'../fonts/fontawesome-webfont.woff?v=4.2.0\') format(\'woff\'), url(\'../fonts/fontawesome-webfont.ttf?v=4.2.0\') format(\'truetype\'), url(\'../fonts/fontawesome-webfont.svg?v=4.2.0#fontawesomeregular\') format(\'svg\');
  font-weight: normal;
  font-style: normal;
}

.fa:before,
.fa:after {
  font-family: \'FontAwesome\';
}

i.fa,
em.fa {
  font-style: normal;
}

*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

html,
body,
div,
h1,
h2,
h3,
h4,
h5,
h6,
dl,
dt,
dd,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
form,
fieldset,
embed,
object,
applet {
  border: 0 none;
  margin: 0;
  padding: 0
}

body {
  background: #fff;
  font-size: 10pt;
  color: #333;
  font-family: Arial, Verdana, Helvetica, sans-serif
}

ul {
  padding: 0;
  margin: 0;
  list-style: none
}

a {
  color: #1264aa;
  text-decoration: none
}

a:hover {
  color: #f00
}

form {
  background: transparent;
  border: 0;
  outline: 0
}

label {
  cursor: pointer
}

select {
  padding: 2px
}

img {
  border: 0
}

input[type=button],
input[type=submit] {
  cursor: pointer
}

.green-button {
  background: #090;
  border: 1px #060 solid;
  color: #fff;
  padding: 1px 6px;
  -moz-border-radius: 2pt;
  border-radius: 2pt
}

.blue-button {
  background: $btn-cart;
  border: 1px #2F5BB7 solid
}

.red-button {
  background: #d14836;
  border: 0px transparent solid
}

.blue-button,
.red-button,
.w-button,
.xem-button {
  color: #fff;
  font-weight: bold;
  border-radius: 3pt;
  -moz-border-radius: 3pt
}

.blue-button,
.red-button,
.w-button {
  padding: 3pt 10pt
}

.xem-button {
  background: #fff url(images/btn-mua.png) no-repeat center;
  font-size: 16pt;
  text-transform: uppercase;
  padding: 6pt 20pt;
  -webkit-box-shadow: 0 2pt 2pt #f2f2f2;
  -moz-box-shadow: 0 2pt 2pt #f2f2f2;
  box-shadow: 2pt 2pt 2pt #f2f2f2
}

.mua-button {
  background: $orange;
  border: 0 none;
  width: 178px;
  height: 53px;
  color: #fff;
  font-size: 18pt;
  font-weight: bold;
  text-transform: uppercase
}

a.blue-button {
}

.blue-button:hover,
.xem-button:hover {
  color: #f2f2f2
}

.close-button {
  background: #fff;
  border: 1px #d14836 solid;
  color: #d14836;
  font-weight: bold;
  border-radius: 2pt;
  -moz-border-radius: 2pt
}

.blue-button:disabled,
.red-button:disabled,
.w-button,
.xem-button:disabled {
  background: #f2f2f2;
  color: #999;
  border: 1px #888 solid
}

.upper {
  text-transform: uppercase;
}

.small {
  font-size: 11px
}

.display_none,
.d-none {
  display: none
}

.vhidden,
.v-hidden {
  visibility: hidden
}

.vvisible,
.v-visible {
  visibility: visible
}

#o_popup .fix-popup {
  position: fixed;
  width: 100%
}

.icon {
  width: 14px;
  height: 14px;
  padding: 1px;
  margin: 1px 2px
}

.icon:hover {
  background: #fff;
  margin: 0 1px;
  border: 1px #ccc solid
}

.d-block {
  display: block
}

.bold {
  font-weight: bold !important
}

.redcolor {
  color: #f00 !important
}

.bluecolor {
  color: #00f !important
}

.greencolor {
  color: #090 !important
}

.graycolor {
  color: #999 !important
}

.clear,
.clear-both {
  display: block;
  clear: both;
  font-size: 0;
  line-height: 0;
  height: 0;
  overflow: hidden
}

.cf:before,
.cf:after,
.clearfix:before,
.clearfix:after {
  content: "";
  display: table
}

.cf:after,
.clearfix:after {
  clear: both
}

.cf,
.clearfix {
  zoom: 1
}

.rf {
  float: right
}

.lf {
  float: left
}

.f38 {
  width: 38%
}

.f62 {
  width: 62%
}

.f30 {
  width: 30%
}

.f70 {
  width: 70%
}

.f50 {
  width: 50%
}

.f75 {
  width: 75%
}

.f25 {
  width: 25%
}

.f20 {
  width: 20%
}

.f80 {
  width: 80%
}

.f10 {
  width: 10%
}

.f90 {
  width: 90%
}

.w99 {
  width: 999px;
  margin: 0 auto
}

.w90 {
  width: 90%;
  min-width: 999px;
  max-width: 1200px;
  margin: 0 auto;
}

.top-menu {
  background: #fff url(images/nav-top-top.png) top left repeat-x;
  padding: 6px 0 0 0
}

.top-menu .top-menu-right {
  padding: 6pt 0
}

.top-menu .top-menu-right a {
  background: #666;
  padding: 4pt 8pt;
  margin-left: 10px;
  color: #fff;
  border-radius: 3pt;
  -moz-border-radius: 3pt
}

.top-menu .top-menu-right a:hover {
  background: #333
}

.top-menu .top-menu-center div {
  background: #64c6df;
  padding: 10px 0;
  margin: 0 5px 0 0;
  float: left;
  border-top: hidden;
  border-top-right-radius: 3pt;
  border-top-left-radius: 3pt;
  -moz-border-radius-topright: 3pt;
  -moz-border-radius-topleft: 3pt
}

.top-menu .top-menu-center div.selected {
  background: $orange url(images/nav-bg.jpg) repeat-x
}

.top-menu .top-menu-center a {
  color: #f2f2f2;
  font-size: 11pt;
  padding: 0 12px
}

.top-menu .top-menu-center a:hover {
  color: #fff
}

.top-menu .top-menu-center div.selected a {
  color: #333;
  font-weight: bold
}

.nav-bonus {
  margin: 20px auto;
  cursor: pointer;
  border: 1px #ccc solid;
  border-radius: 1px;
  -moz-border-radius: 1px;
  -webkit-box-shadow: 0 2pt 2pt #ccc;
  -moz-box-shadow: 0 2pt 2pt #ccc;
  box-shadow: 2pt 2pt 2pt #ccc
}

#main {
}

.frm-search {
}

.frm-search ul {
}

.frm-search li {
  padding: 6pt 0
}

.frm-search label {
  font-weight: bold;
  display: block
}

.frm-search input[type=text] {
  background: #fff;
  width: 268px;
  color: #666;
  padding: 5px;
  border: 1px #ccc solid;
  border-radius: 3pt;
  -moz-border-radius: 3pt
}

.frm-search input[type=text]:hover {
  border-color: #f00
}

#qrg_step2 {
  background: url(images/anh2.png) bottom no-repeat;
  padding: 0 40px 200px 40px
}

.go-to-cart {
  background: url(images/cart-icon.png) right no-repeat;
  height: 58px
}

.go-to-cart div {
  padding: 25px 55px 0 0
}

.thread-list {
  margin: 0 -10px
}

.thread-list li {
  float: left;
  width: 25%
}

.thread-list-padding {
  margin: 0 10px 50px 10px;
  padding: 0 0 10px 0;
  border: 1px #ccc solid;
}

.thread-list .thread-logo-giamgia {
  position: relative;
}

.thread-list .thread-logo-giamgia div,
.thread-details-km div {
  background: url(images/discount_v2.png) center 0 no-repeat;
  position: absolute;
  top: 0;
  right: 12px;
  color: #fff;
  font-size: 24px;
  width: 57px;
  height: 49px;
  padding: 32px 0 0 3px;
}

.thread-list-title {
  height: 40px;
  line-height: 20px;
  overflow: hidden;
  margin: 3px 0 8px 0;
  font-weight: normal;
}

.thread-list-title a {
  display: block;
  font-size: 15px;
  color: #242424;
}

.thread-list-avt,
.thread-list-avt img {
  height: 180px
}

.thread-list-avt {
  overflow: hidden;
}

.thread-list-avt img {
  display: block
}

.thread-list-gia {
  line-height: 25px;
  height: 25px;
  overflow: hidden;
  margin: 10px 0 5px 0;
}

.thread-list-gia span {
  font-size: 23px;
  color: #000;
  font-weight: bold
}

.thread-list-gia font {
  font-size: 14px;
  text-decoration: line-through;
  margin-left: 15px;
  color: #999;
}

.thread-list-mua {
}

.thread-list-time {
  background: url(images/thread-time.png) left no-repeat;
  line-height: 25px;
  padding-left: 25px
}

.thread-list-xem {
}

.thread-list-xem div {
}

.thread-list-xem i,
.thread-list-xem a {
  display: inline-block;
  color:$btn-cart;
  margin-left: 15px;
}

.thread-list-xem i {
  background: $nav-bg;
  padding: 9px 14px 12px 9px;
  position: relative;
  top: 3px;
  cursor: pointer;
}

.thread-list-xem i:before {
  content: "\f07a";
  font-size: 29px;
  line-height: 29px;
  color: $text-color;
  -moz-transition: all 0.2s ease;
  -o-transition: all 0.2s ease;
  -webkit-transition: all 0.2s ease;
  transition: all 0.2s ease;
}

.thread-list-xem a {
  padding: 16px 20px;
  border: 1px $orange solid;
  font-size: 14px;
  color: $orange;
  background: #fff !important;
}

.thread-list-xem a:hover {
  opacity: .8;
}

.thread-list-xem i:hover {
  background: $orange;
}

.thread-list-chayhang {
  text-align: center;
}

.thread-list-soldout {
  background: url(images/bg-deal-soldout-text3.gif) center no-repeat;
}

.thread-list-padding:hover {
  border-color: $orange;
}

.thread-list-padding:hover .thread-list-title a {
  color: #199e4b;
}

.thread-list-padding:hover .thread-list-xem {
  display: block
}

.thread-details {
}

.thread-details-title {
  font-size: 18pt;
  font-weight: bold;
  padding: 3px 0
}

.thread-details-comment {
  color: #777;
  padding: 10px 0;
  line-height: 18px;
}

.thread-details-content {
  padding: 0 0 20px 0;
  text-align: justify
}

.thread-details-content img {
  max-width: 800px;
  display: block;
  margin: 10px auto;
  border: 1px #333 solid
}

.thread-details-avt {
  overflow: hidden;
  height: 400px
}

.thread-details-avt img {
  max-height: 400px
}

.thread-details .payment-line {
  background: #0199d8;
  color: #fff
}

.thread-details .payment-line,
.thread-details .border-time,
.thread-details .time-line {
  padding: 12px 12px 6px 12px;
  margin: 0 0 6pt 0;
  border: 1px #f2f2f2 solid;
  border-radius: 4pt;
  -moz-border-radius: 4pt
}

.thread-details .border-time {
  background: #453a38;
  color: #CCC
}

.thread-details .time-line {
  background: #574c4a
}

.thread-details .time-line div {
  padding: 1pt 0
}

.thread-details-km {
  position: relative;
}

.thread-details-km div {
}

.thread-details-gia {
  line-height: 29px;
  font-size: 16px;
  color: #666;
  padding-left: 10px;
  text-decoration: line-through;
}

.thread-details-giaban {
  font-size: 32px;
  font-weight: bold;
  line-height: 35px;
  margin-bottom: 5px;
  color: $orange;
}

.thread-details-mua {
  border: 1px #ccc solid;
  border-top: 0 none;
}

.thread-details-muapadding {
  padding: 15px 10px;
  border-top: 1px #ccc solid;
}

.thread-details .max-mua,
.thread-details .mua-max {
  border-radius: 3pt;
  -moz-border-radius: 3pt
}

.thread-details .max-mua {
  background: #f2f2f2;
  width: 80%;
  margin: 6px auto;
  font-size: 9pt;
  padding: 1px;
  border: 1px #ccc solid
}

.thread-details .mua-max {
  background: #09F;
  width: 0;
  color: #09F
}

.thread-details .pay-bk {
  background: transparent url(images/payment_bk_2.png) no-repeat center
}

.thread-details .pay-bk,
.thread-details .pay-sh {
  width: 172px;
  height: 48px;
  line-height: 22px;
  margin: 10px 0 0 13px;
  padding: 0;
  border: 1px #649400 solid;
  border-radius: 3pt;
  cursor: pointer
}

.thread-details .pay-bk,
.thread-details .pay-bk a {
  color: #fff
}

.thread-details .pay-bk a {
  font-size: 13pt;
  display: block;
  padding: 6px 0 0 0
}

#oi_da_mua_list {
  display: none;
  margin: 10px 0;
  border: 1px #999 solid;
  padding: 10px;
  height: 300px;
  overflow-y: scroll
}

#oi_da_mua_list table {
  border-top: 1px #999 solid;
  border-right: 1px #999 solid
}

#oi_da_mua_list td {
  padding: 6px;
  border-bottom: 1px #999 solid;
  border-left: 1px #999 solid
}

#oi_da_mua_list .da-mua-title {
  background: #CCC;
  font-weight: bold
}

#oi_gio_vang {
  border-top: 1px #ccc dotted;
  padding: 20px 0
}

#oi_gio_vang .ui-gio-vang {
  background: #fff url(images/gold_hour-v2.jpg) left no-repeat;
  color: #FF722D;
  font-size: 11pt;
  height: 84px
}

#oi_gio_vang #oi_gio_vang_left {
  color: #FF9B25;
  font-size: 11pt
}

.thread-support {
  padding: 10px 15px;
  border: 1px #ccc solid;
  border-top: 0 none;
}

.thread-support-phoneicon {
  position: relative;
}

.thread-support-phoneicon i {
  position: absolute;
  width: 50px;
  height: 50px;
  line-height: 50px;
  font-size: 50px;
  top: -3px;
  display: block;
}

.thread-support-phoneicon i:before {
  content: "\f098";
}

.thread-support-phone {
  font-size: 14pt;
  padding: 0 0 0 50px;
}

.thread-support-yahoo div {
  padding: 6px 0
}

.thread-payline {
  border: 1px #ccc solid;
  border-top: 0 none;
  padding: 10px 15px;
  line-height: 18px;
}

.thread-payline-name {
  background: linear-gradient(45deg, $orange 0%, $orange 35%, $orange-light 64%, $orange-light 100%);
  text-align: center;
  font-size: 16px;
  line-height: 38px;
  color: #000;
  border-radius: 5px 5px 0 0;
}

.public-part-page {
  text-align: right;
  padding: 6px 10px 6px 0
}

.public-part-page a {
  margin: 0 3px;
  font-size: 11pt
}

.w-part-page .public-part-page,
.w-part-page .public-part-page a {
  color: #000;
  font-size: 13pt
}

.public-table td {
  padding: 8px 0
}

.public-table .t {
  width: 28%;
  font-size: 11pt;
  color: #777
}

.public-table .t span {
  padding-right: 20px
}

.public-table .i {
  width: 72%
}

.public-table .s {
  width: 68px
}

.public-table .n {
  width: 168px
}

.public-table .l {
  width: 268px
}

.public-table .m {
  width: 368px
}

.public-table input[type=text],
.public-table input[type=password] {
  padding: 5px
}

.showPicture {
  position: fixed;
  background: rgba(0, 0, 0, .68);
  width: 100%;
  height: 100%;
  padding: 20px 0
}

.showPicture img {
  background: #fff;
  max-width: 800px;
  padding: 1px;
  border: 3px #333 solid
}

#oi_left_menu .member-menu {
  border: 1px #ccc solid;
  margin-bottom: 20px;
  line-height: 36px;
  border-radius: 5px
}

#oi_left_menu .member-menu h4,
#oi_left_menu .member-menu div {
  padding-left: 20px
}

#oi_left_menu .member-menu h4 {
  background: #f2f2f2;
  border-radius: 5px 5px 0 0;
  font-size: 12pt
}

#oi_left_menu .member-menu div {
  border-top: 1px #ccc solid
}

#oi_left_menu .member-menu a {
  color: #333;
  display: block
}

#oi_left_menu .member-menu a:hover {
  text-decoration: underline
}

#oi_left_menu .member-menu a.selected,
#oi_left_menu .member-menu a:hover {
  color: #F00
}

.login-right {
  padding: 20px 26px
}

.login-right .login-text {
  width: 272px;
  margin: 6px 0 0 0;
  padding: 2px 0;
  font-size: 11pt;
  color: #666
}

.w_select {
  min-width: 168px
}

.titleCSS {
  font-size: 13pt;
  padding: 6px 0
}

.showHiddenMenu {
  background: #fff;
  position: absolute;
  padding: 8px;
  border: 1px #666 solid;
  line-height: 20px
}

.ajxl-avt li {
  float: left;
  width: 25%;
  height: 108px;
  padding: 5px 0;
  overflow: hidden
}

.ajxl-avt img {
  width: 108px;
  padding: 1px;
  border: 1px #ccc solid
}

.ajxl-avt .ajxl-avt-hide {
  background: rgba(0, 0, 0, .68);
  position: absolute;
  padding: 8px;
  border: 1px #666 solid;
  line-height: 20px;
  visibility: hidden
}

.ajxl-avt .ajxl-avt-hide a {
  color: #fff
}

.ajxl-avt .ajxl-avt-hide a:hover {
  text-decoration: underline
}

.ajxl-avt li:hover .ajxl-avt-hide {
  visibility: visible
}

.login-ul {
  padding: 6px 12px;
  margin: 6px 12px
}

.login-ul li {
  line-height: 50px;
  padding: 0 0 0 58px;
  margin: 6px 0
}

.login-ul .login-class1 {
  background: url(images/hot_deals.png) no-repeat left
}

.login-ul .login-class2 {
  background: url(images/de-hieu.png) no-repeat left
}

.login-ul .login-class3 {
  background: url(images/for_sale_icon.png) no-repeat left
}

.login-ul .login-class4 {
  background: url(images/mua-ban.png) no-repeat left
}

.table-list {
  border-top: 1px #ccc solid;
  border-right: 1px #ccc solid
}

.table-list td {
  border-bottom: 1px #ccc solid;
  border-left: 1px #ccc solid;
  padding: 6px
}

.table-list .table-list-title {
  text-align: center;
  font-weight: bold
}

.table-list tr:hover {
  background: #f9f9f9
}

.hd_status0,
.hd_status0 a {
  color: #000
}

.hd_status0 a {
  font-weight: bold
}

.hd_status1,
.hd_status1 a {
  color: #00F
}

.hd_status2,
.hd_status2 a {
  color: #F00
}

.hd_status3,
.hd_status3 a {
  color: #0C0
}

.hd_status4,
.hd_status4 a {
  color: #ccc
}

.hd_status5,
.hd_status5 a {
  color: #C0F
}

.hd_status6,
.hd_status6 a {
  color: #0C0
}

.hd_status7,
.hd_status7 a {
  color: #669
}

.hd_status9,
.hd_status9 a {
  color: #F69
}

.hd_statusred,
.hd_statusred a {
  color: #C00
}

.other-blog {
  padding: 6px 12px;
  margin: 6px 12px
}

.other-blog li {
  background: #fff url(images/bullet_orange.gif) no-repeat left;
  padding: 3px 0 3px 12px
}

.other-blog h2 a {
  font-size: 10pt
}

.lien-ket-site {
  background: #fff url(images/bg-footer.png) repeat-x;
  padding: 8px 0 3px 0
}

.lien-ket-site li {
  float: left
}

.lien-ket-site img {
  height: 50px
}

.footer-bg {
  background: $footer_bg !important;

  background: #EBE0BC;
  background: -webkit-linear-gradient(top, $footer-bg, $footer-bg-light);
  background: -moz-linear-gradient(top, $footer-bg, $footer-bg-light);
  background: linear-gradient(to bottom, $footer-bg,$footer-bg-light);

}

.bottom-contact {
  position: relative;
  z-index: 2;
  background: $footer_bg !important;
  padding: 50px 0 0 0;
}

.bottom-support {
  padding-right: 20px;
}

.bottom-support .bottom-node {
  float: left;
  width: 33.33%;
}

.bottom-support-title {
  color: #fff;
  font-size: 17px;
  text-transform: uppercase;
  margin-bottom: 25px;
}

.bottom-support ul {
  padding-right: 10px;
}

.bottom-support li {
  height: 32px;
  line-height: 16px;
  overflow: hidden;
  margin-bottom: 10px;
}

.bottom-support li a {
  color: $footer-a-color;
  text-transform: uppercase;
  font-size: 12px;
  display: block;
}

.bottom-support li a:hover {
  color: #fff;
}

.bottom-company {
  color: $bottom-company;
}

.bottom-company a {
  color: $footer-a-color;
}

.bottom-company a:hover {
  color: #fff;
}

.bottom-company li {
  margin-bottom: 15px;
  line-height: 23px;
}

.bottom-company li:before {
  color: $footer-a-color;
  font-size: 23px;
  display: inline-block;
  position: absolute;
}

.bottom-company span {
  display: block;
  padding-left: 35px;
}

#footer {
  padding: 20px 0 30px 0;
}

#footer,
#footer a {
  color: $footer-a-color;
  font-size: 12px;
}

#footer a:hover {
  color: #fff;
}

#qc_2ben_left,
#qc_2ben_right {
  position: fixed;
  top: 68px
}

#qc_2ben_left,
#qc_2ben_left img,
#qc_2ben_right,
#qc_2ben_right img {
  width: 128px
}

.cart-mua-button {
  background: url(images/bg-next-cart.png) repeat-x;
  border: 1px #E79800 solid;
  padding: 5pt 12pt;
  font-size: 16pt;
  -moz-border-radius: 4pt;
  border-radius: 4pt;
  color: #fff;
}

.cur {
  cursor: pointer
}

.top-top-banner {
  background: url(images/top-top-banner.png) top left repeat-x;
  padding: 20px 0;
}

.btn-login {
  background: transparent url(images/top-top-tab.png?v=3) no-repeat;
  height: 44px
}

.top-top-tab {
  margin-top: 5px
}

.top-top-tab li {
  background: url(images/bullet_2.gif) left no-repeat;
  float: left
}

.top-top-tab li:first-child {
  background-image: url(../images/home.png);
  padding-left: 5px
}

.top-top-tab a {
  display: block;
  padding-left: 15px;
  line-height: 30px;
  margin-right: 20px;
  color: #fff;
  font-size: 11pt
}

.top-top-tab a:hover {
  text-decoration: underline
}

.top-top-tab li.selected a {
  font-weight: bold
}

.top-top-tab .gio-vang a {
  background: url(images/nav-golden-time.png) right no-repeat;
  width: 100px;
  text-decoration: none !important
}

.top-top-tab .gio-vang a:hover {
  opacity: 0.8
}

#nav {
  background: #fff;
  position: absolute;
  z-index: 9;
  display: none;
  left: -999pt;
  width: 220px !important;
  border-right: 5px $orange solid;
}

#nav a {
  display: block;
}

#nav h2 a {
  font-size: 13px;
  text-transform: uppercase;
  font-weight: normal;
  line-height: 35px;
  padding: 0 0 0 10px;
  color: #333;
  border-bottom: 1px solid #eee;
}

#nav h2 a:before {
  content: "\f105";
  display: inline-block;
  padding-right: 6px;
}

#nav h2 a:hover {
  background: $nav-hover-bg;
}

#nav h2.selected a {
  color: #f00;
  font-weight: bold;
}

#nav:hover {
  border-right-color: $nav-hover-bg;
}

.top-nav-sha:hover #nav,
#nav.selected {
  display: block;
  left: auto;
}

#nav .sub-menu {
  background: rgba(0, 0, 0, .68);
  position: absolute;
  z-index: 10;
  margin-left: 195px;
  width: 200px;
  top: 0;
  line-height: 30px;
  display: none;
  border-left: 5px $nav-hover-bg solid;
}

#nav li:hover .sub-menu {
  display: block;
}

#nav .sub-menu a {
  padding: 0 0 0 20px;
  color: #fff;
}

#nav .sub-menu a:hover {
  background: #fff;
  color: #000;
}

#nav .sub-menu a.upper {
  background: $nav-hover-bg;
  line-height: 35px;
  color: #000;
}

#oi_member_func:before {
  content: "\f007";
  font-size: 23px;
  display: inline-block;
  padding-right: 5px;
}

#oi_member_func a {
  font-size: 14px;
  color: #333;
}

#oi_member_func a:first-child {
  margin-right: 15px;
}

#oi_member_func a:hover {
  text-decoration: underline;
}

.div-search {
  margin: 18px 0 0 0;
  border: 2px $orange-light solid;
  border-right-width: 3px;
  border-left-width: 3px;
  border-bottom-color: $orange;
  border-radius: 5px;
  overflow: hidden;
  padding: 0;
}

.div-search form {
  padding-left: 6px;
  margin-right: -1px;
}

.div-search,
.div-search input[type=text],
.div-search button {
  height: 35px;
}

.div-search input[type=text],
.div-search button {
  padding: 0;
  margin: 0;
  background: none;
  border: 0 none;
  outline: none;
  width: 95%;
}

.div-search button {
  background: $orange;
  color: #fff;
  font-size: 18px;
  cursor: pointer;
  width: 50px;
}

.div-search button:before {
  content: "\f002";
}

.div-search button span {
  display: none;
}

.div-search button:hover {
  color: #000;
}

#oiSearchAjax {
  position: relative;
  display: none;
  z-index: 99;
}

#oiSearchAjax div,
#oiSearchAjax ul {
  background: #fff;
  position: absolute;
  top: -3px;
  left: 0;
  right: 0;
  padding-bottom: 35px;
  list-style: none;
  border: 1px #ccc solid;
  border-radius: 0 0 3px 3px;
  font-weight: bold;
  text-align: center;
}

#oiSearchAjax ul {
  border-top: 0 none;
}

#oiSearchAjax div {
  padding: 25px 0;
  text-align: center;
}

#oiSearchAjax div,
#oiSearchAjax li {
  background: #e9eced;
}

#oiSearchAjax li {
  height: 25px;
  overflow: hidden;
  line-height: 25px;
}

#oiSearchAjax a {
  background: #fff;
  display: block;
  text-align: left;
  padding-left: 20px;
  font-weight: normal;
  color: #333;
}

#oiSearchAjax a:hover {
  background: #f2f2f2;
  color: #f00;
}

.btn-login {
  background-position: 0 -370px;
  margin-top: 5px;
  width: 97px;
  height: 34px;
  color: #fff;
  border: 0 none
}

.btn-login:hover {
  background-position: 0 -404px
}

.btn-to-cart {
}

.btn-to-cart a {
  position: relative;
  font-size: 14px;
  color: #333;
}

.btn-to-cart a:before {
  content: "\f07a";
  display: inline-block;
  padding-right: 6px;
  font-size: 25px;
  position: relative;
  bottom: -1px;
  color: $orange;
}

.btn-to-cart span {
  background: $orange;
  color: #fff;
  border-radius: 10px;
  display: inline-block;
  position: absolute;
  top: -10px;
  line-height: 16px;
  min-width: 16px;
  text-align: center;
  font-size: 11px;
}

.btn-to-cart:hover {
  opacity: .8;
}

#oi_scroll_top {
  background: #666;
  position: fixed;
  color: #fff;
  width: 50px;
  height: 50px;
  line-height: 45px;
  font-size: 35px;
  text-align: center;
  cursor: pointer;
  bottom: 50px;
  right: 20px;
  border: 0 none;
  border-radius: 10px;
  opacity: .7;
  display: none;
  z-index: 9;
}

#oi_scroll_top:before {
  content: "\f077";
}

.home-ant-title {
  padding-left: 5px;
  margin-bottom: 15px;
  border-bottom: 2px $orange solid;
}

.tl-atitle-left,
.thread-home-c2 {
  line-height: 45px;
  height: 45px;
  overflow: hidden;
}

.tl-atitle-left {
  padding: 0 20px;
  border: 1px $orange solid;
  border-bottom: 2px #fff solid;
  margin-bottom: -2px;
  text-align: center;
}

.tl-atitle-left a {
  font-size: 20px;
  color: $orange;
}

.thread-home-c2 div {
  float: left
}

.thread-home-c2 a {
  padding: 0 10px;
  color: #666;
  font-size: 13px;
  text-transform: uppercase;
  border-right: 1px #ccc solid
}

.thread-home-c2 div:last-child a {
  border: 0 none;
  font-weight: bold
}

.thread-home-c2 a:hover {
  text-decoration: underline
}

.button-xem-orange,
.button-xem-small {
  background: url(images/btn-xem-yellow.png) center repeat-x;
  color: #C22227;
  text-transform: uppercase;
  font-weight: bold;
  border: 1px #DA9736 solid
}

.button-xem-orange {
  padding: 5pt 8pt;
  border-radius: 5pt
}

.button-xem-small {
  padding: 3pt 4pt;
  border-radius: 3pt
}

.jcarousel-skin-tango {
  position: relative;
  width: 100%
}

.xem-tiep-cid {
  background: transparent url(images/xem-tiep-sp.png) no-repeat;
  background-position: 0 -2px;
  border: 0 none;
  position: absolute;
  cursor: pointer;
  top: -208px;
  width: 257px;
  height: 87px;
  color: #fff;
  z-index: 888;
  right: -23px;
  font-size: 18px
}

.xem-tiep-cid div {
  padding: 6pt 0 0 0
}

.xem-tiep-cid strong {
  font-size: 36px;
  display: block
}

.xem-tiep-cid:hover {
  background-position: 0 -91px
}

.jcarousel-next-horizontal,
.jcarousel-prev-horizontal {
  background: transparent url(images/jbutton-next-prev.png) no-repeat;
  position: absolute;
  top: -188px;
  width: 58px;
  height: 58px;
  cursor: pointer;
  z-index: 888
}

.jcarousel-next-horizontal {
  right: -24px
}

.jcarousel-next-horizontal:hover,
.jcarousel-next-horizontal:focus,
.jcarousel-next-horizontal:active {
  background-position: 0 -69px
}

.jcarousel-prev-horizontal {
  background-position: 0 -139px;
  left: -24px
}

.jcarousel-prev-horizontal:hover,
.jcarousel-prev-horizontal:focus,
.jcarousel-prev-horizontal:active {
  background-position: 0 -214px
}

#oi_big_banner {
  background: center no-repeat #fff;
  background-size: cover;
  min-height: 100px;
  overflow: hidden;
  display: none;
  margin-bottom: 20px;
}

#oi_big_banner a {
  display: block;
}

.ads-in-control {
  position: relative
}

.ads-in-btn {
  position: absolute;
  top: -25px;
  right: 10px;
  z-index: 5;
}

.ads-in-btn input[type=button] {
  background: #333;
  margin: 0;
  padding: 0;
  width: 16px;
  height: 16px;
  border-radius: 10px;
  border: 0 none;
}

.ads-in-btn input[type=button]:hover {
  background-color: #666;
}

.ads-in-btn input[type=button].selected {
  background-color: #f2f2f2;
}

.cart-pro-phet {
  background: #fff;
  padding: 0 15px 50px 0;
  -moz-border-radius: pt;
  border-radius: 6pt
}

.cart-pro-phet #oi_send_invoice {
}

.cart-pro-phet #oi_cart,
.cart-pro-phet #cart_null {
  display: none
}

.cart-pro-phet #cart_null {
  font-size: 13pt;
  color: #f00;
  padding: 68px 0;
  font-weight: bold
}

.cart-pro-phet .cart-total {
  padding: 10px 0;
  font-size: 11pt;
  font-weight: bold
}

.cart-pro-phet .cart-total strong {
  font-size: 14pt;
  color: #900
}

.cart-table {
  border-bottom: 1px #ccc dotted
}

.cart-table td {
  padding: 10px 5px;
  border-top: 1px #ccc solid
}

.cart-table tr td:first-child {
  padding-left: 0
}

.cart-table .cart-table-info .cart-table-title a {
  font-size: 11pt;
  font-weight: bold
}

.cart-table .cart-table-info .con-hang {
  font-size: 13pt
}

.cart-table .cart-table-info .xoa-sp {
  padding: 6pt 0
}

.cart-table .cart-table-info .xoa-sp a {
  text-decoration: underline;
  font-size: 11pt
}

.cart-table .cart-table-gia {
  color: #666
}

.cart-table .cart-table-gia .gia-moi {
  font-size: 11pt;
  color: #900
}

.cart-table .cart-so-luong {
  width: 36px;
  padding: 2pt
}

.cart-table .cart-table-subject td {
  font-weight: bold;
  color: #666;
  padding: 3pt 0 !important;
  border: 0 none !important
}

.thread-title,
.thread-title a {
  font-weight: bold;
  color: #c60;
  font-size: 11pt
}

.thread-title {
  padding: 10px 0
}

.thread-title a:hover {
  text-decoration: underline
}

.invoice-vang-auto {
  color: #CCC621
}

.hpsbnlbx {
  background: #fff;
  border: 1px #ccc solid;
}

.hpsbnlbx .nldrb1 {
  background: #444;
  color: #fff;
  text-transform: uppercase;
  font-size: 18px;
  text-align: center;
  padding: 6px 0;
}

.hpsbnlbx .nldrbc {
  padding: 15px 0 15px 15px;
}

.hpsbnlbx input[type=text] {
  width: 90%;
  padding: 6px 0 6px 3px;
  font-size: 11pt;
}

.nldrbc button {
  background: none;
  border: 0 none;
  cursor: pointer;
  padding: 0;
  margin: 0;
  width: 85%;
  height: 32px;
  font-size: 25px;
  color: $footer-a-color;
}

.nldrbc button:before {
  content: "\f18e";
}

.nldrbc button:hover {
  color: #333;
}

.nldrbc button span {
  display: none;
}

.footer-social li {
  float: left;
  width: 40px;
  height: 30px;
}

.footer-social a {
  color: $footer-social;
  font-size: 24px;
}

.footer-social .fb a:before {
  content: "\f09a";
}

.footer-social .t a:before {
  content: "\f099";
}

.footer-social .yt a:before {
  content: "\f16a";
}

.footer-social .g a:before {
  content: "\f0d4";
}

.footer-social a:hover {
  font-size: 30px;
}

.thread-details-tohome {
  margin: 20px 0;
  line-height: 20px;
  height: 20px;
  overflow: hidden;
}

.thread-details-tohome,
.thread-details-tohome a {
  color: #333
}

.thread-details-tohome a {
  font-weight: bold;
}

.thread-details-tohome a,
.thread-details-tohome span {
  padding-left: 12px;
}

.thread-details-tohome a:before,
.thread-details-tohome span:before {
  content: "\f0da";
  font-family: "FontAwesome";
  padding-right: 12px;
}

.thread-details-tohome a:first-child {
  padding-left: 0;
}

.thread-details-tohome a:first-child:before {
  content: "\f015";
  color: $orange;
  font-size: 15px;
}

.thread-details-tohome a:hover {
  color: #f00;
}

.thread-details-bottom {
  line-height: 20px;
  padding: 20px;
  margin: 0 0 20px 0;
  border: 1px #ccc solid;
}

.thread-details-timedown {
  position: relative;
}

.thread-details-timedown div {
  background: #666;
  position: absolute;
  width: 100%;
  font-size: 16px;
  color: #fff;
  margin-top: -33px;
  padding: 6px 0;
  text-align: center;
}

.thread-details-xoay {
  border: 1px #ccc solid;
  padding: 0 0 0 10px;
}

.thread-details-xoay li {
  margin: 10px 0;
  padding: 5px 0;
}

.thread-details-xoay span {
  text-transform: uppercase;
  font-size: 12px;
  font-weight: bold;
}

.thread-details-xoay li i:before {
  content: "\f09d";
  display: inline-block;
  font-size: 25px;
  float: left;
  padding: 2px 10px 0 0;
  width: 35px;
  text-align: center;
}

.thread-details-xoay li.giaohang-toanquoc i:before {
  content: "\f0d1";
}

.thread-details-xoay li.doi-trahang i:before {
  content: "\f021";
}

.product-details-thumb {
  padding: 15px 0;
  border-top: 1px #ccc solid
}

.details-thumb-left,
.details-thumb-right,
.details-thumb-center {
  float: left;
}

.details-thumb-left,
.details-thumb-right,
.details-thumb-center div {
  height: 65px;
}

.details-thumb-left,
.details-thumb-right {
  width: 8%;
  cursor: pointer;
  line-height: 65px;
  text-align: center;
  font-size: 30px;
}

.details-thumb-left:before {
  content: "\f104";
}

.details-thumb-right:before {
  content: "\f105";
}

.details-thumb-center {
  width: 84%
}

.details-thumb-center li {
  float: left;
  width: 25%
}

.details-thumb-center li div {
  margin: 0 auto;
  overflow: hidden;
}

.details-thumb-center li div,
.details-thumb-center img {
  width: 65px;
}

.details-thumb-center img {
  cursor: pointer;
}

.details-thumb-center img:hover,
.details-thumb-left:hover,
.details-thumb-right:hover {
  opacity: .6;
}

#oi_popup {
  background: rgba(0, 0, 0, .68);
  width: 100%;
  height: 100%;
  position: absolute;
  z-index: 999999;
  display: none
}

#oi_popup #oi_popup_inner {
  background: #CCC;
  width: 600px;
  padding: 10px;
  margin: 50px auto;
  -moz-border-radius: 5px;
  border-radius: 5px
}

#oi_popup_inner .opoup-title-bg {
  background: $orange;
  line-height: 40px;
  padding: 0 10px;
  border: 1px #fff solid
}

#oi_popup_inner .opoup-title-bg strong {
  font-size: 16px
}

#oi_popup_inner .opoup-title-bg,
#oi_popup_inner .opoup-title-bg a {
  color: #fff
}

#oi_popup_inner .popup-padding {
  background: #fff;
  padding: 20px
}

#oi_popup_inner input[type=text],
#oi_popup_inner input[type=password] {
  background: #fff;
  outline: none;
  width: 288px;
  padding: 5px;
  border: 1px #999 solid
}

#oi_popup_inner input[type=text]:focus,
#oi_popup_inner input[type=password]:focus {
  border-color: #000
}

.ul-dieukien-noibat {
  border-bottom: 1px #ccc solid;
}

.ul-dieukien-noibat li {
  float: left;
  line-height: 30px;
  margin: 0 40px -1px 0;
  text-transform: uppercase;
  font-size: 14px;
  cursor: pointer;
  color: #888;
  font-weight: bold;
  border-bottom: 3px transparent solid;
}

.ul-dieukien-noibat li.selected {
  border-bottom-color: #333;
  color: #000;
}

.ads-nav {
  margin: 10px 0;
  height: 140px;
  overflow: hidden
}

.ads-nav li {
  text-align: center;
  width: 25%;
  float: left
}

.ads-nav img {
  width: 236px;
  height: 130px;
  margin-bottom: 20px;
  padding: 1px;
  border: 1px #ccc solid;
  -webkit-box-shadow: 0 2pt 2pt #ccc;
  -moz-box-shadow: 0 2pt 2pt #ccc;
  box-shadow: 2pt 2pt 2pt #ccc
}

.ads-nav img:hover {
  border: 1px #999 solid;
  -webkit-box-shadow: 0 2pt 2pt #999;
  -moz-box-shadow: 0 2pt 2pt #999;
  box-shadow: 2pt 2pt 2pt #999
}

.product-color .product-color-title,
.product-size .product-size-title {
  text-transform: uppercase;
  font-size: 9pt;
  border-bottom: 1px #ccc solid
}

.product-color ul,
.product-size ul {
  padding: 6px 0
}

.product-color li,
.product-size li {
  float: left;
  border: 1px #d3d3d3 solid;
  margin-right: 5px
}

.product-color li:hover {
  border-color: #333
}

.product-color li.selected {
  border-color: #f00 !important
}

.product-size li {
  border-color: #ccc;
  line-height: 30px;
  min-width: 20px;
  padding: 0 5px;
  text-align: center;
  font-size: 11pt;
  color: #333;
  cursor: pointer
}

.product-size li.selected {
  background: #313131;
  color: #fff
}

.mua-button-v5 {
  color: white;
  border: none;
  background: $orange;
  padding: 0 14px;
  display: inline-block;
  text-align: center;
  margin-right: 16px;
  display: block;
  line-height: 40px;
  font-size: 20px;
  text-transform: uppercase;
}

.mua-button-v5 i:before {
  content: "\f07a";
  text-align: center;
  font-size: 30px;
  display: inline-block;
  padding-right: 10px;
}

.mua-button-v5:hover {
  background: #333;
  color: #fff;
}

.paynow-for-pcversion {
  position: absolute;
  background: rgba(0, 0, 0, .68);
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  height: 100%;
  z-index: 99;
  display: none;
}

.div-for-paynow {
  width: 600px;
  margin: 20px auto;
}

.paynow-for-pcversion .div-for-paynow {
  background: #fff;
  padding: 20px;
  border: 8px #666 solid;
  border-radius: 20px;
}

.paynow-for-close {
  position: relative;
  display: none;
}

.paynow-for-pcversion .paynow-for-close {
  display: block;
}

.paynow-for-close div {
  position: absolute;
  right: 0;
  font-size: 23px;
  border: 1px #666 solid;
  color: #666;
  border-radius: 13px;
  height: 26px;
  line-height: 26px;
  width: 26px;
  text-align: center;
  cursor: pointer;
}

.paynow-for-close i:before {
  content: "\f00d";
  padding: 0;
  margin: 0;
}

.add-to-cart {
  display: block;
  height: 30px;
  line-height: 30px;
  font-size: 13px;
  font-weight: bold;
  color: #333;
}

.add-to-cart i:before {
  content: "\f08a";
  color: white;
  background: #929292;
  width: 30px;
  text-align: center;
  display: inline-block;
  margin: 0 6px 0 0;
  -moz-border-radius: 15px;
  -webkit-border-radius: 15px;
  border-radius: 15px;
  font-size: 14px;
  font-weight: normal;
}

.add-to-cart:hover {
  color: #060;
}

.add-to-cart:hover i:before {
  background: $orange;
}

.product-details-table .t {
  font-size: 11pt
}

.product-details-table .i {
}

.product-details-table td {
  padding: 6px 0
}

.product-details-table input[type=text],
.product-details-table textarea {
  width: 300px;
  padding: 3px;
  outline: none
}

.product-details-table textarea {
  height: 35px
}

.thread-logo-giovang {
  position: relative;
  display: none
}

.thread-logo-giovang div {
  background: url(images/golden_time.png) no-repeat;
  position: absolute;
  width: 96px;
  height: 96px;
  right: 0;
  margin: -3px -3px 0 0;
}

.s_mod {
  margin-bottom: 18px;
  border: 1px solid #e9e7ea;
  border: 1px solid #e7e4e7 \9
;
  -webkit-box-shadow: 0 2pt 2pt #e0dfe0;
  -moz-box-shadow: 0 2pt 2pt #e0dfe0;
  box-shadow: 2pt 2pt 2pt #e0dfe0
}

.s_mod,
.s_mod img,
.s_mod .s_info {
  width: 640px
}

.s_percent {
  position: absolute;
  width: 200px;
  text-align: center;
  margin-top: 100px;
  font-weight: 700;
  font-size: 24px;
  color: #dc5c95
}

.s_info {
  filter: Alpha(opacity=70);
  background: #F4F1F4;
  background: rgba(244, 241, 244, .7);
  height: 22px;
  line-height: 22px;
  overflow: hidden;
  position: relative;
  margin-top: -22px
}

.s_info,
.s_info a {
  color: #333
}

.s_name {
  padding-left: 10px;
  font-size: 11pt
}

.shop_onsale .s-chi-tiet {
  padding-right: 5px
}

.shop_onsale .s-chi-tiet a {
  background: url(images/th-chi-tiet.png) right no-repeat;
  display: block;
  padding-right: 20px
}

.shop_onsale .s-chi-tiet a:hover {
  background-image: url(images/th-chi-tiet-hover.png?);
  text-decoration: underline
}

.s_mod:hover .s_info {
  background: #dc5c95;
  filter: alpha(opacity=100);
  -moz-opacity: 1;
  opacity: 1
}

.s_mod:hover .s_info,
.s_mod:hover .s_info a {
  color: #fff
}

.s_mod:hover {
  border-color: #dc5c95
}

.th-right-border {
  border: 1px solid #e4e2e5;
  padding: 1px;
  background-color: #FFF;
  box-shadow: 0 0 3px #E0DFE0;
  margin-bottom: 13px
}

.th-right-padding {
  padding: 10px 15px
}

.th-tab {
  text-align: center;
  font-weight: 700;
  color: #333134;
  background: url(images/th-tab-bg.png) bottom left repeat-x
}

.th-tab li {
  float: left;
  height: 28px;
  line-height: 28px;
  padding: 0 30px;
  border-right: 1px solid #edebee;
  border-bottom: 1px solid #edebee;
  cursor: pointer
}

.th-tab li:hover,
.th-tab li.selected {
  height: 29px;
  border-bottom: 0;
  background: #fcfafc;
  color: #da5e94
}

.th-cam-ket .cam-ket-title,
.th-doi-tac .cam-ket-title {
  font-size: 12pt;
  padding-bottom: 5px;
  color: #f52d96;
  font-weight: bold
}

.th-cam-ket li,
.th-doi-tac li {
  padding-bottom: 15px;
  margin-bottom: 15px;
  border-bottom: 1px #999 dotted
}

.th-cam-ket li:last-child,
.th-doi-tac li {
  border-bottom: 0 !important
}

.th-logo li {
  float: left;
  width: 33.33%
}

.th-logo img {
  width: 90px;
  margin: 10px 0;
  border: 1px #f2f2f2 solid
}

.th-logo img:hover {
  border-color: #F69
}

.comment-box {
  position: relative;
  background: #fff;
  margin-top: -28px;
}

.comment-box .uiLinkSubtle {
  background: #fff url(images/fb-icon-small-comment.png) left no-repeat;
  line-height: 16px;
  margin: 5px 4px;
  padding-left: 17px;
}

.comment-box .uiLinkSubtle a {
  color: #9197a3;
  font-size: 9px;
}

.comment-box .uiLinkSubtle a:hover {
  text-decoration: underline;
}

.comment-box input[type=text],
.comment-box textarea {
  background: #f8f8f8;
  border: 1px #ccc solid;
  padding: 4px;
  -moz-border-radius: 3pt;
  border-radius: 3pt
}

.comment-box input[type=text] {
  width: 300px;
  margin: 3px 0
}

.comment-box textarea {
  width: 98.1%;
  height: 40px
}

.comment-box input[type=text]:focus,
.comment-box textarea:focus {
  background-color: #fff;
  border-color: #f00
}

.comment-box .comment-box-titleCSS {
  background: url(images/doted.png?v) center repeat-x;
  padding-left: 50px;
  font-family: Tahoma, Geneva, sans-serif
}

.comment-box .comment-box-titleCSS span {
  background: #fff;
  padding: 0 12px;
  font-size: 13pt;
  color: #F90
}

.comment-box .comment-box-title {
  background: #ED343A;
  padding: 4px 6px;
  margin-bottom: 10px;
  color: #fff;
  border-top: 1px #000 solid
}

#login_if_guest {
  margin-bottom: 10px
}

#comment_list {
  padding: 0 0 0 10px;
  margin: 0;
  list-style: none;
  border-bottom: 1px #ccc solid;
}

#comment_list,
#comment_list a {
  font-size: 12px;
}

#comment_list li {
  margin: 4px 0;
  padding: 10px 0;
  border-top: 1px #e9eaed solid;
}

#comment_list .comment-fleft {
  width: 61px;
}

#comment_list .comment-fright {
  width: 650px;
}

#comment_list .comment-bg {
  background: top right no-repeat;
}

#comment_list .comment-list-ten a {
  font-size: 12px;
  color: #3b5998;
  font-weight: bold;
}

#comment_list .comment-list-content {
  margin: 5px 0;
  line-height: 14px;
  font-size: 12px;
  color: #1a1a1a;
}

#comment_list .comment-list-time {
  color: #9197a3;
}

#comment_list .comment-list-like {
  color: #3b5998;
}

#comment_list a:hover {
  text-decoration: underline;
}

#comment_list li:hover .comment-bg {
  background-image: url(images/fb-x-icon.png);
}

.thread-list-menu {
  margin-bottom: 20px;
}

.thread-list-menu .threadlist-title {
  background: #f6f6f6;
  border-top: 2px solid $orange;
  color: #01020b;
  text-transform: uppercase;
  padding: 14px 10px 17px 20px;
  font-size: 18px;
}

.thread-list-menu ul,
.thread-list-menu .price-for-thread {
  padding: 10px 0;
}

.thread-list-menu h3,
.thread-list-menu h4 {
  border-bottom: 1px #e5e5e5 solid;
}

.thread-list-menu h3 {
  padding-left: 15px;
}

.thread-list-menu h4 {
  padding-left: 30px;
}

.thread-list-menu a {
  font-size: 13px;
  color: #333;
  display: block;
  line-height: 32px;
}

.thread-list-menu h4 a {
  font-weight: normal;
}

.thread-list-menu a:before {
  content: "\f105";
  display: inline;
  font-family: "FontAwesome";
  color: #333333;
  padding-right: 8px;
}

.thread-list-menu a:hover {
  color: #f00;
}

.thread-list-menu .price-for-thread a {
  padding-left: 20px;
  border-bottom: 1px #e5e5e5 solid;
}

#show_list_size_multi ul {
  width: 450px;
  font-size: 11pt
}

#show_list_size_multi li {
  float: left;
  width: 50%;
  padding: 5px 0
}

#show_list_size_multi input[type=text] {
  width: 60px !important
}

#show_list_size_multi span {
  font-size: 11px;
  display: block
}

.home-hot-title {
  padding-left: 5px;
  margin-bottom: 15px;
  line-height: 45px;
  font-size: 20px;
  text-transform: uppercase;
  border-bottom: 1px #ccc solid;
}

.home-hot-title div {
  margin-bottom: -1px;
  padding: 0 20px;
  border: 1px #ccc solid;
  border-bottom: 1px #fff solid;
}

.copyright-echbay {
  opacity: 0.8
}

.copyright-echbay:hover {
  opacity: 1
}

.thread-list33 li {
  width: 33.33% !important;
}

.details-hot-title {
  background: #fafafa;
  line-height: 45px;
  padding: 1px 1px 1px 15px;
  font-size: 18px;
  color: #c60;
  border-left: 3px #f00 solid;
}

.details-carousel-lite {
  position: relative;
  height: 300px;
  overflow: hidden;
  margin-top: 15px;
}

.click-show-next-product .details-click-prev,
.click-show-next-product .details-click-next {
  background: #fff;
  height: 36px;
  line-height: 36px;
  width: 36px;
  float: left;
  text-align: center;
  margin: 3px 5px 0 0;
  font-size: 28px;
  cursor: pointer;
  color: #333;
  border: 1px #666 solid;
  font-weight: bold;
}

.click-show-next-product .details-click-prev i:before,
.click-show-next-product .details-click-next i:before {
  content: "\f105";
  display: block;
}

.click-show-next-product .details-click-prev i:before {
  content: "\f104";
}

.click-show-next-product .details-click-prev:hover,
.click-show-next-product .details-click-next:hover {
  color: #f00;
}

.show-if-chay-hang {
  background: url(images/bg-deal-soldout-text3.gif) center no-repeat;
  height: 100px;
}

.pencil-edit:before {
  content: "\f040";
  font-size: 16px;
}

.details-support {
}

.details-support-title {
  font-size: 16px;
  font-style: italic;
  border-bottom: 1px #ccc solid;
  padding-bottom: 3px;
  margin-bottom: 5px;
  font-weight: bold;
}

.details-support-phone,
.details-support-yahoo {
  font-size: 18px;
  line-height: 32px;
  margin: 5px 0;
}

.details-support-phone i,
.details-support-yahoo i {
  font-size: 32px;
  text-align: center;
  padding-right: 9px;
  float: left;
  color: $orange;
  display: inline-block;
}

.details-support-phone i:before {
  content: "\f095";
}

.details-support-yahoo i:before {
  content: "\f1d7";
}

.details-support-yahoo a {
  font-size: 13px;
  display: inline-block;
  padding: 0 5px;
  border: 1px #ccc solid;
  border-radius: 3px;
  line-height: 21px;
  color: #333;
  margin-right: 5px;
}

.details-support-yahoo font {
  display: inline-block;
  padding-left: 16px;
}

.details-support-yahoo a:hover {
  border-color: #390;
}

.member-top-bg {
  background: #f1f1f1;
  padding: 12px 20px;
  border-bottom: 1px #e6e6e6 solid;
}

.member-top-nav {
  color: #C00;
  font-size: 23px;
  border-bottom: 1px #e6e6e6 solid;
}

.member-top-home {
  color: #fff;
  line-height: 22px;
}

.member-top-home i:before {
  display: inline-block;
  content: "\f015";
  font-size: 21px;
  padding-right: 5px;
}

.member-top-home:hover {
  color: #f2f2f2;
  text-decoration: underline;
}

.top-nav-menu {
  background: $orange;
  line-height: 36px;
  display: block;
  color: #fff;
  padding-left: 10px;
  width: 210px;
}

.top-nav-menu:after {
  content: "\f0c9";
  font-size: 20px;
  line-height: 20px;
  vertical-align: 0px;
  padding-left: 6px;
  position: relative;
  top: 2px;
}

.top-nav-menu:hover {
  color: #333;
}

.top-nav-sha,
.bg-tra-hang {
  background: $bg-tra-hang !important;
}

.bg-tra-hang {
  text-transform: uppercase;
  font-size: 11px;
  height: 28px;
  padding: 4px 0 4px 20px;
  line-height: 14px;
  overflow: hidden;
  color: #fff;
}

.bg-tra-hang li {
  float: left;
  width: 25%;
}

.bg-tra-hang li:before {
  float: left;
  display: inline-block;
  font-size: 24px;
  line-height: 28px;
  width: 36px;
  content: "\f0d1";
}

.bg-tra-hang li.giao-hang:before {
  content: "\f1f0";
}

.bg-tra-hang li.tra-hang:before {
  content: "\f021";
}

.bg-tra-hang li.hotline:before {
  content: "\f095";
}

.bg-tra-hang span {
  font-size: 14px;
}

.bg-tra-hang font {
  font-size: 11px;
}

.thread-sub-list {
  background: center no-repeat #fff;
  background-size: cover;
  margin-bottom: 20px;
  display: none;
}

.bg-global {
  background: $nav-bg !important;
}

.fa-icons {
  color: #090;
  width: 16px;
  height: 16px;
  font-size: 15px;
  border: 1px transparent solid;
  padding: 1px;
  border-radius: 3px;
  display: inline-block;
  text-align: center;
}

.fa-icons:hover {
  border-color: #999;
}

.fa-external-link:before {
  content: "\f08e";
}

.fa-edit:before {
  content: "\f040";
}

.fa-refresh:before {
  content: "\f021";
}

.fa-caret-up:before {
  content: "\f0aa";
}

.fa-caret-down:before {
  content: "\f0ab";
}

.fa-thumbs-up:before {
  content: "\f164";
}

.fa-thumbs-up-disabled {
  color: #666 !important;
}

.fa-send:before {
  content: "\f1da";
  color: $orange;
}

.fa-unlock-alt:before {
  content: "\f13e";
}

.fa-lock-alt:before,
.fa-unlock-alt-disable:before {
  content: "\f023";
  color: #333;
}

.fa-trash:before {
  content: "\f1f8";
}

.fa-star:before {
  content: "\f005";
}

.fa-phone:before {
  content: "\f095";
}

.fa-newspaper-o:before {
  content: "\f1ea";
}

.fa-facebook:before {
  content: "\f09a";
}

.fa-map-marker:before {
  content: "\f041";
}

.fa-envelope-o:before {
  content: "\f003";
}
  
  
');