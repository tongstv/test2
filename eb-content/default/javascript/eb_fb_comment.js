var fb_comments_count=0,count_fake_comment=$('#comment_list li').length;var eb_fb_comment={fb_timeout_connet:function(i){if(count_fake_comment>0&&window.location.href.split('9999').length>1){$('.comment-box').show().removeClass('d-none');return false}if($('.fb-comments').length>0){var a=$('.fb-comments').attr('fb-xfbml-state')||'';if(a!=''){setTimeout(function(){$('.comment-box').show().removeClass('d-none')},1000);return false}if(typeof i=='undefined'){i=30}i--;setTimeout(function(){if(i>1){eb_fb_comment.fb_timeout_connet(i)}},500)}},cao:function(i){if(typeof pid=='undefined'||pid<=0||typeof old_comments_count=='undefined'){console.log('old_comments_count not found');
return false}if(typeof i=='undefined'){i=30}i--;if(i>1){if(i<20){var fb_old_comment=old_comments_count-count_fake_comment;fb_comments_count=$('.fb_comments_count').html()||'';if(fb_comments_count==''){fb_comments_count=0}else{fb_comments_count=parseInt(fb_comments_count,10);if(isNaN(fb_comments_count)){fb_comments_count=0}}if(fb_comments_count>0){if(fb_comments_count!=fb_old_comment){var uri='guest.php?act=update_count_comment&n='+(fb_comments_count+count_fake_comment)+'&id='+pid,jd='_'+Math.random().toString().replace(/\./g,'_');$('<div id="'+jd+'" class=""></div>').appendTo('body');ajaxl(uri,jd,9)}return true}}setTimeout(function(){eb_fb_comment.cao(i)},500)}}};if(count_fake_comment>0){eb_fb_comment.fb_timeout_connet();
}setTimeout(function(){eb_fb_comment.cao()},1000);