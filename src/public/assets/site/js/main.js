!function(e){var t={};function n(r){if(t[r])return t[r].exports;var i=t[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(r,i,function(t){return e[t]}.bind(null,i));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=9)}({0:function(e,t){e.exports=jQuery},9:function(e,t,n){(function(e){e(document).ready((function(){var t=new Swiper(".intro-slider .swiper-container",{pagination:{el:".swiper-pagination",type:"bullets",clickable:!0},on:{slideChange:function(){var n=t.activeIndex+1;e(".fraction .current").text(n)}},effect:"fade",fadeEffect:{crossFade:!0},breakpoints:{1024:{noSwipingClass:"no-swipe"}}}),n=(new Swiper(".advantages .swiper-container",{slidesPerView:"auto",spaceBetween:30,freeModeMomentumRatio:.6,freeModeMomentumVelocityRatio:.6,breakpoints:{1024:{freeMode:!0}}}),new Swiper(".feedback-thumbs .swiper-container",{slidesPerView:"auto",spaceBetween:24,watchSlidesVisibility:!0,watchSlidesProgress:!0,breakpoints:{768:{spaceBetween:32}}}));new Swiper(".feedback-top .swiper-container",{spaceBetween:100,pagination:{el:".swiper-pagination",type:"progressbar"},thumbs:{swiper:n}});e(".to-services").click((function(){e("html, body").animate({scrollTop:e(".services-body").offset().top},400)}))}))}).call(this,n(0))}});