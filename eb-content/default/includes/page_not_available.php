<?php $web_title='Du lieu khong ton tai - ';$main_content.='<h2>Không tìm thấy dữ liệu tương ứng</h2><p align="center" class="redcolor">Xin lỗi vì sự cố này, nhưng hệ thống không thể tìm thấy thông tin bạn đã yêu cầu.</p><p><strong>Bên dưới là một số đề nghị:</strong></p><ul>';if(isset($_SERVER['HTTP_REFERER'])&&$_SERVER['HTTP_REFERER']!=''){$main_content.='<li>Quay trở lại <a href="'.$_SERVER['HTTP_REFERER'].'"><strong>Trang bạn vừa xem</strong></a> và thử tìm kiếm lại.</li>';}$main_content.='<li>Trở về <a href="'.$web_link.'"><strong>Trang chủ</strong></a> sử dụng chức năng Tìm kiếm hoặc theo dõi những thông tin khác.</li><li>Duyệt qua <a target="_blank" href="http://blog.raovat.info"><strong>Trung Tâm Trợ giúp</strong></a> để tìm lời giải đáp cho vấn đề này.</p></ul>';$main_content='<div style="padding-left:10px">'.$main_content.'</div>'; 
