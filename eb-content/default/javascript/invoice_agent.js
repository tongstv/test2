var arrDataBrowser=[{subString:"chrome",identity:"Chrome"},{subString:"firefox",
identity:"FireFox"},{subString:"opera mini",identity:"Opera Mini"},{subString:"opera",identity:"Opera"},{subString:"nokiabrowser",identity:"NokiaBrowser"},{subString:"mqqbrowser",identity:"MQQBrowser"},{subString:"iemobile",identity:"IE Mobile"},{subString:"msie",identity:"IE"},{subString:"trident",identity:"IE Trident"},{subString:"browserng",identity:"BrowserNG"},{subString:"dolfin",identity:"Dolphin"},{subString:"osre",identity:"OSRE"},{subString:"mobile safari",identity:"Mobile Safari"},{subString:"safari",identity:"Safari"},{subString:"ucbrowser",identity:"UCBrowser"},{subString:"ucbrowse",identity:"UCBrowser"},{subString:"ovibrowser",identity:"OviBrowser"},{subString:"x11",identity:"X11"}];var agent_os_browser={a:function(){$('.agent-to-os').each(function(){
var tit=$(this).html(),strUserAgent=tit.toLowerCase();$(this).attr({title:tit}).html(agent_os_browser.userOs(strUserAgent)+'/ '+agent_os_browser.userBrowser(strUserAgent)+' ('+agent_os_browser.userBrowserVersion(strUserAgent).split('.')[0]+')').removeClass('d-none')})},userOs:function(strUserAgent){var dataOS=[{subString:"iphone",identity:"iOS"},{subString:"ipad",identity:"iOS"},{subString:"mac",identity:"Mac OS"},{subString:"android",identity:"Android"},{subString:"linux",identity:"Linux"},{subString:"presto",identity:"Presto"},{subString:"untrusted",identity:"Untrusted"},{subString:"series60",identity:"Symbian 60"},{subString:"series40",identity:"Symbian 40"},{subString:"symbian",identity:"Symbian"
},{subString:"blackberry",identity:"BlackBerry"},{subString:"windows phone",identity:"Windows Phone"},{subString:"bada",identity:"Bada"},{subString:"win",identity:"Windows"},{subString:"rim",identity:"BlackBerry"},{subString:"midp",identity:"Java; MIDP"}],r='unknown';for(var i=0,arr=null;i<dataOS.length;i++){arr=dataOS[i].subString.toLowerCase().split('|');for(var j=0;j<arr.length;j++){if(strUserAgent.split(arr[j]).length>1){r=dataOS[i].identity;if(r=='iOS'){arr[j]=arr[j].replace('ip','iP');r=arr[j]+' '+r+(function(a){var s=' ';if(a.length>1){s+=a[1].split(' ')[1]}return s.split('_')[0]})(strUserAgent.split('os'))}return r}}}return r},userBrowser:function(strUserAgent){
for(var i=0;i<arrDataBrowser.length;i++){if(strUserAgent.split(arrDataBrowser[i].subString.toLowerCase()).length>1){return arrDataBrowser[i].identity}}var r='unknown';if(strUserAgent.split('applewebkit').length>1)r='Safari';return r},userBrowserVersion:function(strUserAgent){var br='';br=strUserAgent.split('msie ');if(br.length>1){return this.subVersionBrowser(br[1])}for(var i=0;i<arrDataBrowser.length;i++){br=strUserAgent.split(arrDataBrowser[i].subString.toLowerCase()+'/');if(br.length>1){return this.subVersionBrowser(br[1])}}br=strUserAgent.split('version/');if(br.length>1){return this.subVersionBrowser(br[1])}return'unknown'},subVersionBrowser:function(str){if(!str){return'';
}return str.split(' ')[0].split('/')[0].split(';')[0]}};(function(){var a=$('.hd_usertime-to-text').html()||'';if(a!=''){$('.hd_usertime-to-text').html(_date('d-m-Y H:i',a))}$('.agent-to-bit').each(function(){var a=$(this).html()||'',strUserAgent=a.toLowerCase(),inner='';if(a!=''){inner+=(function(o){var s='Unknown',o2=o.split('windows nt'),b=' 32 bit';if(o2.length>1){s='Window';o2=o2[1].split(')')[0];if(o2.split('wow64').length>1||o2.split('win64').length>1)b=' 64 bit';o2=o2.split(';')[0];if(o2.split('5.0').length>1)s='Win2k';else if(o2.split('5.1').length>1)s='WinXP';else if(o2.split('5.2').length>1)s='WinXP';else if(o2.split('nt 6.0').length>1)s='Vista';else if(o2.split('6.1').length>1)s='Win7';
else if(o2.split('6.2').length>1)s='Win8';else if(o2.split('6.3').length>1)s='Win8.1';s=' ('+s+b+')'}else{s=agent_os_browser.userOs(strUserAgent);s=' ('+s+')'}return s})(strUserAgent);$(this).attr({title:a}).html(inner)}});var agent=$('.agent-to-browser').html()||'';if(agent!=''){$('.agent-to-browser').attr({title:agent});agent=agent.toLowerCase();$('.agent-to-browser').html(agent_os_browser.userBrowser(agent)+' ('+agent_os_browser.userBrowserVersion(agent)+')')}})();(function(){var a=$('.referre-invoice-to-data').html(),arr=[],_get=function(par,a){var arr=a.split(par+'=');if(arr.length>1){return' | '+par+': <strong>'+arr[1].split('&')[0]+'</strong>'}return''},arr_q=['&q','&amp;q','&amp;p','&p'],str='';
a=a.replace('www.','').split('//');
if(a.length>1){a=a[1]}else{a=a[0]}if(a.replace(/\s/g,'').length>10){str+=a.replace('www.','').split('/')[0];str+=_get('utm_source',a);str+=_get('utm_medium',a);str+=_get('utm_campaign',a);for(var i=0;i<arr_q.length;i++){str+=_get(arr_q[i],a)}$('.referre-invoice-to-data').html(str).attr({title:a})}})();(function(){if(typeof ad_oder_change!='undefined'&&ad_oder_change==1){$('.ad-oder-change').show().removeClass('d-none')}})();