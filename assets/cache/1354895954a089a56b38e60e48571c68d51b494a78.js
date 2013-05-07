
(function($){$.fn.textareaCount=function(options,fn){var defaults={maxCharacterSize:-1,originalStyle:'originalTextareaInfo',warningStyle:'warningTextareaInfo',warningNumber:20,displayFormat:'#input characters | #words words'};var options=$.extend(defaults,options);var container=$(this);$("<div class='charleft'>&nbsp;</div>").insertAfter(container);var charLeftCss={'width':container.width()};var charLeftInfo=getNextCharLeftInformation(container);charLeftInfo.addClass(options.originalStyle);charLeftInfo.css(charLeftCss);var numInput=0;var maxCharacters=options.maxCharacterSize;var numLeft=0;var numWords=0;container.bind('keyup',function(event){limitTextAreaByCharacterCount();}).bind('mouseover',function(event){setTimeout(function(){limitTextAreaByCharacterCount();},10);}).bind('paste',function(event){setTimeout(function(){limitTextAreaByCharacterCount();},10);});function limitTextAreaByCharacterCount(){charLeftInfo.html(countByCharacters());if(typeof fn!='undefined'){fn.call(this,getInfo());}
return true;}
function countByCharacters(){var content=container.val();var contentLength=content.length;if(options.maxCharacterSize>0){if(contentLength>=options.maxCharacterSize){content=content.substring(0,options.maxCharacterSize);}
var newlineCount=getNewlineCount(content);var systemmaxCharacterSize=options.maxCharacterSize-newlineCount;if(!isWin()){systemmaxCharacterSize=options.maxCharacterSize}
if(contentLength>systemmaxCharacterSize){var originalScrollTopPosition=this.scrollTop;container.val(content.substring(0,systemmaxCharacterSize));this.scrollTop=originalScrollTopPosition;}
charLeftInfo.removeClass(options.warningStyle);if(systemmaxCharacterSize-contentLength<=options.warningNumber){charLeftInfo.addClass(options.warningStyle);}
numInput=container.val().length+newlineCount;if(!isWin()){numInput=container.val().length;}
numWords=countWord(getCleanedWordString(container.val()));numLeft=maxCharacters-numInput;}else{var newlineCount=getNewlineCount(content);numInput=container.val().length+newlineCount;if(!isWin()){numInput=container.val().length;}
numWords=countWord(getCleanedWordString(container.val()));}
return formatDisplayInfo();}
function formatDisplayInfo(){var format=options.displayFormat;format=format.replace('#input',numInput);format=format.replace('#words',numWords);if(maxCharacters>0){format=format.replace('#max',maxCharacters);format=format.replace('#left',numLeft);}
return format;}
function getInfo(){var info={input:numInput,max:maxCharacters,left:numLeft,words:numWords};return info;}
function getNextCharLeftInformation(container){return container.next('.charleft');}
function isWin(){var strOS=navigator.appVersion;if(strOS.toLowerCase().indexOf('win')!=-1){return true;}
return false;}
function getNewlineCount(content){var newlineCount=0;for(var i=0;i<content.length;i++){if(content.charAt(i)=='\n'){newlineCount++;}}
return newlineCount;}
function getCleanedWordString(content){var fullStr=content+" ";var initial_whitespace_rExp=/^[^A-Za-z0-9]+/gi;var left_trimmedStr=fullStr.replace(initial_whitespace_rExp,"");var non_alphanumerics_rExp=rExp=/[^A-Za-z0-9]+/gi;var cleanedStr=left_trimmedStr.replace(non_alphanumerics_rExp," ");var splitString=cleanedStr.split(" ");return splitString;}
function countWord(cleanedWordString){var word_count=cleanedWordString.length-1;return word_count;}};})(jQuery);

$(document).ready(function(){var options2={'maxCharacterSize':256,'originalStyle':'originalTextareaInfo','warningStyle':'warningTextareaInfo','warningNumber':40,'displayFormat':'#input/#max | #words words'};$('#keyword').textareaCount(options2);$('#datepicker').datepicker({changeMonth:true,changeYear:true,dateFormat:"yy/mm/dd",showOn:'both',buttonText:'Choose',showAnim:"drop",showOption:{direction:"down"}});});

