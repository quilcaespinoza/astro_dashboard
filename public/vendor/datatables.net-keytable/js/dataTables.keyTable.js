!function(s){"function"==typeof define&&define.amd?define(["jquery","datatables.net"],function(e){return s(e,window,document)}):"object"==typeof exports?module.exports=function(e,t){return e||(e=window),t&&t.fn.dataTable||(t=require("datatables.net")(e,t).$),s(t,e,e.document)}:s(jQuery,window,document)}(function(b,y,p,v){"use strict";var l=b.fn.dataTable,a=function(e,t){if(!l.versionCheck||!l.versionCheck("1.10.8"))throw"KeyTable requires DataTables 1.10.8 or newer";this.c=b.extend(!0,{},l.defaults.keyTable,a.defaults,t),this.s={dt:new l.Api(e),enable:!0,focusDraw:!1,waitingForDraw:!1,lastFocus:null},this.dom={};var s=this.s.dt.settings()[0],n=s.keytable;if(n)return n;(s.keytable=this)._constructor()};return b.extend(a.prototype,{blur:function(){this._blur()},enable:function(e){this.s.enable=e},focus:function(e,t){this._focus(this.s.dt.cell(e,t))},focused:function(e){if(!this.s.lastFocus)return!1;var t=this.s.lastFocus.cell.index();return e.row===t.row&&e.column===t.column},_constructor:function(){this._tabInput();var o=this,l=this.s.dt,e=b(l.table().node());if("static"===e.css("position")&&e.css("position","relative"),b(l.table().body()).on("click.keyTable","th, td",function(e){if(!1!==o.s.enable){var t=l.cell(this);t.any()&&o._focus(t,null,!1,e)}}),b(p).on("keydown.keyTable",function(e){o._key(e)}),this.c.blurable&&b(p).on("mousedown.keyTable",function(e){b(e.target).parents(".dataTables_filter").length&&o._blur(),b(e.target).parents().filter(l.table().container()).length||b(e.target).parents("div.DTE").length||b(e.target).parents("div.editor-datetime").length||b(e.target).parents().filter(".DTFC_Cloned").length||o._blur()}),this.c.editor){var n=this.c.editor;n.on("open.keyTableMain",function(e,t,s){"inline"!==t&&o.s.enable&&(o.enable(!1),n.one("close.keyTable",function(){o.enable(!0)}))}),this.c.editOnFocus&&l.on("key-focus.keyTable key-refocus.keyTable",function(e,t,s,n){o._editor(null,n)}),l.on("key.keyTable",function(e,t,s,n,i){o._editor(s,i)})}l.settings()[0].oFeatures.bStateSave&&l.on("stateSaveParams.keyTable",function(e,t,s){s.keyTable=o.s.lastFocus?o.s.lastFocus.cell.index():null}),l.on("draw.keyTable",function(e){if(!o.s.focusDraw){var t=o.s.lastFocus;if(t&&t.node&&b(t.node).closest("body")===p.body){var s=o.s.lastFocus.relative,n=l.page.info(),i=s.row+n.start;if(0===n.recordsDisplay)return;i>=n.recordsDisplay&&(i=n.recordsDisplay-1),o._focus(i,s.column,!0,e)}}}),l.on("destroy.keyTable",function(){l.off(".keyTable"),b(l.table().body()).off("click.keyTable","th, td"),b(p.body).off("keydown.keyTable").off("click.keyTable")});var t=l.state.loaded();t&&t.keyTable?l.one("init",function(){var e=l.cell(t.keyTable);e.any()&&e.focus()}):this.c.focus&&l.cell(this.c.focus).focus()},_blur:function(){if(this.s.enable&&this.s.lastFocus){var e=this.s.lastFocus.cell;b(e.node()).removeClass(this.c.className),this.s.lastFocus=null,this._updateFixedColumns(e.index().column),this._emitEvent("key-blur",[this.s.dt,e])}},_clipboardCopy:function(){var e=this.s.dt;if(this.s.lastFocus&&y.getSelection&&!y.getSelection().toString()){var t=this.s.lastFocus.cell.render("display"),s=b("<div/>").css({height:1,width:1,overflow:"hidden",position:"fixed",top:0,left:0}),n=b("<textarea readonly/>").val(t).appendTo(s);try{s.appendTo(e.table().container()),n[0].focus(),n[0].select(),p.execCommand("copy")}catch(e){}s.remove()}},_columns:function(){var e=this.s.dt,t=e.columns(this.c.columns).indexes(),s=[];return e.columns(":visible").every(function(e){-1!==t.indexOf(e)&&s.push(e)}),s},_editor:function(e,t){var s=this,n=this.s.dt,i=this.c.editor;b("div.DTE",this.s.lastFocus.cell.node()).length||16!==e&&(t.stopPropagation(),13===e&&t.preventDefault(),i.one("open.keyTable",function(){i.off("cancelOpen.keyTable"),s.c.editAutoSelect&&b("div.DTE_Field_InputControl input, div.DTE_Field_InputControl textarea").select(),n.keys.enable(s.c.editorKeys),n.one("key-blur.editor",function(){i.displayed()&&i.submit()}),i.one("close",function(){n.keys.enable(!0),n.off("key-blur.editor")})}).one("cancelOpen.keyTable",function(){i.off("open.keyTable")}).inline(this.s.lastFocus.cell.index()))},_emitEvent:function(s,n){this.s.dt.iterator("table",function(e,t){b(e.nTable).triggerHandler(s,n)})},_focus:function(e,t,s,n){var i=this,o=this.s.dt,l=o.page.info(),a=this.s.lastFocus;if(n||(n=null),this.s.enable){if("number"!=typeof e){var r=e.index();t=r.column,e=o.rows({filter:"applied",order:"applied"}).indexes().indexOf(r.row),l.serverSide&&(e+=l.start)}if(-1!==l.length&&(e<l.start||e>=l.start+l.length))return this.s.focusDraw=!0,this.s.waitingForDraw=!0,void o.one("draw",function(){i.s.focusDraw=!1,i.s.waitingForDraw=!1,i._focus(e,t,v,n)}).page(Math.floor(e/l.length)).draw(!1);if(-1!==b.inArray(t,this._columns())){l.serverSide&&(e-=l.start);var c=o.cells(null,t,{search:"applied",order:"applied"}).flatten(),u=o.cell(c[e]);if(a){if(a.node===u.node())return void this._emitEvent("key-refocus",[this.s.dt,u,n||null]);this._blur()}var d=b(u.node());if(d.addClass(this.c.className),this._updateFixedColumns(t),s===v||!0===s){this._scroll(b(y),b(p.body),d,"offset");var f=o.table().body().parentNode;if(f!==o.table().header().parentNode){var h=b(f.parentNode);this._scroll(h,h,d,"position")}}this.s.lastFocus={cell:u,node:u.node(),relative:{row:o.rows({page:"current"}).indexes().indexOf(u.index().row),column:u.index().column}},this._emitEvent("key-focus",[this.s.dt,u,n||null]),o.state.save()}}},_key:function(e){if(this.s.waitingForDraw)e.preventDefault();else{var t=this.s.enable,s=!0===t||"navigation-only"===t;if(t)if(e.ctrlKey&&67===e.keyCode)this._clipboardCopy();else if(!(0===e.keyCode||e.ctrlKey||e.metaKey||e.altKey))if(this.s.lastFocus){var n=this.s.dt;if(!this.c.keys||-1!==b.inArray(e.keyCode,this.c.keys))switch(e.keyCode){case 9:this._shift(e,e.shiftKey?"left":"right",!0);break;case 27:this.s.blurable&&!0===t&&this._blur();break;case 33:case 34:s&&(e.preventDefault(),n.page(33===e.keyCode?"previous":"next").draw(!1));break;case 35:case 36:if(s){e.preventDefault();var i=n.cells({page:"current"}).indexes(),o=this._columns();this._focus(n.cell(i[35===e.keyCode?i.length-1:o[0]]),null,!0,e)}break;case 37:s&&this._shift(e,"left");break;case 38:s&&this._shift(e,"up");break;case 39:s&&this._shift(e,"right");break;case 40:s&&this._shift(e,"down");break;default:!0===t&&this._emitEvent("key",[n,e.keyCode,this.s.lastFocus.cell,e])}}}},_scroll:function(e,t,s,n){var i=s[n](),o=s.outerHeight(),l=s.outerWidth(),a=t.scrollTop(),r=t.scrollLeft(),c=e.height(),u=e.width();"position"===n&&(i.top+=parseInt(s.closest("table").css("top"),10)),i.top<a&&t.scrollTop(i.top),i.left<r&&t.scrollLeft(i.left),i.top+o>a+c&&o<c&&t.scrollTop(i.top+o-c),i.left+l>r+u&&l<u&&t.scrollLeft(i.left+l-u)},_shift:function(e,t,s){var n=this.s.dt,i=n.page.info(),o=i.recordsDisplay,l=this.s.lastFocus.cell,a=this._columns();if(l){var r=n.rows({filter:"applied",order:"applied"}).indexes().indexOf(l.index().row);i.serverSide&&(r+=i.start);var c=n.columns(a).indexes().indexOf(l.index().column),u=r,d=a[c];"right"===t?c>=a.length-1?(u++,d=a[0]):d=a[c+1]:"left"===t?0===c?(u--,d=a[a.length-1]):d=a[c-1]:"up"===t?u--:"down"===t&&u++,0<=u&&u<o&&-1!==b.inArray(d,a)?(e.preventDefault(),this._focus(u,d,!0,e)):s&&this.c.blurable?this._blur():e.preventDefault()}},_tabInput:function(){var t=this,s=this.s.dt,e=null!==this.c.tabIndex?this.c.tabIndex:s.settings()[0].iTabIndex;-1!=e&&b('<div><input type="text" tabindex="'+e+'"/></div>').css({position:"absolute",height:1,width:0,overflow:"hidden"}).insertBefore(s.table().node()).children().on("focus",function(e){s.cell(":eq(0)",{page:"current"}).any()&&t._focus(s.cell(":eq(0)","0:visible",{page:"current"}),null,!0,e)})},_updateFixedColumns:function(e){var t=this.s.dt,s=t.settings()[0];if(s._oFixedColumns){var n=s._oFixedColumns.s.iLeftColumns,i=s.aoColumns.length-s._oFixedColumns.s.iRightColumns;(e<n||i<=e)&&t.fixedColumns().update()}}}),a.defaults={blurable:!0,className:"focus",columns:"",editor:null,editorKeys:"navigation-only",editAutoSelect:!0,editOnFocus:!1,focus:null,keys:null,tabIndex:null},a.version="2.3.2",b.fn.dataTable.KeyTable=a,b.fn.DataTable.KeyTable=a,l.Api.register("cell.blur()",function(){return this.iterator("table",function(e){e.keytable&&e.keytable.blur()})}),l.Api.register("cell().focus()",function(){return this.iterator("cell",function(e,t,s){e.keytable&&e.keytable.focus(t,s)})}),l.Api.register("keys.disable()",function(){return this.iterator("table",function(e){e.keytable&&e.keytable.enable(!1)})}),l.Api.register("keys.enable()",function(t){return this.iterator("table",function(e){e.keytable&&e.keytable.enable(t===v||t)})}),l.ext.selector.cell.push(function(e,t,s){var n=t.focused,i=e.keytable,o=[];if(!i||n===v)return s;for(var l=0,a=s.length;l<a;l++)(!0===n&&i.focused(s[l])||!1===n&&!i.focused(s[l]))&&o.push(s[l]);return o}),b(p).on("preInit.dt.dtk",function(e,t,s){if("dt"===e.namespace){var n=t.oInit.keys,i=l.defaults.keys;if(n||i){var o=b.extend({},i,n);!1!==n&&new a(t,o)}}}),a});