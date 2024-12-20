"use strict";(self.blocksyJsonP=self.blocksyJsonP||[]).push([[79],{8079:function(t,e,n){n.r(e),n.d(e,{Flexy:function(){return T},mount:function(){return P}});var i=n(2194),r=n.n(i);const o=["style"];function s(t,e){if(null==t)return{};var n,i,r=function(t,e){if(null==t)return{};var n,i,r={},o=Object.keys(t);for(i=0;i<o.length;i++)n=o[i],e.indexOf(n)>=0||(r[n]=t[n]);return r}(t,e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);for(i=0;i<o.length;i++)n=o[i],e.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(t,n)&&(r[n]=t[n])}return r}function l(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);e&&(i=i.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,i)}return n}function a(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?l(Object(n),!0).forEach((function(e){u(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):l(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function u(t,e,n){return(e=function(t){var e=function(t,e){if("object"!=typeof t||null===t)return t;var n=t[Symbol.toPrimitive];if(void 0!==n){var i=n.call(t,e||"default");if("object"!=typeof i)return i;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}(t,"string");return"symbol"==typeof e?e:String(e)}(e))in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function c(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}const d=function(t,e){return"vertical"===e.options.orientation?t.top+t.height:t.right},f=function(t,e){return"vertical"===e.options.orientation?t.top:t.left},p=function(t,e){return"vertical"===e.options.orientation?t.height:t.width},h=function(t,e){let n="pageX";"vertical"===e.options.orientation&&(n="pageY");let i=t[n];return!i&&t.touches&&t.touches[0]&&(i=t.touches[0][n]),i},m=function(t){let e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;if(!t)return null;if(t.getBoundingClientRect&&!t.firstElementChild)return t.getBoundingClientRect();e||(e=t);let{top:n,left:i,right:r,width:o,height:s}=t.getBoundingClientRect(),l=window.getComputedStyle(e).transform.split(/\(|,|\)/).slice(1,-1).map((function(t){return parseFloat(t)}));if(6!=l.length)return t.getBoundingClientRect();var a=l;let u=a[0]*a[3]-a[1]*a[2];return{width:o/a[0],height:s/a[3],left:(i*a[3]-n*a[2]+a[2]*a[5]-a[4]*a[3])/u,right:(r*a[3]-n*a[2]+a[2]*a[5]-a[4]*a[3])/u,top:(-i*a[1]+n*a[0]+a[4]*a[1]-a[0]*a[5])/u}},g=function(){return"ontouchstart"in window||navigator.maxTouchPoints>0||navigator.msMaxTouchPoints>0},y=function(t){return t?t&&"[object Function]"==={}.toString.call(t)?t():t:null};class v{constructor(t,e){var n=this;c(this,"options",{mountListeners:!0}),c(this,"flexyInstance",null),c(this,"navigate",(function(){let t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"right";const e=n.flexyInstance;let i="left"===t?1:-1;const r=e.state.slideWidth;let o=100*Math.round(100*e.state.positionX/r/100)*r/100+r*i;e.state=a(a({},e.state),{},{positionTarget:o})})),this.flexyInstance=t,this.options=a(a({},this.options),e),this.options.mountListeners&&this.mountArrowsListeners()}mountArrowsListeners(){var t=this;if(!this.options.mountListeners)return;const e=this.flexyInstance.options.leftArrow,n=this.flexyInstance.options.rightArrow;e&&e.addEventListener("click",(function(e){e.preventDefault(),t.navigate("left")})),n&&n.addEventListener("click",(function(e){e.preventDefault(),t.navigate("right")}))}}const C=function(t){let e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(e=a({rootEl:null},e),e.rootEl&&t.el!==e.rootEl&&t.elComputed.minHeight&&parseFloat(t.elComputed.minHeight)===t.height)return 0;const n=t.childrenHeight.reduce((function(e,n,i){let r=parseFloat(t.childrenComputed[i].marginTop);return"auto"===t.childrenComputed[i].getPropertyValue("--card-element-margin-start")&&(r=0),e+n+r+parseFloat(t.childrenComputed[i].marginBottom)}),0)+parseFloat(t.elComputed.paddingTop)+parseFloat(t.elComputed.paddingBottom);return t.totalChildrenHeight>=t.height?0:t.height-n},b=function(t){t.childrenHeight.every((function(e,n){return e>=t.height}));return 0},E=function(t){const e=y(t.sliderContainer),n=(y(t.options.flexyAttributeEl),Math.round(t.state.containerInnerWidth/t.state.slideWidth));let i=[...e.children],r=i.slice(t.state.previousCurrentIndex,t.state.previousCurrentIndex+n);r.length<n&&i.length>n&&(r=[...r,...i.slice(0,n-r.length)]);const o=r.map((function(t,e){const n=t.getBoundingClientRect().height,i=function(t){const e=t;if(!t)return 0;const n=[t,...t.querySelectorAll("*")].map((function(t){let e=[...t.children].map((function(t){const e=t.getBoundingClientRect();return{el:t,elComputed:window.getComputedStyle(t),rect:e,height:e.height}}));e=e.filter((function(t){return"absolute"!==t.elComputed.position&&0!==t.rect.height}));let n="row";if(e.length>1){const t=e[0];e[1].rect.left>=t.rect.right&&(n="column")}return{el:t,elComputed:window.getComputedStyle(t),height:t.getBoundingClientRect().height,orientation:n,childrenComputed:e.map((function(t){let{elComputed:e}=t;return e})),childrenHeight:e.map((function(t){let{height:e}=t;return e}))}})),i=n.filter((function(t){return 0!==t.childrenComputed.length&&(!n.find((function(e){return"column"===e.orientation&&e.el.contains(t.el)&&e.el!==t.el}))&&("absolute"!==t.elComputed.position&&!t.childrenComputed.some((function(t){return"inline"===t.display&&"absolute"!==t.position}))))})).map((function(t){return a(a({},t),{},{voidSpace:Math.round("row"===t.orientation?C(t,{rootEl:e}):b(t))})})).filter((function(t){return t.voidSpace>0}));return 1===i.length?i.reduce((function(t,e){return t+e.voidSpace}),0):0}(t);return n-i})),s=Math.round(Math.max(...o));s!==Math.round(parseFloat(e.parentNode.style.getPropertyValue("--flexy-view-height")))&&e.parentNode.style.setProperty("--flexy-view-height",s+"px")};function x(t){return null==t||t.matches("html")?null:t.scrollHeight>t.clientHeight?t:x(t.parentNode)}class w{constructor(t){var e=this;c(this,"options",{mountDragAndDropEventListener:!0}),c(this,"flexyInstance",null),c(this,"getState",(function(){})),c(this,"setState",(function(){})),c(this,"handleDown",(function(t){if(!e.getState().sliderActivated)return;const n=y(e.flexyInstance.sliderContainer);if(e.flexyInstance.options.elementsThatDoNotStartDrag.reduce((function(e,n){return!!e||(t.target.matches(n)||t.target.closest(n))}),!1))return;const i=t.type;e.options.mountDragAndDropEventListener&&(t.stopPropagation(),"touchstart"!==t.type&&t.preventDefault());let r=!1;"touchstart"===i?e.setState(a(a({},e.getState()),{},{startX:h(t,e.flexyInstance),endX:h(t,e.flexyInstance)})):e.setState(a(a({},e.getState()),{},{startX:h(t,e.flexyInstance),endX:h(t,e.flexyInstance),mouseDown:!0,positionSnapshot:e.getState().positionX}));const o=function(t){let r=!0;if("touchstart"===i&&(r=!1,e.getState().mouseDown&&(r=!0),!e.getState().mouseDown)){let n=h(t,e.flexyInstance);n||(n=e.getState().startX),Math.abs(n-e.getState().startX)<=3&&(r=!0)}if(!r)return;t.stopPropagation(),e.setState(a(a({},e.getState()),{},{mouseDown:!1})),document.removeEventListener("mousemove",s),document.removeEventListener("mouseup",o),document.removeEventListener("touchmove",s),document.removeEventListener("touchend",o),document.removeEventListener("scroll",l),x(t.target)&&x(t.target).removeEventListener("scroll",l);let u=e.getState();const c=p(m(n.firstElementChild,y(e.flexyInstance.options.nullifyTransformEl)),e.flexyInstance);let d=100*u.positionX/c;e.setState(a(a({},e.getState()),{},{positionTarget:c*(Math.abs(u.endX-u.startX)>50?u.endX-u.startX<0?100*Math.floor(d/100):100*Math.ceil(d/100):100*Math.round(d/100))/100}))},s=function(t){let n=h(t,e.flexyInstance);if(r)return void o(t);if("touchstart"===i&&!e.getState().mouseDown)return void(Math.abs(n-e.getState().startX)>3&&(e.flexyInstance.options.onDragStart(t),e.setState(a(a({},e.getState()),{},{startX:h(t,e.flexyInstance),endX:h(t,e.flexyInstance),mouseDown:!0,positionSnapshot:e.getState().positionX})),r=!1,document.removeEventListener("scroll",l),x(t.target)&&x(t.target).removeEventListener("scroll",l)));t.preventDefault();let s=e.getState();e.setState(a(a({},s),{},{endX:n}))},l=function(t){r=!0};document.addEventListener(g()?"touchmove":"mousemove",s,{passive:!1}),document.addEventListener(g()?"touchend":"mouseup",o,{passive:!1}),document.addEventListener("scroll",l),x(t.target)&&x(t.target).addEventListener("scroll",l)})),this.options=a(a({},this.options),t)}handleDragFor(t,e,n){var i=this;if(!t.options.hasDragAndDrop)return;this.flexyInstance=t,this.getState=e,this.setState=n;const r=y(t.sliderContainer);this.options.mountDragAndDropEventListener&&r.addEventListener(g()?"touchstart":"mousedown",this.handleDown,{passive:!1}),t.options.initialDragEvent&&requestAnimationFrame((function(){i.handleDown(t.options.initialDragEvent)}))}}const S="__DESTROYED__";class T{constructor(t){var e=this;let n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};c(this,"getDefaultState",(function(){return{elementsOnBehind:1,positionSnapshot:0,positionX:0,positionTarget:0,velocity:0,containerInnerWidth:e.sliderContainer?p(m(y(e.sliderContainer),y(e.nullifyTransformEl)),e):0,slideWidth:e.sliderContainer?p(m(e.sliderContainer.firstElementChild,e.sliderContainer),e):0,previousCurrentIndex:0,startX:0,endX:0,mouseDown:!1,recalculationScheduled:!1,lastTimeAnimated:1/0}})),c(this,"state",this.getDefaultState()),c(this,"options",{onDragStart:function(){},onSlideChange:function(){},autoplay:!1,scaleRotateEffect:!1,pillsContainerSelector:null,pillsFlexyInstance:null,flexyAttributeEl:null,initialDragEvent:null,wrapAroundMode:"container",orientation:"horizontal",nullifyTransformEl:null,elementsThatDoNotStartDrag:[],hasDragAndDrop:!0,onRender:function(){},dragAndDropOptions:{},arrowsOptions:{}}),c(this,"sliderContainer",null),c(this,"dragAndDrop",null),c(this,"sliderArrows",null),c(this,"drawLoop",(function(){let t=arguments.length>0&&void 0!==arguments[0]&&arguments[0];if(e.state.sliderActivated===S)return;if(!y(e.sliderContainer))return void requestAnimationFrame((function(){return e.drawLoop()}));let n=t?1/0:e.state.positionX;(e.state.containerInnerWidth!==m(y(e.sliderContainer),y(e.nullifyTransformEl)).width||e.state.recalculationScheduled)&&e.refreshActivation();let i=e.state,r={};if(e.state.sliderActivated){let t=i.velocity+(e.state.mouseDown?e.state.positionSnapshot+(e.state.endX-e.state.startX)-e.state.positionX-e.state.velocity:.02*(e.state.positionTarget-e.state.positionX));r.velocity=.72*t,r.positionX=e.state.positionX+t}if(e.state.sliderActivated&&(Math.abs(e.state.containerInnerWidth-p(m(y(e.sliderContainer),y(e.nullifyTransformEl)),e))>1||e.state.recalculationScheduled)&&(r.positionX=Math.round(p(m(y(e.sliderContainer).firstElementChild,y(e.options.nullifyTransformEl)),e)*(100*Math.round(e.state.positionX/e.state.slideWidth))/100),r.positionTarget=Math.round(p(m(y(e.sliderContainer).firstElementChild,y(e.options.nullifyTransformEl)),e)*(100*Math.round(e.state.positionX/e.state.slideWidth))/100),r.recalculationScheduled=!1),r.scrollPosition={x:window.pageXOffset,y:window.pageYOffset},r.containerInnerWidth=p(m(y(e.sliderContainer),y(e.nullifyTransformEl)),e),r.slideWidth=p(m(y(e.sliderContainer).firstElementChild,y(e.options.nullifyTransformEl)),e),e.state=a(a({},e.state),r),(n!==e.state.positionX||Math.abs(e.state.positionX-e.state.positionTarget)>.1)&&!t&&e.state.sliderActivated){let{relativeDelta:t,elementsOnBehind:n}=function(t,e){let n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"left",i=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"container";const r=y(t.sliderContainer);let o=0;if("left"===n){let n=[...r.children].reduce((function(e,n){let i=f(m(e,y(t.options.nullifyTransformEl)),t);return f(m(n,y(t.options.nullifyTransformEl)),t)<i?n:e}),{getBoundingClientRect:function(){return{left:1e11,bottom:1e11,top:1e11,right:1e11}}});f(m(n,y(t.options.nullifyTransformEl)),t)>("container"===i?f(m(r,y(t.options.nullifyTransformEl)),t):0)&&(o=-1*p(m(r.firstElementChild,y(t.options.nullifyTransformEl)),t),e=e===r.children.length?1:e+1)}if("right"===n){let n=[...r.children].reduce((function(e,n){return d(m(e,y(t.options.nullifyTransformEl)),t)>d(m(n,y(t.options.nullifyTransformEl)),t)?e:n}),{getBoundingClientRect:function(){return{left:-1,bottom:-9999999999999,top:-1,right:-1}}});d(m(n,y(t.options.nullifyTransformEl)),t)<("container"===i?d(m(r,y(t.options.nullifyTransformEl)),t):window.innerWidth)&&(o=p(m(r.firstElementChild,y(t.options.nullifyTransformEl)),t),e=1===e?r.children.length:e-1)}return{relativeDelta:o,elementsOnBehind:e}}(e,e.state.elementsOnBehind,e.state.mouseDown?e.state.endX<=e.state.startX?"right":"left":e.state.positionX>=e.state.positionTarget?"right":"left",e.options.wrapAroundMode);e.state=a(a({},e.state),{},{elementsOnBehind:n,positionTarget:e.state.positionTarget+t,positionX:e.state.positionX+t,positionSnapshot:e.state.positionSnapshot+t})}let o=e.state.previousCurrentIndex;var s,l,u;if(!e.state.mouseDown&&e.state.sliderActivated&&(Math.abs(e.state.positionX-e.state.positionTarget)<.2&&(e.state=a(a({},e.state),{},{positionX:e.state.positionTarget,velocity:0})),e.state=a(a({},e.state),{},{previousCurrentIndex:(s=e.state.elementsOnBehind>Math.round(Math.abs(e.state.positionTarget)/p(m(y(e.sliderContainer).firstElementChild,y(e.options.nullifyTransformEl)),e))?Math.round(Math.abs(e.state.positionTarget)/p(m(y(e.sliderContainer).firstElementChild,y(e.options.nullifyTransformEl)),e))+(y(e.sliderContainer).children.length-e.state.elementsOnBehind):Math.abs(Math.round(Math.abs(e.state.positionTarget)/p(m(y(e.sliderContainer).firstElementChild,y(e.options.nullifyTransformEl)),e))-e.state.elementsOnBehind),l=0,u=y(e.sliderContainer).children.length-1,Math.min(Math.max(s,l),u))})),e.state.positionX!==n&&e.state.sliderActivated&&(e.state.positionX===e.state.positionTarget||y(e.options.flexyAttributeEl).hasAttribute("data-flexy-moving")||(!function(t){const e=y(t.sliderContainer),n=e.parentNode.getBoundingClientRect().height;e.parentNode.style.setProperty("--flexy-view-height",n+"px")}(e),y(e.options.flexyAttributeEl).dataset.flexyMoving=""),e.render(),i.positionX!==i.positionTarget&&e.state.positionX===e.state.positionTarget&&(y(e.options.flexyAttributeEl).removeAttribute("data-flexy-moving"),y(e.sliderContainer).parentNode.removeAttribute("style")),e.state=a(a({},e.state),{},{lastTimeAnimated:(new Date).getTime()})),!e.state.mouseDown&&e.state.sliderActivated&&o!==e.state.previousCurrentIndex&&(!function(t){if(t.options.pillsContainerSelector&&(t.options.pillsContainerSelector.querySelector(".active")&&t.options.pillsContainerSelector.querySelector(".active").classList.remove("active"),t.options.pillsContainerSelector.children[t.state.previousCurrentIndex].classList.add("active"),t.options.pillsFlexyInstance)){let e=t.options.pillsFlexyInstance.flexy,n=[...t.options.pillsContainerSelector.children];const i=y(e.sliderContainer);let r=[...i.children].indexOf([...i.children].reduce((function(t,n){let r=f(m(t,y(e.options.nullifyTransformEl)),e),o=f(m(n,e.options.nullifyTransformEl),e);return Math.abs(o-f(m(i,y(e.options.nullifyTransformEl)),e))<Math.abs(r-f(m(i,y(e.options.nullifyTransformEl)),e))?n:t}),{getBoundingClientRect:function(){return{left:1e11,top:1e11}}})),o=0;if("horizontal"===e.options.orientation){let e=Math.round(m(i).width/m(i.firstElementChild).width);o=Math.max(t.state.previousCurrentIndex+1-e,0),i.closest('[data-type="circle"]')&&(o=Math.max(t.state.previousCurrentIndex-2,0),n.length-1-t.state.previousCurrentIndex<3&&(o=n.length-5))}else o=t.state.previousCurrentIndex;let s=Math.abs(o-r),l=Math.min(r,o)+(n.length-Math.max(r,o)),u=Math.min(s,l)*(l>=s?r>o?1:-1:r>o?-1:1),c=100*Math.round(100*e.state.positionX/p(m(i.firstElementChild,y(e.options.nullifyTransformEl)),e)/100)*p(m(i.firstElementChild,y(e.options.nullifyTransformEl)),e)/100+p(m(i.firstElementChild,y(e.options.nullifyTransformEl)),e)*u;e.state=a(a({},e.state),{},{positionTarget:c})}}(e),e.options.onSlideChange(e,{currentIndex:e.state.previousCurrentIndex,previousIndex:o}),E(e)),e.options.autoplay&&e.state.sliderActivated){const t=parseFloat(e.options.autoplay,10)||3;if(Math.abs(e.state.positionX-e.state.positionTarget)<.5){((new Date).getTime()-e.state.lastTimeAnimated)/1e3>t&&(e.state=a(a({},e.state),{},{positionTarget:e.state.positionX-p(m(y(e.sliderContainer).firstElementChild,y(e.options.nullifyTransformEl)),e)}))}}requestAnimationFrame((function(){return e.drawLoop()}))})),this.options=a(a({},this.options),{},{flexyAttributeEl:t,nullifyTransformEl:t},n),this.sliderContainer=t,this.sliderArrows=new v(this,this.options.arrowsOptions),function(t){if(!t.options.pillsContainerSelector)return;let e=[...t.options.pillsContainerSelector.children];const n=y(t.sliderContainer),i=function(i){let r=[...n.children].indexOf([...n.children].reduce((function(e,i){let r=f(m(e,y(t.options.nullifyTransformEl)),t),o=f(m(i,y(t.options.nullifyTransformEl)),t);return Math.abs(o-f(m(n,y(t.options.nullifyTransformEl)),t))<Math.abs(r-f(m(n,y(t.options.nullifyTransformEl)),t))?i:e}),{getBoundingClientRect:function(){return{left:1e11}}})),o=e.indexOf(i);t.options.pillsContainerSelector.querySelector(".active")&&t.options.pillsContainerSelector.querySelector(".active").classList.remove("active"),i.classList.add("active");let s=Math.abs(o-r),l=Math.min(r,o)+(e.length-Math.max(r,o)),u=Math.min(s,l)*(l>=s?r>o?1:-1:r>o?-1:1),c=100*Math.round(100*t.state.positionX/p(m(n.firstElementChild,y(t.options.nullifyTransformEl)),t)/100)*p(m(n.firstElementChild,y(t.options.nullifyTransformEl)),t)/100+p(m(n.firstElementChild,y(t.options.nullifyTransformEl)),t)*u;t.state=a(a({},t.state),{},{positionTarget:c})};t.options.initialDragEvent&&t.options.initialDragEvent.target.closest(".flexy-pills > * > *")&&setTimeout((function(){i(t.options.initialDragEvent.target.closest(".flexy-pills > * > *"))})),e.map((function(t){return t.addEventListener("click",(function(e){setTimeout((function(){e.defaultPrevented||i(t),e.preventDefault()}))}))}))}(this),function(t){const e=function(t){let e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return(n=t)&&"[object Function]"==={}.toString.call(n)?t(e):t;var n}(t.sliderContainer);if(!t.options.autoplay)return;const n=function(){t.state.sliderActivated&&(t.options=a(a({},t.options),{},{autoplay:!1,_autoplay:t.options.autoplay}))},i=function(){t.state.sliderActivated&&(t.options=a(a({},t.options),{},{autoplay:t.options._autoplay,_autoplay:!1}),t.state=a(a({},t.state),{},{lastTimeAnimated:(new Date).getTime()}))};e.addEventListener("mouseenter",n),e.addEventListener("mouseleave",i),new IntersectionObserver((function(e){e.map((function(e){let{target:r,isIntersecting:o,intersectionRatio:s}=e;if(o){if(!Object.keys(t.options).includes("_autoplay"))return;i()}o||n()}))}),{}).observe(e)}(this),this.dragAndDrop=new w(this.options.dragAndDropOptions),this.dragAndDrop.handleDragFor(this,(function(){return e.state}),(function(t){return e.state=t})),[...y(this.sliderContainer).children].map((function(t){return t.addEventListener("click",(function(t){Math.abs(e.state.startX-e.state.endX)>3&&t.preventDefault()}))}));let i=1,r=1,o=getComputedStyle(y(this.options.flexyAttributeEl));o.getPropertyValue("--current-item")&&(r=parseInt(o.getPropertyValue("--current-item")),i=y(this.sliderContainer).children.length),this.state=a(a({},this.state),{},{elementsOnBehind:i,positionX:p(m(y(this.sliderContainer).firstElementChild,y(this.options.nullifyTransformEl)),this)*r*-1,positionTarget:p(m(y(this.sliderContainer).firstElementChild,y(this.options.nullifyTransformEl)),this)*r*-1,containerInnerWidth:p(m(y(this.sliderContainer),y(this.nullifyTransformEl)),this),slideWidth:p(m(y(this.sliderContainer).firstElementChild,y(this.options.nullifyTransformEl)),this)}),this.refreshActivation(),requestAnimationFrame((function(){return e.drawLoop(!0)}))}destroy(){this.state=a(a({},this.state),{},{sliderActivated:S})}scheduleSliderRecalculation(){this.state=a(a({},this.state),{},{recalculationScheduled:!0})}refreshActivation(){if(!y(this.sliderContainer))return;const t=this.state.sliderActivated===S;let e=p(m(y(this.sliderContainer).children[0],y(this.options.nullifyTransformEl))||{width:0,height:0},this)*y(this.sliderContainer).children.length,n=!1;y(this.sliderContainer)&&(n=-1===getComputedStyle(y(this.sliderContainer),":after").content.indexOf("no-flexy")&&e>p(m("vertical"===this.options.orientation?y(this.sliderContainer).parentNode:y(this.sliderContainer),y(this.options.nullifyTransformEl)),this)+10),this.state=a(a({},this.state),{},{sliderActivated:n});const i=y(this.options.flexyAttributeEl);i&&(this.state.sliderActivated?i.dataset.flexy="":(i.removeAttribute("data-flexy"),[...y(this.sliderContainer).children].map((function(t){return t.removeAttribute("style")}))));this.retrieveSliderAttributes();t||this.state.sliderActivated||this.render(),t&&this.drawLoop()}retrieveSliderAttributes(){var t=this;const e=[...y(this.sliderContainer).children].map((function(t,e){return{el:t,index:e,attr:{}}}));let n=e;if(this.state.elementsOnBehind>0){const t=e.slice(-1*this.state.elementsOnBehind),i=e.slice(0,-1*this.state.elementsOnBehind);n=[...t.map((function(t){return a(a({},t),{},{attr:{style:{order:1}}})})),...i.map((function(t){return a(a({},t),{},{attr:{style:{order:2}}})}))]}else n=n.map((function(t){return a(a({},t),{},{attr:{style:{order:2}}})}));n=n.map((function(e,n){let i=n*t.state.slideWidth,r=i+t.state.slideWidth,o=!1;const s=Math.abs(t.state.positionX),l=Math.abs(t.state.positionX)+t.state.containerInnerWidth;i-s>3&&l-i>3&&(o=!0),r-s>3&&l-r>3&&(o=!0),Math.abs(i-s)<3&&Math.abs(r-l)<3&&(o=!0);let u=`translate3d(${t.state.positionX}px, 0, 0)`;return"vertical"===t.options.orientation&&(u=`translate3d(0, ${t.state.positionX}px, 0)`),a(a({},e),{},{fits:o,attr:a(a({},e.attr),{},{className:o?"flexy-item-is-visible":"",style:a(a({},e.attr.style),{},{transform:u})})})}));let i={};return this.state.mouseDown&&(i["data-flexy-dragging"]=""),this.state.sliderActivated&&(i["data-flexy"]=""),this.state.sliderActivated||(n=n.map((function(t){const e=t.attr,{style:n}=e,i=s(e,o);return a(a({},t),{},{attr:i})}))),{elementsDescriptor:n.sort((function(t,e){return t.index-e.index})),flexyAttributeElAttr:i}}render(){var t=this;const e=this.retrieveSliderAttributes();this.options.onRender(this,e);const n=y(this.sliderContainer);e.elementsDescriptor.map((function(t){const e=n.children[t.index];e.classList.remove("flexy-item-is-visible"),t.fits&&e.classList.add("flexy-item-is-visible"),t.attr&&t.attr.style&&Object.keys(t.attr.style).map((function(n){e.style[n]=t.attr.style[n]}))})),y(this.options.flexyAttributeEl).removeAttribute("data-flexy-dragging"),Object.keys(e.flexyAttributeElAttr).map((function(n){y(t.options.flexyAttributeEl).setAttribute(n,e.flexyAttributeElAttr[n])}))}}var A=n(1601),D=n.n(A),O=n(6130);const M=function(t){return t&&"[object Function]"==={}.toString.call(t)?t():t};function X(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);e&&(i=i.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,i)}return n}function I(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?X(Object(n),!0).forEach((function(e){j(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):X(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function j(t,e,n){return(e=function(t){var e=function(t,e){if("object"!=typeof t||null===t)return t;var n=t[Symbol.toPrimitive];if(void 0!==n){var i=n.call(t,e||"default");if("object"!=typeof i)return i;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}(t,"string");return"symbol"==typeof e?e:String(e)}(e))in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}const P=function(t,e){e=I({event:null,flexyOptions:{}},e);let n=t;if((t=M(t)).flexy)return t.flexy;let i=t.querySelector(".flexy-pills [data-flexy]"),o=t.querySelector(".flexy .flexy-arrow-prev"),s=t.querySelector(".flexy .flexy-arrow-next");const l=t.closest(".ct-suggested-products");l&&(o=l.querySelector(".ct-arrow-prev"),s=l.querySelector(".ct-arrow-next"));const a=e.event&&e.event.target.closest(".flexy-pills > * > *"),u=new T((function(){const t=M(n);return t?t.querySelector(".flexy-items"):null}),I(I(I(I({flexyAttributeEl:n,elementsThatDoNotStartDrag:[".twentytwenty-handle"]},e.event&&!a?{initialDragEvent:e.event}:{}),{},{autoplay:!!(Object.keys(t.dataset).indexOf("autoplay")>-1&&parseInt(t.dataset.autoplay,10))&&t.dataset.autoplay},t.querySelector(".flexy-pills")?{pillsContainerSelector:t.querySelector(".flexy-pills").firstElementChild}:{}),{},{leftArrow:o,rightArrow:s,scaleRotateEffect:!1,onDragStart:function(t){t.target.closest(".flexy-items")&&Array.from(t.target.closest(".flexy-items").querySelectorAll(".zoomImg")).map((function(t){r()(t).stop().fadeTo(120,0)}))},wrapAroundMode:"viewport"===t.dataset.wrap?"viewport":"container"},i?{pillsFlexyInstance:i}:{}),{},{onSlideChange:function(t,e){D().trigger("blocksy:frontend:flexy:slide-change",{instance:t,payload:e})}},e.flexyOptions||{}));if(i){const t=new T(i,I(I({elementsThatDoNotStartDrag:[".twentytwenty-handle"],wrapAroundMode:"viewport"===i.dataset.wrap?"viewport":"container"},e.event&&a?{initialDragEvent:e.event}:{}),{},{leftArrow:i.parentNode.querySelector(".flexy-arrow-prev"),rightArrow:i.parentNode.querySelector(".flexy-arrow-next")},i.closest(".thumbs-left")&&"mobile"!==(0,O.C)({withTablet:!0})?{orientation:"vertical"}:{}));i.flexy=t}return t.flexy=u,u}}}]);