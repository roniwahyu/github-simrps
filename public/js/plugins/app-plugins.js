/** 
 * bootstrapSwitch
*/
(function ( $ ) {
	$.fn.bootstrapSwitch = function( options ) {
	  var settings = $.extend({
		on: 'true',
		off: 'false',
		
		onLabel: 'Yes',
		offLabel: 'No',
  
		same: false,
		size: 'sm',
		onClass: 'success',
		offClass: 'danger'
		}, options );
  
	  settings.size = ' btn-'+settings.size;
	  
	  if (settings.same){
		settings.onLabel = settings.on;
		settings.offLabel = settings.on;
	  }
  
	  return this.each(function(e) {
		var checkbox = $(this);
		
		var onValue = checkbox.data('on') || settings.on;
		var offValue = checkbox.data('off') || settings.off;
		
		var onLabel = checkbox.data('onlabel') || settings.onLabel;
		var offLabel = checkbox.data('offlabel')  || settings.offLabel;
		
		var onClass = checkbox.data('onclass') || settings.onClass;
		var offClass = checkbox.data('offclass') || settings.offClass;
		var same = checkbox.data('same') || settings.same;
		var size = checkbox.data('size') || settings.size;
		var inputName = checkbox.data('name');
  
		checkbox.prop("checked", onValue.toString().toLowerCase() == checkbox.val().toString().toLowerCase());
		var disabled = checkbox.is(":disabled") ? " disabled" : "";
  
		var div = $('<div class="btn-group btn-toggle" style="white-space: nowrap;"></div>').insertAfter(this);
		var on = $('<button class="btn btn-success '+size+disabled+'" style="float: none;display: inline-block;"></button>').html(onValue).css('margin-right', '0px').appendTo(div);
		var off = $('<button class="btn btn-danger '+size+disabled+'" style="float: none;display: inline-block;"></button>').html(offValue).css('margin-left', '0px').appendTo(div);
  
		function applyChange(isChecked) {
		  if(isChecked) {
			checkbox.val(onValue);
			on.attr('class', 'btn active btn-' + onClass+size+disabled).html(onLabel).blur();
			off.attr('class', 'btn btn-secondary '+size+disabled).html(offLabel).blur();
		  }
		  else {
			checkbox.val(offValue);
			on.attr('class', 'btn btn-secondary '+size+disabled).html(onLabel).blur();
			off.attr('class', 'btn active btn-' + offClass+size+disabled).text(offLabel).blur();
		  }
		  
		  checkbox.siblings('[type="hidden"]').val(checkbox.val());
		}
		
	  
		
		on.click(function(e) {e.preventDefault();checkbox.prop("checked", !checkbox.prop("checked")).trigger('change')});
		off.click(function(e) {e.preventDefault();checkbox.prop("checked", !checkbox.prop("checked")).trigger('change')});
  
		$(this).hide().on('change', function() {
		  applyChange(checkbox.is(':checked'))
		});
		
		applyChange(checkbox.is(':checked'));
	  });
	};
  } ( jQuery ));


  
