<?php if(isset($_GET['key'])&&($search_key=trim($_GET['key']))!=''){$strFilter=$strGlobalFilter;$search_key=$func->non_mark_seo($search_key);$search_key=str_replace('-',' ',$search_key);$explode=explode(' ',$search_key);$strSearch="";if(count($explode)==1){$strSearch=" trv_id LIKE '%{$search_key}%' OR trv_tags LIKE '%{$search_key}%' ";}else{if(count($explode)>4){$i=1;$strSearch_='';foreach($explode as $v){$strSearch_.=' '.$v;if($i%3==0){$strSearch_=trim($strSearch_);if($strSearch_!=''){if($strSearch==""){$strSearch.=" trv_tags LIKE '%{$strSearch_}%'";}else{$strSearch.=" OR trv_tags LIKE '%{$strSearch_}%'";}$strSearch_='';}else{$i--;}}$i++;}if($strSearch_!=''&&strlen($strSearch_)>5){$strSearch_=trim($strSearch_);if($strSearch_!=''){$strSearch.=" OR trv_tags LIKE '%{$strSearch_}%' ";}}}else{$strSearch=" trv_tags LIKE '%{$search_key}%' ";}}$strSearch=" AND (".$strSearch.")";$strFilter.=$strSearch;$sql=$func->q("SELECT trv_id, trv_tieude, trv_seo FROM tbl_tinraovat WHERE ".$strFilter." ORDER BY trv_ngaycapnhat DESC LIMIT 0, 10");$i=0;$search_list='';while($row=mysql_fetch_assoc($sql)){$p_link=$func->_p_link($row['trv_id'],$row['trv_seo']);$search_list.='<li><a title="'.$row['trv_tieude'].'" href="'.$p_link.'">'.$row['trv_tieude'].'</a></li>';}if($search_list==''){echo '<div><em>Không có dữ liệu</em></div>';}else{echo '<ul><li>Sản phẩm</li>'.$search_list.'</ul>';}}