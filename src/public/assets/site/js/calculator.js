!function(e){var n={};function t(a){if(n[a])return n[a].exports;var i=n[a]={i:a,l:!1,exports:{}};return e[a].call(i.exports,i,i.exports,t),i.l=!0,i.exports}t.m=e,t.c=n,t.d=function(e,n,a){t.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:a})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,n){if(1&n&&(e=t(e)),8&n)return e;if(4&n&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(t.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&n&&"string"!=typeof e)for(var i in e)t.d(a,i,function(n){return e[n]}.bind(null,i));return a},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},t.p="",t(t.s=14)}({0:function(e,n){e.exports=jQuery},14:function(e,n,t){(function(e){function n(n,t){e("option[data-os]").hide(),e("option[data-family=".concat(n,"-").concat(t,"]")).show(),e("select[name='vm']").val(e("[data-family=".concat(n,"-").concat(t,"]")).val())}function t(n){e("option[data-disc-family]").hide(),e("option[data-disc-family=".concat(n,"]")).show(),e("select[name='disc-size']").val(e("[data-disc-family=".concat(n,"]")).val())}function a(e){switch(e){case"weeks":return 168;case"months":return 720;default:return 1}}function i(){var n=Number(e("[name='vm']").val())*Number(e("[name='vm-qty']").val())*(Number(e("[name='vm-duration']").val())*a(e("[name='vm-duration-type']").val())),t=Number(e("[name='disc-size']").val())*Number(e("[name='disc-qty']").val())*(Number(e("[name='disc-duration']").val())*a(e("[name='disc-duration-type']").val()));e(".price span").text((n+t).toFixed(2))}e(document).ready((function(){var a,o,c,r,u,l=e(".decrement"),m=e(".increment"),d=e(".number-input");m.on("click",(function(){a=e(this).closest(".field-item").find("input"),o=Number(a.val()),a.val(o+1),a.trigger("change")})),l.on("click",(function(){a=e(this).closest(".field-item").find("input"),0!==(o=Number(a.val()))&&(a.val(o-1),a.trigger("change"))})),d.on("change",(function(){Number(e(this).val())<0&&e(this).val("1")})),c=e("[name='os']:checked").val(),r=e("[name='os-family']:checked").val(),u=e("[name='disc-family']:checked").val(),n(c,r),t(u),i();var s=e("[name='os']"),f=e("[name='os-family']");s.on("change",(function(){n(e(this).val(),e("[name='os-family']:checked").val()),i()})),f.on("change",(function(){var t=e(this).val();n(e("[name='os']:checked").val(),t),i()})),e("[name='disc-family']").on("change",(function(){t(e(this).val()),i()})),[e("[name='vm']"),e("[name='vm-qty']"),e("[name='vm-duration']"),e("[name='vm-duration-type']"),e("[name='disc-size']"),e("[name='disc-qty']"),e("[name='disc-duration']"),e("[name='disc-duration-type']")].forEach((function(e){return e.on("change",i)}))}))}).call(this,t(0))}});