(function(win,doc,undefined){var settings,body,fakeBody,windowLoaded,head,docElem=doc.documentElement,testPass=false,mediaCookieA,mediaCookieB,toggledMedia=[];if(doc.getElementsByTagName){head=doc.getElementsByTagName('head')[0]||docElem;}
else{head=docElem;}
win.enhance=function(options){options=options||{};settings={};for(var name in enhance.defaultSettings){var option=options[name];settings[name]=option!==undefined?option:enhance.defaultSettings[name];}
for(var test in options.addTests){settings.tests[test]=options.addTests[test];}
if(docElem.className.indexOf(settings.testName)===-1){docElem.className+=' '+settings.testName;}
mediaCookieA=settings.testName+'-toggledmediaA';mediaCookieB=settings.testName+'-toggledmediaB';toggledMedia=[readCookie(mediaCookieA),readCookie(mediaCookieB)];setTimeout(function(){if(!testPass){removeHTMLClass();}},3000);runTests();applyDocReadyHack();windowLoad(function(){windowLoaded=true;});};enhance.defaultTests={getById:function(){return!!doc.getElementById;},getByTagName:function(){return!!doc.getElementsByTagName;},createEl:function(){return!!doc.createElement;},boxmodel:function(){var newDiv=doc.createElement('div');newDiv.style.cssText='width: 1px; padding: 1px;';body.appendChild(newDiv);var divWidth=newDiv.offsetWidth;body.removeChild(newDiv);return divWidth===3;},position:function(){var newDiv=doc.createElement('div');newDiv.style.cssText='position: absolute; left: 10px;';body.appendChild(newDiv);var divLeft=newDiv.offsetLeft;body.removeChild(newDiv);return divLeft===10;},floatClear:function(){var pass=false,newDiv=doc.createElement('div'),style='style="width: 5px; height: 5px; float: left;"';newDiv.innerHTML='<div '+style+'></div><div '+style+'></div>';body.appendChild(newDiv);var childNodes=newDiv.childNodes,topA=childNodes[0].offsetTop,divB=childNodes[1],topB=divB.offsetTop;if(topA===topB){divB.style.clear='left';topB=divB.offsetTop;if(topA!==topB){pass=true;}}
body.removeChild(newDiv);return pass;},heightOverflow:function(){var newDiv=doc.createElement('div');newDiv.innerHTML='<div style="height: 10px;"></div>';newDiv.style.cssText='overflow: hidden; height: 0;';body.appendChild(newDiv);var divHeight=newDiv.offsetHeight;body.removeChild(newDiv);return divHeight===0;},ajax:function(){var xmlhttp=false,index=-1,factory,XMLHttpFactories=[function(){return new XMLHttpRequest()},function(){return new ActiveXObject("Msxml2.XMLHTTP")},function(){return new ActiveXObject("Msxml3.XMLHTTP")},function(){return new ActiveXObject("Microsoft.XMLHTTP")}];while((factory=XMLHttpFactories[++index])){try{xmlhttp=factory();}
catch(e){continue;}
break;}
return!!xmlhttp;},resize:function(){return win.onresize!=false;},print:function(){return!!win.print;}};enhance.defaultSettings={testName:'enhanced',loadScripts:[],loadStyles:[],queueLoading:true,appendToggleLink:true,forcePassText:'View high-bandwidth version',forceFailText:'View low-bandwidth version',tests:enhance.defaultTests,addTests:{},alertOnFailure:false,onPass:function(){},onFail:function(){},onLoadError:addIncompleteClass,onScriptsLoaded:function(){}};function cookiesSupported(){return!!doc.cookie;}
enhance.cookiesSupported=cookiesSupported();function forceFail(){createCookie(settings.testName,'fail');win.location.reload();}
if(enhance.cookiesSupported){enhance.forceFail=forceFail;}
function forcePass(){createCookie(settings.testName,'pass');win.location.reload();}
if(enhance.cookiesSupported){enhance.forcePass=forcePass;}
function reTest(){eraseCookie(settings.testName);win.location.reload();}
if(enhance.cookiesSupported){enhance.reTest=reTest;}
function addFakeBody(){fakeBody=doc.createElement('body');docElem.insertBefore(fakeBody,docElem.firstChild);body=fakeBody;}
function removeFakeBody(){docElem.removeChild(fakeBody);body=doc.body;}
function runTests(){var result=readCookie(settings.testName);if(result){if(result==='pass'){enhancePage();settings.onPass();}else{settings.onFail();removeHTMLClass();}
if(settings.appendToggleLink){windowLoad(function(){appendToggleLinks(result);});}}
else{var pass=true;addFakeBody();for(var name in settings.tests){pass=settings.tests[name]();if(!pass){if(settings.alertOnFailure){alert(name+' failed');}
break;}}
removeFakeBody();result=pass?'pass':'fail';createCookie(settings.testName,result);if(pass){enhancePage();settings.onPass();}
else{settings.onFail();removeHTMLClass();}
if(settings.appendToggleLink){windowLoad(function(){appendToggleLinks(result);});}}}
function windowLoad(callback){if(windowLoaded){callback();}else{var oldonload=win.onload
win.onload=function(){if(oldonload){oldonload();}
callback();}}}
function appendToggleLinks(result){if(!settings.appendToggleLink||!enhance.cookiesSupported){return;}
if(result){var a=doc.createElement('a');a.href="#";a.className=settings.testName+'_toggleResult';a.innerHTML=result==='pass'?settings.forceFailText:settings.forcePassText;a.onclick=result==='pass'?enhance.forceFail:enhance.forcePass;doc.getElementsByTagName('body')[0].appendChild(a);}}
function removeHTMLClass(){docElem.className=docElem.className.replace(settings.testName,'');}
function enhancePage(){testPass=true;if(settings.loadStyles.length){appendStyles();}
if(settings.loadScripts.length){appendScripts();}
else{settings.onScriptsLoaded();}}
function toggleMedia(mediaA,mediaB){if(readCookie(mediaCookieA)&&readCookie(mediaCookieB)){eraseCookie(mediaCookieA);eraseCookie(mediaCookieB);}
else{createCookie(mediaCookieA,mediaA);createCookie(mediaCookieB,mediaB);}
win.location.reload();}
enhance.toggleMedia=toggleMedia;function mediaSwitch(q){if(toggledMedia.length==2){if(q==toggledMedia[0]){q=toggledMedia[1];}
else if(q==toggledMedia[1]){q=toggledMedia[0];}}
return q;}
function addIncompleteClass(){var errorClass=settings.testName+'-incomplete';if(docElem.className.indexOf(errorClass)===-1){docElem.className+=' '+errorClass;}}
function appendStyles(){var index=-1,item;while((item=settings.loadStyles[++index])){var link=doc.createElement('link');link.type='text/css';link.rel='stylesheet';link.onerror=settings.onLoadError;if(typeof item==='string'){link.href=item;head.appendChild(link);}
else{if(item['media']){item['media']=mediaSwitch(item['media']);}
if(item['excludemedia']){item['excludemedia']=mediaSwitch(item['excludemedia']);}
for(var attr in item){if(attr!=='iecondition'&&attr!=='excludemedia'){link.setAttribute(attr,item[attr]);}}
var applies=true;if(item['media']&&item['media']!=='print'&&item['media']!=='projection'&&item['media']!=='speech'&&item['media']!=='aural'&&item['media']!=='braille'){applies=mediaquery(item['media']);}
if(item['excludemedia']){applies=!mediaquery(item['excludemedia']);}
if(item['iecondition']){applies=isIE(item['iecondition']);}
if(applies){head.appendChild(link);}}}}
var isIE=(function(){var cache={},b;return function(condition){if(true){return false;}
var cc='IE';if(condition){if(condition!=='all'){if(!isNaN(parseFloat(condition))){cc+=' '+condition;}
else{cc=condition;}}}
if(cache[cc]===undefined){b=b||doc.createElement('B');b.innerHTML='<!--[if '+cc+']><b></b><![endif]-->';cache[cc]=!!b.getElementsByTagName('b').length;}
return cache[cc];}})();var mediaquery=(function(){var cache={},testDiv=doc.createElement('div');testDiv.setAttribute('id','ejs-qtest');return function(q){if(cache[q]===undefined){addFakeBody();var styleBlock=doc.createElement('style');styleBlock.type="text/css";head.appendChild(styleBlock);var cssrule='@media '+q+' { #ejs-qtest { position: absolute; width: 10px; } }';if(styleBlock.styleSheet){styleBlock.styleSheet.cssText=cssrule;}
else{styleBlock.appendChild(doc.createTextNode(cssrule));}
body.appendChild(testDiv);var divWidth=testDiv.offsetWidth;body.removeChild(testDiv);head.removeChild(styleBlock);removeFakeBody();cache[q]=(divWidth==10);}
return cache[q];}})();enhance.query=mediaquery;function appendScripts(){settings.queueLoading?appendScriptsSync():appendScriptsAsync();}
function appendScriptsSync(){var queue=[].concat(settings.loadScripts);function next(){if(queue.length===0){return false;}
var item=queue.shift(),script=createScriptTag(item),done=false;if(script){script.onload=script.onreadystatechange=function(){if(!done&&(!this.readyState||this.readyState=='loaded'||this.readyState=='complete')){done=true;if(next()===false){settings.onScriptsLoaded();}
this.onload=this.onreadystatechange=null;}}
head.insertBefore(script,head.firstChild);}
else{return next();}}
next();}
function appendScriptsAsync(){var index=-1,item;while((item=settings.loadScripts[++index])){var script=createScriptTag(item);if(script){head.insertBefore(script,head.firstChild);}}
settings.onScriptsLoaded();}
function createScriptTag(item){var script=doc.createElement('script');script.type='text/javascript';script.onerror=settings.onLoadError;if(typeof item==='string'){script.src=item;return script;}
else{if(item['media']){item['media']=mediaSwitch(item['media']);}
if(item['excludemedia']){item['excludemedia']=mediaSwitch(item['excludemedia']);}
for(var attr in item){if(attr!=='iecondition'&&attr!=='media'&&attr!=='excludemedia'){script.setAttribute(attr,item[attr]);}}
var applies=true;if(item['media']){applies=mediaquery(item['media']);}
if(item['excludemedia']){applies=!mediaquery(item['excludemedia']);}
if(item['iecondition']){applies=isIE(item['iecondition']);}
return applies?script:false;}}
function createCookie(name,value,days){days=days||90;var date=new Date();date.setTime(date.getTime()+(days*24*60*60*1000));var expires="; expires="+date.toGMTString();doc.cookie=name+"="+value+expires+"; path=/";}
function readCookie(name){var nameEQ=name+"=";var ca=doc.cookie.split(';');for(var i=0;i<ca.length;i++){var c=ca[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(nameEQ)==0)return c.substring(nameEQ.length,c.length);}
return null;}
function eraseCookie(name){createCookie(name,"",-1);}
function applyDocReadyHack(){if(doc.readyState==null&&doc.addEventListener){doc.addEventListener("DOMContentLoaded",function DOMContentLoaded(){doc.removeEventListener("DOMContentLoaded",DOMContentLoaded,false);doc.readyState="complete";},false);doc.readyState="loading";}}})(window,document);

