window.onload=function(){if(g_func.mb_v2()==true){(function(d){var ce=function(e,n){var a=document.createEvent("CustomEvent");a.initCustomEvent(n,true,true,e.target);e.target.dispatchEvent(a);a=null;return false},nm=true,sp={x:0,y:0},ep={x:0,y:0},touch={touchstart:function(e){sp={x:e.touches[0].pageX,y:e.touches[0].pageY}},touchmove:function(e){nm=false;ep={x:e.touches[0].pageX,y:e.touches[0].pageY}},touchend:function(e){if(nm){ce(e,'fc')}else{var x=ep.x-sp.x,xr=Math.abs(x),y=ep.y-sp.y,yr=Math.abs(y);if(Math.max(xr,yr)>20){ce(e,(xr>yr?(x<0?'swl':'swr'):(y<0?'swu':'swd')))}};nm=true},touchcancel:function(e){nm=false}};for(var a in touch){d.addEventListener(a,touch[a],false)}})(document);var ___eb_swipe_function=function(e){
};var ___eb_swipe_details_function=function(e){var a=e.type;if(a=='swl'){$('.product-details-avt-next').click()}else if(a=='swr'){$('.product-details-avt-prev').click()}};if(pid>0&&act=='details'){document.getElementById('swiper_details_list').addEventListener('swl',___eb_swipe_details_function,false);document.getElementById('swiper_details_list').addEventListener('swr',___eb_swipe_details_function,false)}}}