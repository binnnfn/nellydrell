/*
Facelift Image Replacement v1.2 beta 4
Facelift was written and is maintained by Cory Mawhorter.  
It is available from http://facelift.mawhorter.net/

===

This file is part of Facelife Image Replacement ("FLIR").

FLIR is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

FLIR is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Facelift Image Replacement.  If not, see <http://www.gnu.org/licenses/>.
*/
var FLIR={version:"1.2b4",options:{path:"",classnameIgnore:false,findEmbededFonts:false,ignoredElements:"BR,HR,IMG,INPUT,SELECT"},onreplacing:null,onreplaced:null,onreplacingchild:null,onreplacedchild:null,flirElements:[],flirPlugins:[],isCraptastic:true,isIE:true,defaultStyle:null,classStyles:{},embededFonts:{},dpi:96,init:function(A,B){if(this.isFStyle(A)){this.defaultStyle=A}else{if(typeof A!="undefined"){this.loadOptions(A)}if(typeof B=="undefined"){this.defaultStyle=new FLIRStyle()}else{if(this.isFStyle(B)){this.defaultStyle=B}else{this.defaultStyle=new FLIRStyle(B)}}}this.calcDPI();if(this.options.findEmbededFonts){this.discoverEmbededFonts()}this.isIE=(navigator.userAgent.toLowerCase().indexOf("msie")>-1&&navigator.userAgent.toLowerCase().indexOf("opera")<0);this.isCraptastic=(typeof document.body.style.maxHeight=="undefined");if(this.isIE){this.flirIERepObj=[];this.flirIEHovEls=[];this.flirIEHovStyles=[]}FLIR._call_plugin("init",arguments)},loadOptions:function(A){for(var B in A){this.options[B]=A[B]}},installPlugin:function(A){this.flirPlugins.push(A)},_call_plugin:function(D,C){var A=C;for(var B=0;B<this.flirPlugins.length;B++){if(typeof this.flirPlugins[B][D]=="function"){var E=this.flirPlugins[B][D](A);if(typeof E=="undefined"){continue}if(typeof E=="boolean"&&E==false){return false}if(typeof E!="boolean"){A=C}}}var A=typeof A!="object"?[A]:A;if(A.length&&A[0]&&A[0].callee){return A[0]}else{return A}},auto:function(C){if(!(args=FLIR._call_plugin("auto",arguments))){return }C=args[0];var A=typeof C=="undefined"?["h1","h2","h3","h4","h5"]:(C.indexOf&&C.indexOf(",")>-1?C.split(","):C);var D;for(var B=0;B<A.length;B++){D=this.getElements(A[B]);if(D.length>0){this.replace(D)}}},hover:function(J){var B=FLIR.evsrc(J);var L=B;var O=B.flirHasHover;var H=B;var K=(J.type=="mouseover");while(B!=document.body&&!B.flirMainObj){B=FLIR.getParentNode(B);if(!O){O=B.flirHasHover;H=B}}if(B==document.body){return }var C=FLIR.getFStyle(B);if(K&&C!=C.hoverStyle){C=C.hoverStyle}if(!(args=FLIR._call_plugin("hover",[K,L,B,H]))){return }K=args[0];L=args[1];B=args[2];H=args[3];var I=FLIR.getChildren(H);if(I.length==0||(I.length==1&&(I[0].flirImage||I[0].flirHasHover))){I=[H]}else{if(I.length==1&&!FLIR.isIgnoredElement(I[0])){var E=FLIR.getChildren(I[0]);if(E.length>0){if((E.length==1&&!E[0].flirImage)||E.length>1){I=E}}}}var M;for(var G=0;G<I.length;G++){M=I[G];if(M.nodeName=="IMG"){continue}if(!M.innerHTML){continue}if(FLIR.isIE){var N=FLIR.flirIEHovEls.length;FLIR.flirIERepObj[N]=M;FLIR.flirIEHovStyles[N]=C;if(!FLIR.isCraptastic){if(C.useBackgroundMethod&&FLIR.getStyle(M,"display")=="block"){FLIR.flirIEHovEls[N]=M;setTimeout("FLIR.flirIERepObj["+N+'].style.background = "url("+('+K+" ? FLIR.flirIEHovStyles["+N+"].generateURL(FLIR.flirIERepObj["+N+"]) : FLIR.flirIERepObj["+N+'].flirOrig)+") no-repeat";',0)}else{FLIR.flirIEHovEls[N]=M.flirImage?M:FLIR.getChildren(M)[0];if(!FLIR.flirIEHovEls[N].flirOrigWidth){FLIR.flirIEHovEls[N].flirOrigWidth=FLIR.flirIEHovEls[N].width;FLIR.flirIEHovEls[N].flirOrigHeight=FLIR.flirIEHovEls[N].height}var D="FLIR.flirIEHovEls["+N+"].src = "+K+" ? FLIR.flirIEHovStyles["+N+"].generateURL(FLIR.flirIERepObj["+N+"], FLIR.flirIEHovEls["+N+"].alt) : FLIR.flirIERepObj["+N+"].flirOrig;";D+="FLIR.flirIEHovEls["+N+"].onload = function() { ";if(K&&!FLIR.flirIEHovEls[N].flirHoverWidth){D+="		FLIR.flirIEHovEls["+N+"].flirHoverWidth = this.width; ";D+="		FLIR.flirIEHovEls["+N+"].flirHoverHeight = this.height; "}D+="	this.style.width = FLIR.flirIEHovEls["+N+"]."+(K?"flirHoverWidth":"flirOrigWidth")+'+"px"; ';D+="	this.style.height = FLIR.flirIEHovEls["+N+"]."+(K?"flirHoverHeight":"flirOrigHeight")+'+"px"; ';D+="}; ";setTimeout(D,0)}}else{FLIR.flirIEHovEls[N]=M.flirImage?M:FLIR.getChildren(M)[0];setTimeout("  FLIR.flirIEHovEls["+N+"].style.filter = 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\"'+FLIR.flirIEHovStyles["+N+"].generateURL(FLIR.flirIERepObj["+N+"], FLIR.flirIEHovEls["+N+'].alt)+\'", sizingMethod="image")\';  ',0)}}else{if(C.useBackgroundMethod&&FLIR.getStyle(M,"display")=="block"){var A=M.flirHoverURL?M.flirHoverURL:C.generateURL(M);M.style.background="url("+(K?A:M.flirOrig)+") no-repeat"}else{var F=M.flirImage?M:FLIR.getChildren(M)[0];var A=M.flirHoverURL?M.flirHoverURL:C.generateURL(M,F.alt);F.src=K?A:M.flirOrig}}}},addHover:function(A){if(!(args=FLIR._call_plugin("addHover",arguments))){return }A=args[0];A.flirHasHover=true;if(A.addEventListener){A.addEventListener("mouseover",FLIR.hover,false);A.addEventListener("mouseout",FLIR.hover,false)}else{if(A.attachEvent){A.attachEvent("onmouseover",function(){FLIR.hover(window.event)});A.attachEvent("onmouseout",function(){FLIR.hover(window.event)})}}},prepare:function(E){if(!(args=FLIR._call_plugin("prepare",arguments))){return }E=args[0];if(E&&E.hasChildNodes()){for(var B in E.childNodes){var D=E.childNodes[B];if(D&&D.nodeType==3){var C=document.createElement("SPAN");C.style.margin=C.style.padding=C.style.border="0px";C.className="flir-span";D.nodeValue;var A=D.nodeValue.replace(/[\t\n\r]/g," ").replace(/\s\s+/g," ");C.innerHTML=!FLIR.isIE?A:D.nodeValue.replace(/^\s+|\s+$/g,"&nbsp;");E.replaceChild(C,D)}}}},replace:function(C,B){if(!(args=FLIR._call_plugin("replace",arguments))){return }C=args[0];B=args[1];if(!C||C.flirReplaced){return }if(!this.isFStyle(B)){B=this.getFStyle(C)}if(typeof C=="string"){C=this.getElements(C)}if(typeof C.length!="undefined"){if(C.length==0){return }for(var A=0;A<C.length;A++){this.replace(C[A],B)}return }if(typeof FLIR.onreplacing=="function"){C=FLIR.onreplacing(C,B)}C.flirMainObj=true;this.setFStyle(C,B);if(this.options.findEmbededFonts&&typeof this.embededFonts[B.getFont(C)]!="undefined"){return }if(C.hasChildNodes()&&C.childNodes.length>1){FLIR.prepare(C)}this._replace_tree(C,B);if(typeof FLIR.onreplaced=="function"){FLIR.onreplaced(C,B)}},_replace_tree:function(E,C){if(typeof __flir_replacetree_recurse=="undefined"){__flir_replacetree_recurse=1}else{__flir_replacetree_recurse++}if(__flir_replacetree_recurse>1000){console.error("Facelift: Too much recursion.");return }var D=!E.hasChildNodes()||(E.hasChildNodes()&&E.childNodes.length==1&&E.childNodes[0].nodeType==3)?[E]:E.childNodes;var A;for(var B=0;B<D.length;B++){A=D[B];if(typeof FLIR.onreplacingchild=="function"){A=FLIR.onreplacingchild(A,C)}if(!A.innerHTML||A.nodeType!=1){continue}if(FLIR.isIgnoredElement(A)){continue}if(A.flirReplaced){continue}if(A.nodeName=="A"&&!A.flirHasHover){FLIR.addHover(A)}if(A.hasChildNodes()&&(A.childNodes.length>1||A.childNodes[0].nodeType!=3)){FLIR.prepare(A);FLIR._replace_tree(A,C);continue}if(A.innerHTML==""){continue}if(!FLIR.isCraptastic){if(C.useBackgroundMethod){FLIR.replaceMethodBackground(A,C)}else{FLIR.replaceMethodOverlay(A,C)}}else{FLIR.replaceMethodCraptastic(A,C)}A.className+=" flir-replaced";A.flirReplaced=true;if(typeof FLIR.onreplacedchild=="function"){FLIR.onreplacedchild(E,C)}}},replaceMethodBackground:function(E,D){if(!(args=FLIR._call_plugin("replaceMethodBackground",arguments))){return }E=args[0];D=args[1];var C=this.saveObject(E);var A=D.generateURL(E);if(FLIR.getStyle(E,"display")!="block"){E.style.display="block"}var B=new Image();B.onload=function(){FLIR.flirElements[C].style.width=this.width+"px";FLIR.flirElements[C].style.height=this.height+"px";if(D!=D.hoverStyle){var F=new Image();E.flirHoverURL=F.src=D.hoverStyle.generateURL(E)}};B.src=A;E.style.background='url("'+A.replace(/ /g,"%20")+'") no-repeat';E.flirOrig=A;E.oldTextIndent=E.style.textIndent;E.style.textIndent="-9999px"},replaceMethodOverlay:function(D,C){if(!(args=FLIR._call_plugin("replaceMethodOverlay",arguments))){return }D=args[0];C=args[1];var B=this.saveObject(D);var A=document.createElement("IMG");A.alt=this.sanitizeHTML(D.innerHTML);if(C!=C.hoverStyle){A.onload=function(){var E=new Image();D.flirHoverURL=E.src=C.hoverStyle.generateURL(D,A.alt)}}if(A.onerror){A.onerror=function(){var E=document.createElement("SPAN");E.innerHTML=A.alt;try{D.replaceChild(E,A)}catch(F){}}}A.flirImage=true;A.className="flir-image";A.src=C.generateURL(D);A.style.border="none";D.flirOrig=A.src;D.innerHTML="";D.appendChild(A)},replaceMethodCraptastic:function(E,D){if(!(args=FLIR._call_plugin("replaceMethodCraptastic",arguments))){return }E=args[0];D=args[1];var C=this.saveObject(E);var B=D.generateURL(E);var A=document.createElement("IMG");A.alt=this.sanitizeHTML(E.innerHTML);if(D!=D.hoverStyle){A.onload=function(){var F=new Image();E.flirHoverURL=F.src=D.hoverStyle.generateURL(E,A.alt)}}A.flirImage=true;A.className="flir-image";A.src=this.options.path+"spacer.png";A.style.width=E.offsetWidth+"px";A.style.height=E.offsetHeight+"px";A.style.filter='progid:DXImageTransform.Microsoft.AlphaImageLoader(src="'+B+'", sizingMethod="image")';E.flirOrig=B;E.innerHTML="";E.appendChild(A)},saveObject:function(A){if(typeof A.flirId=="undefined"){A.flirId=this.getUID();this.flirElements[A.flirId]=A}return A.flirId},getUID:function(){var B="flir-";var C=B+Math.random().toString().split(".")[1];var A=0;while(typeof this.flirElements[C]!="undefined"){if(A>100000){console.error("Facelift: Unable to generate unique id.")}C=B+Math.random().toString().split(".")[1];A++}return C},getElements:function(Q){if(!(args=FLIR._call_plugin("getElements",arguments))){return }switch(args.length){case 1:Q=args[0];break;case 2:return args[0];break}var P=[];if(document.querySelectorAll){var E=false;try{P=document.querySelectorAll(Q);E=true}catch(F){E=false}if(E){return P}}var I,N,L,J,Q,D,H,O,K;D=Q;O=false;if(D.indexOf(" ")>-1){var G=D.split(" ");D=G[0];O=G[1]}var C=false;if(D.indexOf("#")>-1){C=D.split("#")[1];Q=D.split("#")[0]}var M=false;if(D.indexOf(".")>-1){M=D.split(".")[1];Q=D.split(".")[0]}I=document.getElementsByTagName(Q);for(var A=0;A<I.length;A++){if(I[A].nodeType!=1){continue}H=false;L=I[A].className?I[A].className:"";if(C&&I[A].id&&I[A].id==C){H=true}if(M&&FLIR.hasClass(I[A],M)){H=true}if(!C&&!M){H=true}if(!H){continue}if(this.options.classnameIgnore&&L.indexOf(this.options.classnameIgnore)>-1){continue}N=false!=O?I[A].getElementsByTagName(O):[I[A]];for(var B=0;B<N.length;B++){K=N[B];if(this.options.classnameIgnore&&K.className&&K.className.indexOf(this.options.classnameIgnore)>-1){continue}P.push(K)}}return P},discoverEmbededFonts:function(){this.embededFonts={};for(var C in document.styleSheets){if(!document.styleSheets[C].cssRules){continue}for(var D in document.styleSheets[C].cssRules){if(!document.styleSheets[0].cssRules[D]){continue}var E=document.styleSheets[0].cssRules[D];if(E.type&&E.type==E.FONT_FACE_RULE){var A=E.style.getPropertyValue("src").match(/url\("?([^"\)]+\.[ot]tf)"?\)/i)[1];var B=E.style.getPropertyValue("font-family");if(B.indexOf(",")){B=B.split(",")[0]}B=B.replace(/['"]/g,"").toLowerCase();if(B!=""&&A!=""){this.embededFonts[B]=A}}}}},getStyle:function(A,C){if(A.currentStyle){if(C.indexOf("-")>-1){C=C.split("-")[0]+C.split("-")[1].substr(0,1).toUpperCase()+C.split("-")[1].substr(1)}var B=A.currentStyle[C]}else{if(window.getComputedStyle){var B=document.defaultView.getComputedStyle(A,"").getPropertyValue(C)}}return B},getChildren:function(C){var B=[];if(C&&C.hasChildNodes()){for(var A in C.childNodes){if(C.childNodes[A]&&C.childNodes[A].nodeType==1){B[B.length]=C.childNodes[A]}}}return B},getParentNode:function(B){var A=B.parentNode;while(A!=document&&A.nodeType!=1){A=A.parentNode}return A},hasClass:function(A,B){return(A&&A.className&&A.className.indexOf(B)>-1)},evsrc:function(A){var B;if(A.target){B=A.target}else{if(A.srcElement){B=A.srcElement}}if(B.nodeType==3){B=B.parentNode}return B},calcDPI:function(){if(screen.logicalXDPI){var A=screen.logicalXDPI}else{var C="flir-dpi-div-test";if(document.getElementById(C)){var B=document.getElementById(C)}else{var B=document.createElement("DIV");B.id=C;B.style.position="absolute";B.style.visibility="hidden";B.style.border=B.style.padding=B.style.margin="0";B.style.left=B.style.top="-1000px";B.style.height=B.style.width="1in";document.body.appendChild(B)}var A=B.offsetHeight}this.dpi=parseInt(A)},isIgnoredElement:function(B,A){return((","+this.options.ignoredElements).indexOf(","+B.nodeName)>-1)},sanitizeHTML:function(A){return A.replace(/<[^>]+>/g,"")},getFStyle:function(C,B){var A=this.getClassStyle(C);if(this.isFStyle(A)){B=A}if(this.isFStyle(B)){return B}else{if(this.isFStyle(C.flirStyle)){return C.flirStyle}else{return this.defaultStyle}}},setFStyle:function(B,A){B.flirStyle=A},isFStyle:function(A){return(typeof A!="undefined"&&A.toString()=="[FLIRStyle Object]")},addClassStyle:function(B,A){if(this.isFStyle(A)){this.classStyles[B]=A}},getClassStyle:function(D){if(!(args=FLIR._call_plugin("getClassStyle",arguments))){return }switch(args.length){case 1:D=args[0];break;case 2:return args[0];break}var E=D.className;if(this.classStyles.length==0||typeof E=="undefined"||E==""){return false}var B=E.split(" ");for(var A in this.classStyles){for(var C=0;C<B.length;C++){if(B[C]==A){return this.classStyles[A]}}}return false}};function FLIRStyle(A){this.useBackgroundMethod=false;this.inheritStyle=true;this.useExtendedStyles=false;this.hoverStyle=(arguments[1]&&FLIR.isFStyle(arguments[1]))?arguments[1]:this;this.options={mode:"",output:"auto",cSize:null,cColor:null,cFont:null,realFontHeight:false,dpi:96};this.cssStyles={"background-color":"Background",color:"Color","font-family":"Font","font-size":"Size","letter-spacing":"Spacing","line-height":"Line","text-align":"Align","text-transform":"Transform"};this.extendedStyles={"font-stretch":"Stretch","font-style":"FontStyle","font-variant":"Variant","font-weight":"Weight",opacity:"Opacity","text-decoration":"Decoration"};for(var B in A){if(B.indexOf("css")==0){B="c"+B.substr(3)}if(typeof this[B]!="undefined"){this[B]=A[B]}else{this.options[B]=A[B]}}this.options.dpi=FLIR.dpi;if(this.useExtendedStyles){for(var B in this.extendedStyles){this.cssStyles[B]=this.extendedStyles[B]}}for(var B=0;B<FLIR.flirPlugins.length;B++){if(FLIR.flirPlugins[B].FLIRStyleExtend&&typeof FLIR.flirPlugins[B].FLIRStyleExtend.init){FLIR.flirPlugins[B].FLIRStyleExtend.init.call(this)}}}FLIRStyle.prototype.generateURL=function(C){var B=(arguments[1]?arguments[1]:C.innerHTML);var A=this.options.cTransform;if(A==null){A=FLIR.getStyle(C,"text-transform")}switch(A){case"capitalize":B=B.replace(/\w+/g,function(D){return D.charAt(0).toUpperCase()+D.substr(1).toLowerCase()});break;case"lowercase":B=B.toLowerCase();break;case"uppercase":B=B.toUpperCase().replace(/&[a-z0-9]+;/gi,function(D){return D.toLowerCase()});break}B=encodeURIComponent(B.replace(/&/g,"{amp}").replace(/\+/g,"{plus}"));return FLIR.options.path+"generate.php?text="+B+"&h="+C.offsetHeight+"&w="+C.offsetWidth+"&fstyle="+this.serialize(C)};FLIRStyle.prototype.buildURL=function(B){var A=encodeURIComponent(B.replace(/&/g,"{amp}").replace(/\+/g,"{plus}"));return FLIR.options.path+"generate.php?text="+A+"&h=800&w=800&fstyle="+this.serialize()};FLIRStyle.prototype.serialize=function(E){var D="";var B=this.copyObject(this.options);if(E&&this.inheritStyle){for(var C in this.cssStyles){var A=this.cssStyles[C];if(this.options["c"+A]==null||A=="Size"){this.options["c"+A]=this.get(E,C,A)}}}for(var C in this.options){if(this.options[C]==null||typeof this.options[C]=="undefined"||this.options[C]=="NaN"){continue}D+=',"'+C+'":"'+this.options[C].toString().replace(/"/g,"'")+'"'}D="{"+D.substr(1)+"}";this.options=B;return escape(D)};FLIRStyle.prototype.get=function(D,A,C){var B="get"+C;return typeof this[B]=="function"?this[B](D):FLIR.getStyle(D,A)};FLIRStyle.prototype.getFontStyle=function(A){return A.nodeName=="EM"||FLIR.getParentNode(A).nodeName=="EM"?"italic":FLIR.getStyle(A,"font-style")};FLIRStyle.prototype.getWeight=function(B){var A=B.nodeName=="STRONG"||FLIR.getParentNode(B).nodeName=="STRONG"?"bold":FLIR.getStyle(B,"font-weight");return A.toString().search(/bold|bolder|lighter/)>-1?A:""};FLIRStyle.prototype.getFont=function(B){var A=FLIR.getStyle(B,"font-family");if(A.indexOf(",")){A=A.split(",")[0]}return A.replace(/['"]/g,"").toLowerCase()};FLIRStyle.prototype.getColor=function(B){var A=FLIR.getStyle(B,"color");if(A.substr(0,1)=="#"){A=A.substr(1)}return A.replace(/['"]/g,"").toLowerCase()};FLIRStyle.prototype.getSize=function(o){if(this.options.cSize!=null&&"*/+-".indexOf(this.options.cSize[0])<0){return this.options.cSize}var raw=FLIR.getStyle(o,"font-size");var pix;if(raw.indexOf("px")>-1){pix=Math.round(parseFloat(raw))}else{if(raw.indexOf("pt")>-1){var pts=parseFloat(raw);pix=pts/(72/this.options.dpi)}else{if(raw.indexOf("em")>-1||raw.indexOf("%")>-1){pix=this.calcFontSize(o)}}}if(this.options.cSize&&"*/+-".indexOf(this.options.cSize[0])>-1){try{pix=this.roundFloat(parseFloat(eval(pix.toString().concat(this.options.cSize))))}catch(err){}}o.flirFontSize=pix;return pix};FLIRStyle.prototype.getSpacing=function(C){var E=FLIR.getStyle(C,"letter-spacing");var A;if(E!="normal"){if(E.indexOf("em")>-1){var D=C.flirFontSize?C.flirFontSize:this.getSize(C);A=(parseFloat(E)*D)}else{if(E.indexOf("px")>-1){A=parseFloat(E)}else{if(E.indexOf("pt")>-1){var B=parseFloat(E);A=B/(72/this.options.dpi)}}}return this.roundFloat(A)}return""};FLIRStyle.prototype.getLine=function(C){var E=FLIR.getStyle(C,"line-height");var B=parseFloat(E);var D=C.flirFontSize?C.flirFontSize:this.getSize(C);if(E.indexOf("em")>-1){ret=(B*D)/D}else{if(E.indexOf("px")>-1){ret=B/D}else{if(E.indexOf("pt")>-1){var A=B;ret=(A/(72/this.options.dpi))/D}else{if(E.indexOf("%")>-1){return 1}else{ret=B}}}}return this.roundFloat(ret)};FLIRStyle.prototype.roundFloat=function(A){return Math.round(A*10000)/10000};FLIRStyle.prototype.calcFontSize=function(B){var C=document.createElement("DIV");C.style.border="0";C.style.padding="0";C.style.position="absolute";C.style.visibility="hidden";C.style.left=C.style.top="-1000px";C.style.left=C.style.top="10px";C.style.lineHeight="100%";C.innerHTML="Flir_Test";B.appendChild(C);var A=C.offsetHeight;B.removeChild(C);return A};FLIRStyle.prototype.copyObject=function(B){var C={};for(var A in B){C[A]=B[A]}return C};FLIRStyle.prototype.toString=function(){return"[FLIRStyle Object]"};