if(!document.createElement('canvas').getContext){(function(){var m=Math;var mr=m.round;var ms=m.sin;var mc=m.cos;var abs=m.abs;var sqrt=m.sqrt;var Z=10;var Z2=Z/2;function getContext(){return this.context_||(this.context_=new CanvasRenderingContext2D_(this));}
var slice=Array.prototype.slice;function bind(f,obj,var_args){var a=slice.call(arguments,2);return function(){return f.apply(obj,a.concat(slice.call(arguments)));};}
var G_vmlCanvasManager_={init:function(opt_doc){if(/MSIE/.test(navigator.userAgent)&&!window.opera){var doc=opt_doc||document;doc.createElement('canvas');if(doc.readyState!=="complete"){doc.attachEvent('onreadystatechange',bind(this.init_,this,doc));}else{this.init_(doc);}}},init_:function(doc){if(!doc.namespaces['g_vml_']){doc.namespaces.add('g_vml_','urn:schemas-microsoft-com:vml','#default#VML');}
if(!doc.namespaces['g_o_']){doc.namespaces.add('g_o_','urn:schemas-microsoft-com:office:office','#default#VML');}
if(!doc.styleSheets['ex_canvas_']){var ss=doc.createStyleSheet();ss.owningElement.id='ex_canvas_';ss.cssText='canvas{display:inline-block;overflow:hidden;'+'text-align:left;width:300px;height:150px}'+'g_vml_\\:*{behavior:url(#default#VML)}'+'g_o_\\:*{behavior:url(#default#VML)}';}
var els=doc.getElementsByTagName('canvas');for(var i=0;i<els.length;i++){this.initElement(els[i]);}},initElement:function(el){if(!el.getContext){el.getContext=getContext;el.innerHTML='';el.attachEvent('onpropertychange',onPropertyChange);el.attachEvent('onresize',onResize);var attrs=el.attributes;if(attrs.width&&attrs.width.specified){el.style.width=attrs.width.nodeValue+'px';}else{el.width=el.clientWidth;}
if(attrs.height&&attrs.height.specified){el.style.height=attrs.height.nodeValue+'px';}else{el.height=el.clientHeight;}}
return el;}};function onPropertyChange(e){var el=e.srcElement;switch(e.propertyName){case'width':el.style.width=el.attributes.width.nodeValue+'px';el.getContext().clearRect();break;case'height':el.style.height=el.attributes.height.nodeValue+'px';el.getContext().clearRect();break;}}
function onResize(e){var el=e.srcElement;if(el.firstChild){el.firstChild.style.width=el.clientWidth+'px';el.firstChild.style.height=el.clientHeight+'px';}}
G_vmlCanvasManager_.init();var dec2hex=[];for(var i=0;i<16;i++){for(var j=0;j<16;j++){dec2hex[i*16+j]=i.toString(16)+j.toString(16);}}
function createMatrixIdentity(){return[[1,0,0],[0,1,0],[0,0,1]];}
function matrixMultiply(m1,m2){var result=createMatrixIdentity();for(var x=0;x<3;x++){for(var y=0;y<3;y++){var sum=0;for(var z=0;z<3;z++){sum+=m1[x][z]*m2[z][y];}
result[x][y]=sum;}}
return result;}
function copyState(o1,o2){o2.fillStyle=o1.fillStyle;o2.lineCap=o1.lineCap;o2.lineJoin=o1.lineJoin;o2.lineWidth=o1.lineWidth;o2.miterLimit=o1.miterLimit;o2.shadowBlur=o1.shadowBlur;o2.shadowColor=o1.shadowColor;o2.shadowOffsetX=o1.shadowOffsetX;o2.shadowOffsetY=o1.shadowOffsetY;o2.strokeStyle=o1.strokeStyle;o2.globalAlpha=o1.globalAlpha;o2.arcScaleX_=o1.arcScaleX_;o2.arcScaleY_=o1.arcScaleY_;o2.lineScale_=o1.lineScale_;}
function processStyle(styleString){var str,alpha=1;styleString=String(styleString);if(styleString.substring(0,3)=='rgb'){var start=styleString.indexOf('(',3);var end=styleString.indexOf(')',start+1);var guts=styleString.substring(start+1,end).split(',');str='#';for(var i=0;i<3;i++){str+=dec2hex[Number(guts[i])];}
if(guts.length==4&&styleString.substr(3,1)=='a'){alpha=guts[3];}}else{str=styleString;}
return{color:str,alpha:alpha};}
function processLineCap(lineCap){switch(lineCap){case'butt':return'flat';case'round':return'round';case'square':default:return'square';}}
function CanvasRenderingContext2D_(surfaceElement){this.m_=createMatrixIdentity();this.mStack_=[];this.aStack_=[];this.currentPath_=[];this.strokeStyle='#000';this.fillStyle='#000';this.lineWidth=1;this.lineJoin='miter';this.lineCap='butt';this.miterLimit=Z*1;this.globalAlpha=1;this.canvas=surfaceElement;var el=surfaceElement.ownerDocument.createElement('div');el.style.width=surfaceElement.clientWidth+'px';el.style.height=surfaceElement.clientHeight+'px';el.style.overflow='hidden';el.style.position='absolute';surfaceElement.appendChild(el);this.element_=el;this.arcScaleX_=1;this.arcScaleY_=1;this.lineScale_=1;}
var contextPrototype=CanvasRenderingContext2D_.prototype;contextPrototype.clearRect=function(){this.element_.innerHTML='';};contextPrototype.beginPath=function(){this.currentPath_=[];};contextPrototype.moveTo=function(aX,aY){var p=this.getCoords_(aX,aY);this.currentPath_.push({type:'moveTo',x:p.x,y:p.y});this.currentX_=p.x;this.currentY_=p.y;};contextPrototype.lineTo=function(aX,aY){var p=this.getCoords_(aX,aY);this.currentPath_.push({type:'lineTo',x:p.x,y:p.y});this.currentX_=p.x;this.currentY_=p.y;};contextPrototype.bezierCurveTo=function(aCP1x,aCP1y,aCP2x,aCP2y,aX,aY){var p=this.getCoords_(aX,aY);var cp1=this.getCoords_(aCP1x,aCP1y);var cp2=this.getCoords_(aCP2x,aCP2y);bezierCurveTo(this,cp1,cp2,p);};function bezierCurveTo(self,cp1,cp2,p){self.currentPath_.push({type:'bezierCurveTo',cp1x:cp1.x,cp1y:cp1.y,cp2x:cp2.x,cp2y:cp2.y,x:p.x,y:p.y});self.currentX_=p.x;self.currentY_=p.y;}
contextPrototype.quadraticCurveTo=function(aCPx,aCPy,aX,aY){var cp=this.getCoords_(aCPx,aCPy);var p=this.getCoords_(aX,aY);var cp1={x:this.currentX_+2.0/3.0*(cp.x-this.currentX_),y:this.currentY_+2.0/3.0*(cp.y-this.currentY_)};var cp2={x:cp1.x+(p.x-this.currentX_)/3.0,y:cp1.y+(p.y-this.currentY_)/3.0};bezierCurveTo(this,cp1,cp2,p);};contextPrototype.arc=function(aX,aY,aRadius,aStartAngle,aEndAngle,aClockwise){aRadius*=Z;var arcType=aClockwise?'at':'wa';var xStart=aX+mc(aStartAngle)*aRadius-Z2;var yStart=aY+ms(aStartAngle)*aRadius-Z2;var xEnd=aX+mc(aEndAngle)*aRadius-Z2;var yEnd=aY+ms(aEndAngle)*aRadius-Z2;if(xStart==xEnd&&!aClockwise){xStart+=0.125;}
var p=this.getCoords_(aX,aY);var pStart=this.getCoords_(xStart,yStart);var pEnd=this.getCoords_(xEnd,yEnd);this.currentPath_.push({type:arcType,x:p.x,y:p.y,radius:aRadius,xStart:pStart.x,yStart:pStart.y,xEnd:pEnd.x,yEnd:pEnd.y});};contextPrototype.rect=function(aX,aY,aWidth,aHeight){this.moveTo(aX,aY);this.lineTo(aX+aWidth,aY);this.lineTo(aX+aWidth,aY+aHeight);this.lineTo(aX,aY+aHeight);this.closePath();};contextPrototype.strokeRect=function(aX,aY,aWidth,aHeight){var oldPath=this.currentPath_;this.beginPath();this.moveTo(aX,aY);this.lineTo(aX+aWidth,aY);this.lineTo(aX+aWidth,aY+aHeight);this.lineTo(aX,aY+aHeight);this.closePath();this.stroke();this.currentPath_=oldPath;};contextPrototype.fillRect=function(aX,aY,aWidth,aHeight){var oldPath=this.currentPath_;this.beginPath();this.moveTo(aX,aY);this.lineTo(aX+aWidth,aY);this.lineTo(aX+aWidth,aY+aHeight);this.lineTo(aX,aY+aHeight);this.closePath();this.fill();this.currentPath_=oldPath;};contextPrototype.createLinearGradient=function(aX0,aY0,aX1,aY1){var gradient=new CanvasGradient_('gradient');gradient.x0_=aX0;gradient.y0_=aY0;gradient.x1_=aX1;gradient.y1_=aY1;return gradient;};contextPrototype.createRadialGradient=function(aX0,aY0,aR0,aX1,aY1,aR1){var gradient=new CanvasGradient_('gradientradial');gradient.x0_=aX0;gradient.y0_=aY0;gradient.r0_=aR0;gradient.x1_=aX1;gradient.y1_=aY1;gradient.r1_=aR1;return gradient;};contextPrototype.drawImage=function(image,var_args){var dx,dy,dw,dh,sx,sy,sw,sh;var oldRuntimeWidth=image.runtimeStyle.width;var oldRuntimeHeight=image.runtimeStyle.height;image.runtimeStyle.width='auto';image.runtimeStyle.height='auto';var w=image.width;var h=image.height;image.runtimeStyle.width=oldRuntimeWidth;image.runtimeStyle.height=oldRuntimeHeight;if(arguments.length==3){dx=arguments[1];dy=arguments[2];sx=sy=0;sw=dw=w;sh=dh=h;}else if(arguments.length==5){dx=arguments[1];dy=arguments[2];dw=arguments[3];dh=arguments[4];sx=sy=0;sw=w;sh=h;}else if(arguments.length==9){sx=arguments[1];sy=arguments[2];sw=arguments[3];sh=arguments[4];dx=arguments[5];dy=arguments[6];dw=arguments[7];dh=arguments[8];}else{throw Error('Invalid number of arguments');}
var d=this.getCoords_(dx,dy);var w2=sw/2;var h2=sh/2;var vmlStr=[];var W=10;var H=10;vmlStr.push(' <g_vml_:group',' coordsize="',Z*W,',',Z*H,'"',' coordorigin="0,0"',' style="width:',W,'px;height:',H,'px;position:absolute;');if(this.m_[0][0]!=1||this.m_[0][1]){var filter=[];filter.push('M11=',this.m_[0][0],',','M12=',this.m_[1][0],',','M21=',this.m_[0][1],',','M22=',this.m_[1][1],',','Dx=',mr(d.x/Z),',','Dy=',mr(d.y/Z),'');var max=d;var c2=this.getCoords_(dx+dw,dy);var c3=this.getCoords_(dx,dy+dh);var c4=this.getCoords_(dx+dw,dy+dh);max.x=m.max(max.x,c2.x,c3.x,c4.x);max.y=m.max(max.y,c2.y,c3.y,c4.y);vmlStr.push('padding:0 ',mr(max.x/Z),'px ',mr(max.y/Z),'px 0;filter:progid:DXImageTransform.Microsoft.Matrix(',filter.join(''),", sizingmethod='clip');")}else{vmlStr.push('top:',mr(d.y/Z),'px;left:',mr(d.x/Z),'px;');}
vmlStr.push(' ">','<g_vml_:image src="',image.src,'"',' style="width:',Z*dw,'px;',' height:',Z*dh,'px;"',' cropleft="',sx/w,'"',' croptop="',sy/h,'"',' cropright="',(w-sx-sw)/w,'"',' cropbottom="',(h-sy-sh)/h,'"',' />','</g_vml_:group>');this.element_.insertAdjacentHTML('BeforeEnd',vmlStr.join(''));};contextPrototype.stroke=function(aFill){var lineStr=[];var lineOpen=false;var a=processStyle(aFill?this.fillStyle:this.strokeStyle);var color=a.color;var opacity=a.alpha*this.globalAlpha;var W=10;var H=10;lineStr.push('<g_vml_:shape',' filled="',!!aFill,'"',' style="position:absolute;width:',W,'px;height:',H,'px;"',' coordorigin="0 0" coordsize="',Z*W,' ',Z*H,'"',' stroked="',!aFill,'"',' path="');var newSeq=false;var min={x:null,y:null};var max={x:null,y:null};for(var i=0;i<this.currentPath_.length;i++){var p=this.currentPath_[i];var c;switch(p.type){case'moveTo':c=p;lineStr.push(' m ',mr(p.x),',',mr(p.y));break;case'lineTo':lineStr.push(' l ',mr(p.x),',',mr(p.y));break;case'close':lineStr.push(' x ');p=null;break;case'bezierCurveTo':lineStr.push(' c ',mr(p.cp1x),',',mr(p.cp1y),',',mr(p.cp2x),',',mr(p.cp2y),',',mr(p.x),',',mr(p.y));break;case'at':case'wa':lineStr.push(' ',p.type,' ',mr(p.x-this.arcScaleX_*p.radius),',',mr(p.y-this.arcScaleY_*p.radius),' ',mr(p.x+this.arcScaleX_*p.radius),',',mr(p.y+this.arcScaleY_*p.radius),' ',mr(p.xStart),',',mr(p.yStart),' ',mr(p.xEnd),',',mr(p.yEnd));break;}
if(p){if(min.x==null||p.x<min.x){min.x=p.x;}
if(max.x==null||p.x>max.x){max.x=p.x;}
if(min.y==null||p.y<min.y){min.y=p.y;}
if(max.y==null||p.y>max.y){max.y=p.y;}}}
lineStr.push(' ">');if(!aFill){var lineWidth=this.lineScale_*this.lineWidth;if(lineWidth<1){opacity*=lineWidth;}
lineStr.push('<g_vml_:stroke',' opacity="',opacity,'"',' joinstyle="',this.lineJoin,'"',' miterlimit="',this.miterLimit,'"',' endcap="',processLineCap(this.lineCap),'"',' weight="',lineWidth,'px"',' color="',color,'" />');}else if(typeof this.fillStyle=='object'){var fillStyle=this.fillStyle;var angle=0;var focus={x:0,y:0};var shift=0;var expansion=1;if(fillStyle.type_=='gradient'){var x0=fillStyle.x0_/this.arcScaleX_;var y0=fillStyle.y0_/this.arcScaleY_;var x1=fillStyle.x1_/this.arcScaleX_;var y1=fillStyle.y1_/this.arcScaleY_;var p0=this.getCoords_(x0,y0);var p1=this.getCoords_(x1,y1);var dx=p1.x-p0.x;var dy=p1.y-p0.y;angle=Math.atan2(dx,dy)*180/Math.PI;if(angle<0){angle+=360;}
if(angle<1e-6){angle=0;}}else{var p0=this.getCoords_(fillStyle.x0_,fillStyle.y0_);var width=max.x-min.x;var height=max.y-min.y;focus={x:(p0.x-min.x)/width,y:(p0.y-min.y)/height};width/=this.arcScaleX_*Z;height/=this.arcScaleY_*Z;var dimension=m.max(width,height);shift=2*fillStyle.r0_/dimension;expansion=2*fillStyle.r1_/dimension-shift;}
var stops=fillStyle.colors_;stops.sort(function(cs1,cs2){return cs1.offset-cs2.offset;});var length=stops.length;var color1=stops[0].color;var color2=stops[length-1].color;var opacity1=stops[0].alpha*this.globalAlpha;var opacity2=stops[length-1].alpha*this.globalAlpha;var colors=[];for(var i=0;i<length;i++){var stop=stops[i];colors.push(stop.offset*expansion+shift+' '+stop.color);}
lineStr.push('<g_vml_:fill type="',fillStyle.type_,'"',' method="none" focus="100%"',' color="',color1,'"',' color2="',color2,'"',' colors="',colors.join(','),'"',' opacity="',opacity2,'"',' g_o_:opacity2="',opacity1,'"',' angle="',angle,'"',' focusposition="',focus.x,',',focus.y,'" />');}else{lineStr.push('<g_vml_:fill color="',color,'" opacity="',opacity,'" />');}
lineStr.push('</g_vml_:shape>');this.element_.insertAdjacentHTML('beforeEnd',lineStr.join(''));};contextPrototype.fill=function(){this.stroke(true);}
contextPrototype.closePath=function(){this.currentPath_.push({type:'close'});};contextPrototype.getCoords_=function(aX,aY){var m=this.m_;return{x:Z*(aX*m[0][0]+aY*m[1][0]+m[2][0])-Z2,y:Z*(aX*m[0][1]+aY*m[1][1]+m[2][1])-Z2}};contextPrototype.save=function(){var o={};copyState(this,o);this.aStack_.push(o);this.mStack_.push(this.m_);this.m_=matrixMultiply(createMatrixIdentity(),this.m_);};contextPrototype.restore=function(){copyState(this.aStack_.pop(),this);this.m_=this.mStack_.pop();};function matrixIsFinite(m){for(var j=0;j<3;j++){for(var k=0;k<2;k++){if(!isFinite(m[j][k])||isNaN(m[j][k])){return false;}}}
return true;}
function setM(ctx,m,updateLineScale){if(!matrixIsFinite(m)){return;}
ctx.m_=m;if(updateLineScale){var det=m[0][0]*m[1][1]-m[0][1]*m[1][0];ctx.lineScale_=sqrt(abs(det));}}
contextPrototype.translate=function(aX,aY){var m1=[[1,0,0],[0,1,0],[aX,aY,1]];setM(this,matrixMultiply(m1,this.m_),false);};contextPrototype.rotate=function(aRot){var c=mc(aRot);var s=ms(aRot);var m1=[[c,s,0],[-s,c,0],[0,0,1]];setM(this,matrixMultiply(m1,this.m_),false);};contextPrototype.scale=function(aX,aY){this.arcScaleX_*=aX;this.arcScaleY_*=aY;var m1=[[aX,0,0],[0,aY,0],[0,0,1]];setM(this,matrixMultiply(m1,this.m_),true);};contextPrototype.transform=function(m11,m12,m21,m22,dx,dy){var m1=[[m11,m12,0],[m21,m22,0],[dx,dy,1]];setM(this,matrixMultiply(m1,this.m_),true);};contextPrototype.setTransform=function(m11,m12,m21,m22,dx,dy){var m=[[m11,m12,0],[m21,m22,0],[dx,dy,1]];setM(this,m,true);};contextPrototype.clip=function(){};contextPrototype.arcTo=function(){};contextPrototype.createPattern=function(){return new CanvasPattern_;};function CanvasGradient_(aType){this.type_=aType;this.x0_=0;this.y0_=0;this.r0_=0;this.x1_=0;this.y1_=0;this.r1_=0;this.colors_=[];}
CanvasGradient_.prototype.addColorStop=function(aOffset,aColor){aColor=processStyle(aColor);this.colors_.push({offset:aOffset,color:aColor.color,alpha:aColor.alpha});};function CanvasPattern_(){}
G_vmlCanvasManager=G_vmlCanvasManager_;CanvasRenderingContext2D=CanvasRenderingContext2D_;CanvasGradient=CanvasGradient_;CanvasPattern=CanvasPattern_;})();}

