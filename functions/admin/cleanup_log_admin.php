<?php $m='';$last30day=$date_time-(24*3600*30);$sql="DELETE FROM tbl_log_admin WHERE la_ngay < ".$last30day;$func->q($sql);die('<script type="text/javascript">parent.cleanup_func.cpl()</script>'); 