(function($, window, document, undefined) {
	  var pluginName = "passwordStrength",
		  defaults = {
			  minChars: 6,
			  textWeak: "Weak",
			  textMedium: "Medium",
			  textStrong: "Good",
			  textVeryStrong: "Excellent",
		  };
	  function Plugin(element, options){
		this.element = element;
		this.$elem = $(this.element);
		this.options = $.extend({}, defaults, options);
		this._defaults = defaults;
		this._name = pluginName;
		this.meter = null;
		this.value = "";
		_this      = this;
		this.init();
	  }
	  Plugin.prototype = {
		init: function(){
		  var _this    = this;
		  var progressbar = jQuery('<div class="progress mt-1 text-center" style="height:15px"><div class="progress-bar" style="width: 0%;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div></div>');
		  this.meter = $(progressbar).find(".progress-bar");
		  $(progressbar).insertAfter($(this.element).parent());
		  
		  this.$elem.bind("input", function() {
			  _this.value = $(this).val();
			  _this.check();
		  });
		},
		check: function(){
		  var secureTotal  = 0,
			  chars        = 0,
			  lower     = 0,
			  capitals     = 0,
			  numbers      = 0,
			  special      = 0;
			  lowerCase    = new RegExp("[a-z]"),
			  upperCase    = new RegExp("[A-Z]"),
			  number      = new RegExp("[0-9]"),
			  specialchars = new RegExp("([^a-zA-Z0-9])");
		  var value = this.value;
		  var minChar = this.$elem.attr("minlength") || this.options.minChars
		 
		  if(value.length >= 16){
			  chars = 3;
			  $('.password-strength-msg .length').hide();
		  }
		  else if(value.length >= minChar){
			chars = 1;
			$('.password-strength-msg .length').hide();
		  }
		  else{
			chars = 0;
			$('.password-strength-msg .length').show();
		  }
		  
		  if(value.match(lowerCase)){
			  lower = 1;
			  $('.password-strength-msg .lower').hide();
		  }
		  else{
			  lower = 0;
			  $('.password-strength-msg .lower').show();
		  }
		  
		  if(value.match(upperCase)){
			capitals = 1;
			$('.password-strength-msg .caps').hide();
		  }else{
			capitals = 0;
			 $('.password-strength-msg .caps').show();
		  }
		  if(value.match(number)){
			numbers = 1;
			$('.password-strength-msg .number').hide();
		  }else{
			numbers = 0;
			$('.password-strength-msg .number').show();
		  }
  
		  if(value.match(specialchars)){
			special = 1;
			$('.password-strength-msg .special').hide();
		  }else{
			special = 0;
			$('.password-strength-msg .special').show();
		  }
		  secureTotal = chars + lower + capitals + numbers + special;
		  securePercentage = Math.max((secureTotal / 5) * 100, 10);
		  this.updateMeter(securePercentage);
		},
		updateMeter: function(percentage){
		  var status = "bg-danger";
		  var text = ""; 
		  this.meter.attr("class", "");
  
		  if(percentage >= 25){
			status = "bg-danger";
			text = this.$elem.data("text-weak") || this.options.textWeak;
		  }
	  
		  if(percentage >= 50){
			status = "bg-warning";
			text = this.$elem.data("text-medium") || this.options.textMedium;
		  }
	  
		  if(percentage >= 75){
			status = "bg-success";
			text = this.$elem.data("text-strong") || this.options.textStrong;
		  }
	  
		  if(percentage >= 100){
			status = "bg-success";
			text = this.$elem.data("text-very-strong") || this.options.textVeryStrong;
			$(".password-strength-msg").hide();
		  }
		  else{
			  $(".password-strength-msg").show();
		  }
		  var width =  percentage + "%";
		  if(!this.value){
			width = "0";
		  }
		  
		  this.meter.css("width", width);
		  this.meter.addClass(status);
		  this.meter.html(text);
		},
	  };
	
	  $.fn[pluginName] = function(options) {
		  return this.each(function() {
			  if (!$.data(this, "plugin_" + pluginName)) {
				  $.data(this, "plugin_" + pluginName, new Plugin(this, options));
			  }
		  });
	  };
  })(jQuery, window, document);