(function($)
{$.fn.document=function()
{var element=this[0];if(element.nodeName.toLowerCase()=='iframe')
return element.contentWindow.document;else
return $(this);};$.fn.documentSelection=function()
{var element=this[0];if(element.contentWindow.document.selection)
return element.contentWindow.document.selection.createRange().text;else
return element.contentWindow.getSelection().toString();};$.fn.wysiwyg=function(options)
{if(arguments.length>0&&arguments[0].constructor==String)
{var action=arguments[0].toString();var params=[];for(var i=1;i<arguments.length;i++)
params[i-1]=arguments[i];if(action in Wysiwyg)
{return this.each(function()
{$.data(this,'wysiwyg').designMode();Wysiwyg[action].apply(this,params);});}
else return this;}
var controls={};if(options&&options.controls)
{var controls=options.controls;delete options.controls;}
var options=$.extend({html:'<'+'?xml version="1.0" encoding="UTF-8"?'+'><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">STYLE_SHEET</head><body style="font-family: Arial, Helvetica, sans-serif !important; font-size: 13px; height: 100%; line-height: 1.5em !important;">INITIAL_CONTENT</body></html>',css:{},debug:false,autoSave:true,rmUnwantedBr:true,brIE:true,controls:{},messages:{}},options);options.messages=$.extend(true,options.messages,Wysiwyg.MSGS_EN);options.controls=$.extend(true,options.controls,Wysiwyg.TOOLBAR);for(var control in controls)
{if(control in options.controls)
$.extend(options.controls[control],controls[control]);else
options.controls[control]=controls[control];}
return this.each(function()
{Wysiwyg(this,options);});};function Wysiwyg(element,options)
{return this instanceof Wysiwyg?this.init(element,options):new Wysiwyg(element,options);}
$.extend(Wysiwyg,{insertImage:function(szURL,attributes)
{var self=$.data(this,'wysiwyg');if(self.constructor==Wysiwyg&&szURL&&szURL.length>0)
{if(attributes)
{self.editorDoc.execCommand('insertImage',false,'#jwysiwyg#');var img=self.getElementByAttributeValue('img','src','#jwysiwyg#');if(img)
{img.src=szURL;for(var attribute in attributes)
{img.setAttribute(attribute,attributes[attribute]);}}}
else
{self.editorDoc.execCommand('insertImage',false,szURL);}}},createLink:function(szURL)
{var self=$.data(this,'wysiwyg');if(self.constructor==Wysiwyg&&szURL&&szURL.length>0)
{var selection=$(self.editor).documentSelection();if(selection.length>0)
{self.editorDoc.execCommand('unlink',false,[]);self.editorDoc.execCommand('createLink',false,szURL);}
else if(self.options.messages.nonSelection)
alert(self.options.messages.nonSelection);}},setContent:function(newContent)
{var self=$.data(this,'wysiwyg');self.setContent(newContent);self.saveContent();},clear:function()
{var self=$.data(this,'wysiwyg');self.setContent('');self.saveContent();},MSGS_EN:{nonSelection:'select the text you wish to link'},TOOLBAR:{bold:{visible:true,tags:['b','strong'],css:{fontWeight:'bold'}},italic:{visible:true,tags:['i','em'],css:{fontStyle:'italic'}},strikeThrough:{visible:false,tags:['s','strike'],css:{textDecoration:'line-through'}},underline:{visible:false,tags:['u'],css:{textDecoration:'underline'}},separator00:{visible:false,separator:true},justifyLeft:{visible:false,css:{textAlign:'left'}},justifyCenter:{visible:false,tags:['center'],css:{textAlign:'center'}},justifyRight:{visible:false,css:{textAlign:'right'}},justifyFull:{visible:false,css:{textAlign:'justify'}},separator01:{visible:false,separator:true},indent:{visible:false},outdent:{visible:false},separator02:{visible:false,separator:true},subscript:{visible:false,tags:['sub']},superscript:{visible:false,tags:['sup']},separator03:{visible:false,separator:true},undo:{visible:false},redo:{visible:false},separator04:{visible:false,separator:true},insertOrderedList:{visible:false,tags:['ol']},insertUnorderedList:{visible:false,tags:['ul']},insertHorizontalRule:{visible:false,tags:['hr']},separator05:{separator:true},createLink:{visible:true,exec:function()
{var selection=$(this.editor).documentSelection();if(selection.length>0)
{if($.browser.msie)
this.editorDoc.execCommand('createLink',true,null);else
{var szURL=prompt('URL','http://');if(szURL&&szURL.length>0)
{this.editorDoc.execCommand('unlink',false,[]);this.editorDoc.execCommand('createLink',false,szURL);}}}
else if(this.options.messages.nonSelection)
alert(this.options.messages.nonSelection);},tags:['a']},insertImage:{visible:true,exec:function()
{if($.browser.msie)
this.editorDoc.execCommand('insertImage',true,null);else
{var szURL=prompt('URL','http://');if(szURL&&szURL.length>0)
this.editorDoc.execCommand('insertImage',false,szURL);}},tags:['img']},separator06:{separator:true},h1mozilla:{visible:true&&$.browser.mozilla,className:'h1',command:'heading',arguments:['h1'],tags:['h1']},h2mozilla:{visible:true&&$.browser.mozilla,className:'h2',command:'heading',arguments:['h2'],tags:['h2']},h3mozilla:{visible:true&&$.browser.mozilla,className:'h3',command:'heading',arguments:['h3'],tags:['h3']},h1:{visible:true&&!($.browser.mozilla),className:'h1',command:'formatBlock',arguments:['Heading 1'],tags:['h1']},h2:{visible:true&&!($.browser.mozilla),className:'h2',command:'formatBlock',arguments:['Heading 2'],tags:['h2']},h3:{visible:true&&!($.browser.mozilla),className:'h3',command:'formatBlock',arguments:['Heading 3'],tags:['h3']},separator07:{visible:false,separator:true},cut:{visible:false},copy:{visible:false},paste:{visible:false},separator08:{separator:true&&!($.browser.msie)},increaseFontSize:{visible:true&&!($.browser.msie),tags:['big']},decreaseFontSize:{visible:true&&!($.browser.msie),tags:['small']},separator09:{separator:true},html:{visible:false,exec:function()
{if(this.viewHTML)
{this.setContent($(this.original).val());$(this.original).hide();}
else
{this.saveContent();$(this.original).show();}
this.viewHTML=!(this.viewHTML);}},removeFormat:{visible:true,exec:function()
{this.editorDoc.execCommand('removeFormat',false,[]);this.editorDoc.execCommand('unlink',false,[]);}}}});$.extend(Wysiwyg.prototype,{original:null,options:{},element:null,editor:null,init:function(element,options)
{var self=this;this.editor=element;this.options=options||{};$.data(element,'wysiwyg',this);var newX=element.width||element.clientWidth;var newY=element.height||element.clientHeight;if(element.nodeName.toLowerCase()=='textarea')
{this.original=element;if(newX==0&&element.cols)
newX=(element.cols*8)+21;if(newY==0&&element.rows)
newY=(element.rows*16)+16;var editor=this.editor=$('<iframe></iframe>').css({minHeight:(newY-6).toString()+'px',width:(newX-8).toString()+'px'}).attr('id',$(element).attr('id')+'IFrame');if($.browser.msie)
{this.editor.css('height',(newY).toString()+'px');}}
var panel=this.panel=$('<ul></ul>').addClass('panel');this.appendControls();this.element=$('<div></div>').css({width:(newX>0)?(newX).toString()+'px':'100%'}).addClass('wysiwyg').append(panel).append($('<div><!-- --></div>').css({clear:'both'})).append(editor);$(element).hide().before(this.element);this.viewHTML=false;this.initialHeight=newY-8;this.initialContent=$(element).val();this.initFrame();if(this.initialContent.length==0)
this.setContent('');if(this.options.autoSave)
$('form').submit(function(){self.saveContent();});$('form').bind('reset',function()
{self.setContent(self.initialContent);self.saveContent();});},initFrame:function()
{var self=this;var style='';if(this.options.css&&this.options.css.constructor==String)
style='<link rel="stylesheet" type="text/css" media="screen" href="'+this.options.css+'" />';this.editorDoc=$(this.editor).document();this.editorDoc_designMode=false;try{this.editorDoc.designMode='on';this.editorDoc_designMode=true;}catch(e){$(this.editorDoc).focus(function()
{self.designMode();});}
this.editorDoc.open();this.editorDoc.write(this.options.html.replace(/INITIAL_CONTENT/,this.initialContent).replace(/STYLE_SHEET/,style));this.editorDoc.close();this.editorDoc.contentEditable='true';if($.browser.msie)
{setTimeout(function(){$(self.editorDoc.body).css('border','none');},0);}
$(this.editorDoc).click(function(event)
{self.checkTargets(event.target?event.target:event.srcElement);});$(this.original).focus(function()
{$(self.editorDoc.body).focus();});if(this.options.autoSave)
{$(this.editorDoc).keydown(function(){self.saveContent();}).keyup(function(){self.saveContent();}).mousedown(function(){self.saveContent();});}
if(this.options.css)
{setTimeout(function()
{if(self.options.css.constructor==String)
{}
else
$(self.editorDoc).find('body').css(self.options.css);},0);}
$(this.editorDoc).keydown(function(event)
{if($.browser.msie&&self.options.brIE&&event.keyCode==13)
{var rng=self.getRange();rng.pasteHTML('<br />');rng.collapse(false);rng.select();return false;}});},designMode:function()
{if(!(this.editorDoc_designMode))
{try{this.editorDoc.designMode='on';this.editorDoc_designMode=true;}catch(e){}}},getSelection:function()
{return(window.getSelection)?window.getSelection():document.selection;},getRange:function()
{var selection=this.getSelection();if(!(selection))
return null;return(selection.rangeCount>0)?selection.getRangeAt(0):selection.createRange();},getContent:function()
{return $($(this.editor).document()).find('body').html();},setContent:function(newContent)
{$($(this.editor).document()).find('body').html(newContent);},saveContent:function()
{if(this.original)
{var content=this.getContent();if(this.options.rmUnwantedBr)
content=(content.substr(-4)=='<br>')?content.substr(0,content.length-4):content;$(this.original).val(content);}},appendMenu:function(cmd,args,className,fn)
{var self=this;var args=args||[];$('<li></li>').append($('<a><!-- --></a>').addClass(className||cmd)).mousedown(function(){if(fn)fn.apply(self);else self.editorDoc.execCommand(cmd,false,args);if(self.options.autoSave)self.saveContent();}).appendTo(this.panel);},appendMenuSeparator:function()
{$('<li class="separator"></li>').appendTo(this.panel);},appendControls:function()
{for(var name in this.options.controls)
{var control=this.options.controls[name];if(control.separator)
{if(control.visible!==false)
this.appendMenuSeparator();}
else if(control.visible)
{this.appendMenu(control.command||name,control.arguments||[],control.className||control.command||name||'empty',control.exec);}}},checkTargets:function(element)
{for(var name in this.options.controls)
{var control=this.options.controls[name];var className=control.className||control.command||name||'empty';$('.'+className,this.panel).removeClass('active');if(control.tags)
{var elm=element;do{if(elm.nodeType!=1)
break;if($.inArray(elm.tagName.toLowerCase(),control.tags)!=-1)
$('.'+className,this.panel).addClass('active');}while(elm=elm.parentNode);}
if(control.css)
{var elm=$(element);do{if(elm[0].nodeType!=1)
break;for(var cssProperty in control.css)
if(elm.css(cssProperty).toString().toLowerCase()==control.css[cssProperty])
$('.'+className,this.panel).addClass('active');}while(elm=elm.parent());}}},getElementByAttributeValue:function(tagName,attributeName,attributeValue)
{var elements=this.editorDoc.getElementsByTagName(tagName);for(var i=0;i<elements.length;i++)
{var value=elements[i].getAttribute(attributeName);if($.browser.msie)
{value=value.substr(value.length-attributeValue.length);}
if(value==attributeValue)
return elements[i];}
return false;}});})(jQuery);

