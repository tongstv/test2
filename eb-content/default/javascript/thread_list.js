(function(){var banner_for_thread_list='';if(cid>0){for(var x in site_group){if(site_group[x].id==cid){banner_for_thread_list=site_group[x].bg;break}}}else if(str_th_banner_big!=''){banner_for_thread_list=str_th_banner_big}if(banner_for_thread_list!=''){setTimeout(function(){$('.thread-sub-list').show().html('<img src="'+banner_for_thread_list+'" width="'+$('.thread-sub-list').width()+'" />');$('.thread-sub-list img').load(function(){setTimeout(function(){$('.thread-sub-list').css({'background-image':'url(\''+banner_for_thread_list+'\')',height:$('.thread-sub-list img').height()+'px'}).html('&nbsp;')},600)})},100)}_global_js_eb.i_func.tim_theo_gia('oi_gia_list');var str='',sl='',change_title_menu='';
if(act=='thuonghieu'){change_title_menu='Th\u01b0\u01a1ng hi\u1ec7u n\u1ed5i b\u1eadt';for(var i=0;i<brand_group.length;i++){sl='';if(brand_group[i].id==thuonghieu_id)sl=' class="selected"';str+='<li><h3><a title="'+brand_group[i].ten+'" href="thuonghieu-'+brand_group[i].id+'/'+brand_group[i].seo+'/"'+sl+'>'+brand_group[i].ten+'</a></h3></li>'}}else if(cid>0){for(var i=0;i<site_group.length;i++){if(site_group[i].id==cid){str=(function(arr_bnt){for(var i=0,str='',sl='';i<arr_bnt.length;i++){sl='';if(arr_bnt[i].id==sid)sl=' class="selected"';str+='<li><h3><a href="'+_global_js_eb._c_link(arr_bnt[i].id,arr_bnt[i].seo,'s')+'"'+sl+'>'+arr_bnt[i].ten+'</a></h3>';str+=(function(arr_cnt){var str='',sl='';for(var i=0;i<arr_cnt.length;i++){
sl='';if(arr_cnt[i].id==fid){sl=' class="redcolor"'}str+='<h4><a href="'+_global_js_eb._c_link(arr_cnt[i].id,arr_cnt[i].seo,'f')+'"'+sl+'>'+arr_cnt[i].ten+'</a></h4>'}return str})(arr_bnt[i].cnt);str+='</li>'}return str})(site_group[i].bnt);break}}}else{change_title_menu='Danh m\u1ee5c s\u1ea3n ph\u1ea9m';for(var i=0;i<site_group.length;i++){str+='<li><h3><a href="'+_global_js_eb._c_link(site_group[i].id,site_group[i].seo)+'">'+site_group[i].ten+'</a></h3></li>'}}if(str==''){$('.hide-if-bnt-null').hide()}else{str='<ul>'+str+'</ul>';$('.thread-bnt-menu').html(str);if(change_title_menu!=''){$('.xem-theo-title').html(change_title_menu)}}if(qc_home_left.length>0){var modile_version=g_func.mb_v2(),ads_width=$('.ads-home-left').width(),
ads_height=300;for(var i=0,str='',s='',file_type='';i<qc_home_left.length;i++){file_type=qc_home_left[i].img.split('.');file_type=file_type[file_type.length-1];s='';if(file_type.toLowerCase()=='swf'){if(modile_version==false){s='<div style="position:relative;z-index:10;width:'+ads_width+'px;"><div align="center" style="width:'+ads_width+'px;height:'+ads_height+'px;position:absolute;left:0px;z-index:10"><a href="'+qc_home_left[i].lnk+'" target="_blank" rel="nofollow" style="line-height:'+ads_height+'px;height:'+ads_height+'px;display:block;">&nbsp;</a></div></div>'+'<embed src="'+qc_home_left[i].img+'" height="'+ads_height+'" align="middle" width="'+ads_width+'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" flashvars="clickTAG='+qc_home_left[i].lnk+'" allowscriptaccess="never" allowNetworking="internal" wmode="transparent" quality="high"></embed>';
}}else{s='<a href="'+qc_home_left[i].lnk+'" target="_blank"><img src="'+qc_home_left[i].img+'" width="'+ads_width+'" /></a>'}if(s!='')str+=s}$('.ads-home-left').html(str)}})();