/** 
   * javascript url parser
 * https://github.com/Mikhus/domurl
*/
!function(t){"use strict";var y=/^[a-z]+:/,d=/[-a-z0-9]+(\.[-a-z0-9])*:\d+/i,v=/\/\/(.*?)(?::(.*?))?@/,r=/^win/i,g=/:$/,m=/^\?/,q=/^#/,w=/(.*\/)/,A=/^\/{2,}/,o=/'/g,e=/%([ef][0-9a-f])%([89ab][0-9a-f])%([89ab][0-9a-f])/gi,n=/%([cd][0-9a-f])%([89ab][0-9a-f])/gi,i=/%([0-7][0-9a-f])/gi,p=/\+/g,s=/^\w:$/,C=/[^/#?]/;var a,I="undefined"==typeof window&&"undefined"!=typeof global&&"function"==typeof require,S=I?t.require:null,b={protocol:"protocol",host:"hostname",port:"port",path:"pathname",query:"search",hash:"hash"},j={ftp:21,gopher:70,http:80,https:443,ws:80,wss:443};function x(){return I?a=a||"file://"+(process.platform.match(r)?"/":"")+S("fs").realpathSync("."):document.location.href}function h(t,r,o){var e,n,i;r=r||x(),I?e=S("url").parse(r):(e=document.createElement("a")).href=r;var s,p,a=(p={path:!0,query:!0,hash:!0},(s=r)&&y.test(s)&&(p.protocol=!0,p.host=!0,d.test(s)&&(p.port=!0),v.test(s)&&(p.user=!0,p.pass=!0)),p);for(n in i=r.match(v)||[],b)a[n]?t[n]=e[b[n]]||"":t[n]="";if(t.protocol=t.protocol.replace(g,""),t.query=t.query.replace(m,""),t.hash=z(t.hash.replace(q,"")),t.user=z(i[1]||""),t.pass=z(i[2]||""),t.port=j[t.protocol]==t.port||0==t.port?"":t.port,!a.protocol&&C.test(r.charAt(0))&&(t.path=r.split("?")[0].split("#")[0]),!a.protocol&&o){var h=new U(x().match(w)[0]),u=h.path.split("/"),c=t.path.split("/"),f=["protocol","user","pass","host","port"],l=f.length;for(u.pop(),n=0;n<l;n++)t[f[n]]=h[f[n]];for(;".."===c[0];)u.pop(),c.shift();t.path=("/"!==r.charAt(0)?u.join("/"):"")+"/"+c.join("/")}t.path=t.path.replace(A,"/"),t.paths(t.paths()),t.query=new F(t.query)}function u(t){return encodeURIComponent(t).replace(o,"%27")}function z(t){return(t=(t=(t=t.replace(p," ")).replace(e,function(t,r,o,e){var n=parseInt(r,16)-224,i=parseInt(o,16)-128;if(0==n&&i<32)return t;var s=(n<<12)+(i<<6)+(parseInt(e,16)-128);return 65535<s?t:String.fromCharCode(s)})).replace(n,function(t,r,o){var e=parseInt(r,16)-192;if(e<2)return t;var n=parseInt(o,16)-128;return String.fromCharCode((e<<6)+n)})).replace(i,function(t,r){return String.fromCharCode(parseInt(r,16))})}function F(t){for(var r=t.split("&"),o=0,e=r.length;o<e;o++){var n=r[o].split("="),i=decodeURIComponent(n[0].replace(p," "));if(i){var s=void 0!==n[1]?z(n[1]):null;void 0===this[i]?this[i]=s:(this[i]instanceof Array||(this[i]=[this[i]]),this[i].push(s))}}}function U(t,r){h(this,t,!r)}F.prototype.toString=function(){var t,r,o="",e=u;for(t in this){var n=this[t];if(!(n instanceof Function||void 0===n))if(n instanceof Array){var i=n.length;if(!i){o+=(o?"&":"")+e(t)+"=";continue}for(r=0;r<i;r++){var s=n[r];void 0!==s&&(o+=o?"&":"",o+=e(t)+(null===s?"":"="+e(s)))}}else o+=o?"&":"",o+=e(t)+(null===n?"":"="+e(n))}return o},U.prototype.clearQuery=function(){for(var t in this.query)this.query[t]instanceof Function||delete this.query[t];return this},U.prototype.queryLength=function(){var t=0;for(var r in this.query)this.query[r]instanceof Function||t++;return t},U.prototype.isEmptyQuery=function(){return 0===this.queryLength()},U.prototype.paths=function(t){var r,o="",e=0;if(t&&t.length&&t+""!==t){for(this.isAbsolute()&&(o="/"),r=t.length;e<r;e++)t[e]=!e&&s.test(t[e])?t[e]:u(t[e]);this.path=o+t.join("/")}for(e=0,r=(t=("/"===this.path.charAt(0)?this.path.slice(1):this.path).split("/")).length;e<r;e++)t[e]=z(t[e]);return t},U.prototype.encode=u,U.prototype.decode=z,U.prototype.isAbsolute=function(){return this.protocol||"/"===this.path.charAt(0)},U.prototype.toString=function(){return(this.protocol&&this.protocol+"://")+(this.user&&u(this.user)+(this.pass&&":"+u(this.pass))+"@")+(this.host&&this.host)+(this.port&&":"+this.port)+(this.path&&this.path)+(this.query.toString()&&"?"+this.query)+(this.hash&&"#"+u(this.hash))},t[t.exports?"exports":"Url"]=U}("undefined"!=typeof module&&module.exports?module:window);


/*
 * jQuery Bootstrap Pagination v1.4.2
 * https://github.com/josecebe/twbs-pagination
 *
 * Copyright 2014-2018, Eugene Simakin <john-24@list.ru>
 * Released under Apache-2.0 license
 * http://apache.org/licenses/LICENSE-2.0.html
 */

!function(o,e,t,s){"use strict";var i=o.fn.twbsPagination,r=function(t,s){if(this.$element=o(t),this.options=o.extend({},o.fn.twbsPagination.defaults,s),this.options.startPage<1||this.options.startPage>this.options.totalPages)throw new Error("Start page option is incorrect");if(this.options.totalPages=parseInt(this.options.totalPages),isNaN(this.options.totalPages))throw new Error("Total pages option is not correct!");if(this.options.visiblePages=parseInt(this.options.visiblePages),isNaN(this.options.visiblePages))throw new Error("Visible pages option is not correct!");if(this.options.beforePageClick instanceof Function&&this.$element.first().on("beforePage",this.options.beforePageClick),this.options.onPageClick instanceof Function&&this.$element.first().on("page",this.options.onPageClick),this.options.hideOnlyOnePage&&1==this.options.totalPages)return this.options.initiateStartPageClick&&this.$element.trigger("page",1),this;if(this.options.href&&(this.options.startPage=this.getPageFromQueryString(),this.options.startPage||(this.options.startPage=1)),"UL"===("function"==typeof this.$element.prop?this.$element.prop("tagName"):this.$element.attr("tagName")))this.$listContainer=this.$element;else{var e=this.$element,i=o([]);e.each(function(t){var s=o("<ul></ul>");o(this).append(s),i.push(s[0])}),this.$listContainer=i,this.$element=i}return this.$listContainer.addClass(this.options.paginationClass),this.options.initiateStartPageClick?this.show(this.options.startPage):(this.currentPage=this.options.startPage,this.render(this.getPages(this.options.startPage)),this.setupEvents()),this};r.prototype={constructor:r,destroy:function(){return this.$element.empty(),this.$element.removeData("twbs-pagination"),this.$element.off("page"),this},show:function(t){if(t<1||t>this.options.totalPages)throw new Error("Page is incorrect.");this.currentPage=t,this.$element.trigger("beforePage",t);var s=this.getPages(t);return this.render(s),this.setupEvents(),this.$element.trigger("page",t),s},enable:function(){this.show(this.currentPage)},disable:function(){var t=this;this.$listContainer.off("click").on("click","li",function(t){t.preventDefault()}),this.$listContainer.children().each(function(){o(this).hasClass(t.options.activeClass)||o(this).addClass(t.options.disabledClass)})},buildListItems:function(t){var s=[];if(this.options.first&&s.push(this.buildItem("first",1)),this.options.prev){var e=1<t.currentPage?t.currentPage-1:this.options.loop?this.options.totalPages:1;s.push(this.buildItem("prev",e))}for(var i=0;i<t.numeric.length;i++)s.push(this.buildItem("page",t.numeric[i]));if(this.options.next){var a=t.currentPage<this.options.totalPages?t.currentPage+1:this.options.loop?1:this.options.totalPages;s.push(this.buildItem("next",a))}return this.options.last&&s.push(this.buildItem("last",this.options.totalPages)),s},buildItem:function(t,s){var e=o("<li></li>"),i=o("<a></a>"),a=this.options[t]?this.makeText(this.options[t],s):s;return e.addClass(this.options[t+"Class"]),e.data("page",s),e.data("page-type",t),e.append(i.attr("href",this.makeHref(s)).addClass(this.options.anchorClass).html(a)),e},getPages:function(t){var s=[],e=Math.floor(this.options.visiblePages/2),i=t-e+1-this.options.visiblePages%2,a=t+e,n=this.options.visiblePages;n>this.options.totalPages&&(n=this.options.totalPages),i<=0&&(i=1,a=n),a>this.options.totalPages&&(i=this.options.totalPages-n+1,a=this.options.totalPages);for(var o=i;o<=a;)s.push(o),o++;return{currentPage:t,numeric:s}},render:function(s){var e=this;this.$listContainer.children().remove();var t=this.buildListItems(s);o.each(t,function(t,s){e.$listContainer.append(s)}),this.$listContainer.children().each(function(){var t=o(this);switch(t.data("page-type")){case"page":t.data("page")===s.currentPage&&t.addClass(e.options.activeClass);break;case"first":t.toggleClass(e.options.disabledClass,1===s.currentPage);break;case"last":t.toggleClass(e.options.disabledClass,s.currentPage===e.options.totalPages);break;case"prev":t.toggleClass(e.options.disabledClass,!e.options.loop&&1===s.currentPage);break;case"next":t.toggleClass(e.options.disabledClass,!e.options.loop&&s.currentPage===e.options.totalPages)}})},setupEvents:function(){var e=this;this.$listContainer.off("click").on("click","li",function(t){var s=o(this);if(s.hasClass(e.options.disabledClass)||s.hasClass(e.options.activeClass))return!1;!e.options.href&&t.preventDefault(),e.show(parseInt(s.data("page")))})},changeTotalPages:function(t,s){return this.options.totalPages=t,this.show(s)},makeHref:function(t){return this.options.href?this.generateQueryString(t):"#"},makeText:function(t,s){return t.replace(this.options.pageVariable,s).replace(this.options.totalPagesVariable,this.options.totalPages)},getPageFromQueryString:function(t){var s=this.getSearchString(t),e=new RegExp(this.options.pageVariable+"(=([^&#]*)|&|#|$)").exec(s);return e&&e[2]?(e=decodeURIComponent(e[2]),e=parseInt(e),isNaN(e)?null:e):null},generateQueryString:function(t,s){var e=this.getSearchString(s),i=new RegExp(this.options.pageVariable+"=*[^&#]*");return e?"?"+e.replace(i,this.options.pageVariable+"="+t):""},getSearchString:function(t){var s=t||e.location.search;return""===s?null:(0===s.indexOf("?")&&(s=s.substr(1)),s)},getCurrentPage:function(){return this.currentPage},getTotalPages:function(){return this.options.totalPages}},o.fn.twbsPagination=function(t){var s,e=Array.prototype.slice.call(arguments,1),i=o(this),a=i.data("twbs-pagination"),n="object"==typeof t?t:{};return a||i.data("twbs-pagination",a=new r(this,n)),"string"==typeof t&&(s=a[t].apply(a,e)),void 0===s?i:s},o.fn.twbsPagination.defaults={totalPages:1,startPage:1,visiblePages:5,initiateStartPageClick:!0,hideOnlyOnePage:!1,href:!1,pageVariable:"{{page}}",totalPagesVariable:"{{total_pages}}",page:null,first:"First",prev:"Previous",next:"Next",last:"Last",loop:!1,beforePageClick:null,onPageClick:null,paginationClass:"pagination",nextClass:"page-item next",prevClass:"page-item prev",lastClass:"page-item last",firstClass:"page-item first",pageClass:"page-item",activeClass:"active",disabledClass:"disabled",anchorClass:"page-link"},o.fn.twbsPagination.Constructor=r,o.fn.twbsPagination.noConflict=function(){return o.fn.twbsPagination=i,this},o.fn.twbsPagination.version="1.4.2"}(window.jQuery,window,document);