(function($){$.fn.visualize=function(options,container){return $(this).each(function(){var o=$.extend({type:'bar',width:$(this).width(),height:$(this).height(),appendTitle:true,title:null,appendKey:true,rowFilter:' ',colFilter:' ',colors:['#1488AE','#9FBA34','#E28800','#A72500','#B082AC','#FF6699','#CC6600','#21A0AB','#CC0000'],textColors:[],parseDirection:'x',pieMargin:20,pieLabelsAsPercent:true,pieLabelPos:'inside',lineWeight:4,barGroupMargin:10,barMargin:1,yLabelInterval:30},options);o.width=parseFloat(o.width);o.height=parseFloat(o.height);var self=$(this);function scrapeTable(){var colors=o.colors;var textColors=o.textColors;var tableData={dataGroups:function(){var dataGroups=[];if(o.parseDirection=='x'){self.find('tr:gt(0)').filter(o.rowFilter).each(function(i){dataGroups[i]={};dataGroups[i].points=[];dataGroups[i].color=colors[i];if(textColors[i]){dataGroups[i].textColor=textColors[i];}
$(this).find('td').filter(o.colFilter).each(function(){dataGroups[i].points.push(parseFloat($(this).text()));});});}
else{var cols=self.find('tr:eq(1) td').filter(o.colFilter).size();for(var i=0;i<cols;i++){dataGroups[i]={};dataGroups[i].points=[];dataGroups[i].color=colors[i];if(textColors[i]){dataGroups[i].textColor=textColors[i];}
self.find('tr:gt(0)').filter(o.rowFilter).each(function(){dataGroups[i].points.push($(this).find('td').filter(o.colFilter).eq(i).text()*1);});};}
return dataGroups;},allData:function(){var allData=[];$(this.dataGroups()).each(function(){allData.push(this.points);});return allData;},dataSum:function(){var dataSum=0;var allData=this.allData().join(',').split(',');$(allData).each(function(){dataSum+=parseFloat(this);});return dataSum},topValue:function(){var topValue=0;var allData=this.allData().join(',').split(',');$(allData).each(function(){if(parseFloat(this,10)>topValue)topValue=parseFloat(this);});return topValue;},bottomValue:function(){var bottomValue=0;var allData=this.allData().join(',').split(',');$(allData).each(function(){if(this<bottomValue)bottomValue=parseFloat(this);});return bottomValue;},memberTotals:function(){var memberTotals=[];var dataGroups=this.dataGroups();$(dataGroups).each(function(l){var count=0;$(dataGroups[l].points).each(function(m){count+=dataGroups[l].points[m];});memberTotals.push(count);});return memberTotals;},yTotals:function(){var yTotals=[];var dataGroups=this.dataGroups();var loopLength=this.xLabels().length;for(var i=0;i<loopLength;i++){yTotals[i]=[];var thisTotal=0;$(dataGroups).each(function(l){yTotals[i].push(this.points[i]);});yTotals[i].join(',').split(',');$(yTotals[i]).each(function(){thisTotal+=parseFloat(this);});yTotals[i]=thisTotal;}
return yTotals;},topYtotal:function(){var topYtotal=0;var yTotals=this.yTotals().join(',').split(',');$(yTotals).each(function(){if(parseFloat(this,10)>topYtotal)topYtotal=parseFloat(this);});return topYtotal;},totalYRange:function(){return this.topValue()-this.bottomValue();},xLabels:function(){var xLabels=[];if(o.parseDirection=='x'){self.find('tr:eq(0) th').filter(o.colFilter).each(function(){xLabels.push($(this).html());});}
else{self.find('tr:gt(0) th').filter(o.rowFilter).each(function(){xLabels.push($(this).html());});}
return xLabels;},yLabels:function(){var yLabels=[];yLabels.push(bottomValue);var numLabels=Math.round(o.height/o.yLabelInterval);var loopInterval=Math.ceil(totalYRange/numLabels)||1;while(yLabels[yLabels.length-1]<topValue-loopInterval){yLabels.push(yLabels[yLabels.length-1]+loopInterval);}
yLabels.push(topValue);return yLabels;}};return tableData;};var createChart={pie:function(){canvasContain.addClass('visualize-pie');if(o.pieLabelPos=='outside'){canvasContain.addClass('visualize-pie-outside');}
var centerx=Math.round(canvas.width()/2);var centery=Math.round(canvas.height()/2);var radius=centery-o.pieMargin;var counter=0.0;var toRad=function(integer){return(Math.PI/180)*integer;};var labels=$('<ul class="visualize-labels"></ul>').insertAfter(canvas);$.each(memberTotals,function(i){var fraction=(this<=0||isNaN(this))?0:this/dataSum;ctx.beginPath();ctx.moveTo(centerx,centery);ctx.arc(centerx,centery,radius,counter*Math.PI*2-Math.PI*0.5,(counter+fraction)*Math.PI*2-Math.PI*0.5,false);ctx.lineTo(centerx,centery);ctx.closePath();ctx.fillStyle=dataGroups[i].color;ctx.fill();var sliceMiddle=(counter+fraction/2);var distance=o.pieLabelPos=='inside'?radius/1.5:radius+radius/5;var labelx=Math.round(centerx+Math.sin(sliceMiddle*Math.PI*2)*(distance));var labely=Math.round(centery-Math.cos(sliceMiddle*Math.PI*2)*(distance));var leftRight=(labelx>centerx)?'right':'left';var topBottom=(labely>centery)?'bottom':'top';var percentage=parseFloat((fraction*100).toFixed(2));if(percentage){var labelval=(o.pieLabelsAsPercent)?percentage+'%':this;var labeltext=$('<span class="visualize-label">'+labelval+'</span>').css(leftRight,0).css(topBottom,0);if(labeltext)
var label=$('<li class="visualize-label-pos"></li>').appendTo(labels).css({left:labelx,top:labely}).append(labeltext);labeltext.css('font-size',radius/8).css('margin-'+leftRight,-labeltext.width()/2).css('margin-'+topBottom,-labeltext.outerHeight()/2);if(dataGroups[i].textColor){labeltext.css('color',dataGroups[i].textColor);}}
counter+=fraction;});},line:function(area){if(area){canvasContain.addClass('visualize-area');}
else{canvasContain.addClass('visualize-line');}
var xInterval=canvas.width()/(xLabels.length-1);var xlabelsUL=$('<ul class="visualize-labels-x"></ul>').width(canvas.width()).height(canvas.height()).insertBefore(canvas);$.each(xLabels,function(i){var thisLi=$('<li><span>'+this+'</span></li>').prepend('<span class="line" />').css('left',xInterval*i).appendTo(xlabelsUL);var label=thisLi.find('span:not(.line)');var leftOffset=label.width()/-2;if(i==0){leftOffset=0;}
else if(i==xLabels.length-1){leftOffset=-label.width();}
label.css('margin-left',leftOffset).addClass('label');});var yScale=canvas.height()/totalYRange;var liBottom=canvas.height()/(yLabels.length-1);var ylabelsUL=$('<ul class="visualize-labels-y"></ul>').width(canvas.width()).height(canvas.height()).insertBefore(canvas);$.each(yLabels,function(i){var thisLi=$('<li><span>'+this+'</span></li>').prepend('<span class="line"  />').css('bottom',liBottom*i).prependTo(ylabelsUL);var label=thisLi.find('span:not(.line)');var topOffset=label.height()/-2;if(i==0){topOffset=-label.height();}
else if(i==yLabels.length-1){topOffset=0;}
label.css('margin-top',topOffset).addClass('label');});ctx.translate(0,zeroLoc);$.each(dataGroups,function(h){ctx.beginPath();ctx.lineWidth=o.lineWeight;ctx.lineJoin='round';var points=this.points;var integer=0;ctx.moveTo(0,-(points[0]*yScale));$.each(points,function(){ctx.lineTo(integer,-(this*yScale));integer+=xInterval;});ctx.strokeStyle=this.color;ctx.stroke();if(area){ctx.lineTo(integer,0);ctx.lineTo(0,0);ctx.closePath();ctx.fillStyle=this.color;ctx.globalAlpha=.3;ctx.fill();ctx.globalAlpha=1.0;}
else{ctx.closePath();}});},area:function(){createChart.line(true);},bar:function(){canvasContain.addClass('visualize-bar');var xInterval=canvas.width()/(xLabels.length);var xlabelsUL=$('<ul class="visualize-labels-x"></ul>').width(canvas.width()).height(canvas.height()).insertBefore(canvas);$.each(xLabels,function(i){var thisLi=$('<li><span class="label">'+this+'</span></li>').prepend('<span class="line" />').css('left',xInterval*i).width(xInterval).appendTo(xlabelsUL);var label=thisLi.find('span.label');label.addClass('label');});var yScale=canvas.height()/totalYRange;var liBottom=canvas.height()/(yLabels.length-1);var ylabelsUL=$('<ul class="visualize-labels-y"></ul>').width(canvas.width()).height(canvas.height()).insertBefore(canvas);$.each(yLabels,function(i){var thisLi=$('<li><span>'+this+'</span></li>').prepend('<span class="line"  />').css('bottom',liBottom*i).prependTo(ylabelsUL);var label=thisLi.find('span:not(.line)');var topOffset=label.height()/-2;if(i==0){topOffset=-label.height();}
else if(i==yLabels.length-1){topOffset=0;}
label.css('margin-top',topOffset).addClass('label');});ctx.translate(0,zeroLoc);for(var h=0;h<dataGroups.length;h++){ctx.beginPath();var linewidth=(xInterval-o.barGroupMargin*2)/dataGroups.length;var strokeWidth=linewidth-(o.barMargin*2);ctx.lineWidth=strokeWidth;var points=dataGroups[h].points;var integer=0;for(var i=0;i<points.length;i++){var xVal=(integer-o.barGroupMargin)+(h*linewidth)+linewidth/2;xVal+=o.barGroupMargin*2;ctx.moveTo(xVal,0);ctx.lineTo(xVal,Math.round(-points[i]*yScale));integer+=xInterval;}
ctx.strokeStyle=dataGroups[h].color;ctx.stroke();ctx.closePath();}}};var canvasNode=document.createElement("canvas");canvasNode.setAttribute('height',o.height);canvasNode.setAttribute('width',o.width);var canvas=$(canvasNode);var title=o.title||self.find('caption').text();var canvasContain=(container||$('<div class="visualize" role="img" aria-label="Chart representing data from the table: '+title+'" />')).height(o.height).width(o.width).append(canvas);var tableData=scrapeTable();var dataGroups=tableData.dataGroups();var allData=tableData.allData();var dataSum=tableData.dataSum();var topValue=tableData.topValue();var bottomValue=tableData.bottomValue();var memberTotals=tableData.memberTotals();var totalYRange=tableData.totalYRange();var zeroLoc=o.height*(topValue/totalYRange);var xLabels=tableData.xLabels();var yLabels=tableData.yLabels();if(o.appendTitle||o.appendKey){var infoContain=$('<div class="visualize-info"></div>').appendTo(canvasContain);}
if(o.appendTitle){$('<div class="visualize-title">'+title+'</div>').appendTo(infoContain);}
if(o.appendKey){var newKey=$('<ul class="visualize-key"></ul>');var selector;if(o.parseDirection=='x'){selector=self.find('tr:gt(0) th').filter(o.rowFilter);}
else{selector=self.find('tr:eq(0) th').filter(o.colFilter);}
selector.each(function(i){$('<li><span class="visualize-key-color" style="background: '+dataGroups[i].color+'"></span><span class="visualize-key-label">'+$(this).text()+'</span></li>').appendTo(newKey);});newKey.appendTo(infoContain);};if(!container){canvasContain.insertAfter(this);}
if(typeof(G_vmlCanvasManager)!='undefined'){G_vmlCanvasManager.init();G_vmlCanvasManager.initElement(canvas[0]);}
var ctx=canvas[0].getContext('2d');createChart[o.type]();$('.visualize-line li:first-child span.line, .visualize-line li:last-child span.line, .visualize-area li:first-child span.line, .visualize-area li:last-child span.line, .visualize-bar li:first-child span.line,.visualize-bar .visualize-labels-y li:last-child span.line').css('border','none');if(!container){canvasContain.bind('visualizeRefresh',function(){self.visualize(o,$(this).empty());});}}).next();};})(jQuery);
