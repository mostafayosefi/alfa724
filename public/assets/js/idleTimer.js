(function(e){e.idleTimer=function(t,i,d){d=e.extend({startImmediately:!0,idle:!1,enabled:!0,timeout:3e4,events:"mousemove keydown DOMMouseScroll mousewheel mousedown touchstart touchmove"},d),i=i||document;var l=e(i),a=l.data("idleTimerObj")||{},o=function(t){"number"==typeof t&&(t=void 0);var l=e.data(t||i,"idleTimerObj");l.idle=!l.idle;var a=+new Date-l.olddate;if(l.olddate=+new Date,l.idle&&d.timeout>a)return l.idle=!1,clearTimeout(e.idleTimer.tId),d.enabled&&(e.idleTimer.tId=setTimeout(o,d.timeout)),void 0;var m=e.Event(e.data(i,"idleTimer",l.idle?"idle":"active")+".idleTimer");e(i).trigger(m)},m=function(e){var t=e.data("idleTimerObj")||{};t.enabled=!1,clearTimeout(t.tId),e.off(".idleTimer")};if(a.olddate=a.olddate||+new Date,"number"==typeof t)d.timeout=t;else{if("destroy"===t)return m(l),this;if("getElapsedTime"===t)return+new Date-a.olddate}l.on(e.trim((d.events+" ").split(" ").join(".idleTimer ")),function(){var t=e.data(this,"idleTimerObj");clearTimeout(t.tId),t.enabled&&(t.idle&&o(this),t.tId=setTimeout(o,t.timeout))}),a.idle=d.idle,a.enabled=d.enabled,a.timeout=d.timeout,d.startImmediately&&(a.tId=setTimeout(o,a.timeout)),l.data("idleTimer","active"),l.data("idleTimerObj",a)},e.fn.idleTimer=function(t,i){return i||(i={}),this[0]?e.idleTimer(t,this[0],i):this}})(jQuery);