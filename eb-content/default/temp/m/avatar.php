<?php $threadInPage=8;$strLinkPager='member.php?act=avatar&id='.$id;$strFilter="WHERE tv_id > 0";if($id>0){$strFilter.=" AND trv_id = ".$id;}else if(isset($_GET['date_sp'])&&($date_sp=trim($_GET['date_sp']))!=''){$strLinkPager.='&date_sp='.$date_sp;$date_sp=explode(',',$date_sp);$strDateSp="";foreach($date_sp as $k=>$v){$v=strtotime($v);if($k>0)$strDateSp.=" OR";$strDateSp.=" (ul_ngay > ".$v." AND ul_ngay < ".($v+86400).")";}$strDateSp=" AND ".trim($strDateSp);$strFilter.=$strDateSp;}$sql=$func->q("SELECT ul_id FROM tbl_upload ".$strFilter);$totalThread=mysql_num_rows($sql);if($totalThread>0){$totalPage=ceil($totalThread/$threadInPage);if($page>$totalPage){$page=$totalPage;}$offset=($page-1)*$threadInPage;$sql=$func->q("SELECT ul_id, ul_link FROM tbl_upload ".$strFilter." ORDER BY ul_id DESC LIMIT ".$offset.", ".$threadInPage);$trv_galerry='';while($row=mysql_fetch_assoc($sql)){$ul_id=$row['ul_id'];$animate_id='null_'.$ul_id;$ul_link=$row['ul_link'];$img_link=$ul_link;$checkImg=explode('.',$img_link);if($checkImg[count($checkImg)-1]=='swf'){$img_link='images/flash-icon.jpg';}$trv_galerry.=' <li id="'.$animate_id.'"> <div class="ajxl-avt-hide"> <div><a title="Click để lấy link ảnh" href="javascript:void(copyPictureContent(\''.$ul_link.'\'));">Lấy link ảnh</a></div> <div><a title="Click để chèn ảnh vào bài viết" href="javascript:void(insertPictureContent(\''.$ul_link.'\'));">Chèn vào bài viết</a></div> <div><a href="javascript:void(addAvatar(\''.$ul_link.'\'));">Đặt làm ảnh đại diện</a></div> <div><a href="javascript:g_func.jconfirm(\'Xóa ảnh\',\'member.php?act=picture_del&id='.$ul_id.'\',\''.$animate_id.'\',1);">Xóa [<b>x</b>]</a></div> </div> <div><img src="'.$img_link.'" alt="'.$img_link.'" /></div> </li> ';}$trv_galerry='<div style="background:#fff;padding:6px;border:1px #ccc solid"><ul class="clearfix ajxl-avt">'.$trv_galerry.'</ul>';if($totalPage>1){$trv_galerry.=$func->part_page_ajax($page,$totalPage,$strLinkPager.'&p=','oiAvatar');}$trv_galerry.='</div>';}else{$trv_galerry='<b><em>Bạn không có Ảnh nào trong danh sách để chọn!</em></b>';}echo $trv_galerry; 