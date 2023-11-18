/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
(function () {
  var _window$blockartUtils = window.blockartUtils,
    $$ = _window$blockartUtils.$$,
    domReady = _window$blockartUtils.domReady;
  domReady(function () {
    var countdowns = Array.from($$('.blockart-countdown'));
    if (!countdowns.length) return;
    var calculateTime = function calculateTime(timestamp) {
      var currentDate = new Date();
      var diff = timestamp - currentDate.getTime();
      var result = {
        days: '00',
        hours: '00',
        minutes: '00',
        seconds: '00'
      };
      if (diff < 0) return result;
      result.days = Math.floor(diff / (1000 * 60 * 60 * 24)).toString().padStart(2, '0');
      result.hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60)).toString().padStart(2, '0');
      result.minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60)).toString().padStart(2, '0');
      result.seconds = Math.floor(diff % (1000 * 60) / 1000).toString().padStart(2, '0');
      return result;
    };
    var _loop = function _loop() {
        var _countdown$dataset;
        var countdown = _countdowns[_i];
        var timestamp = (_countdown$dataset = countdown.dataset) === null || _countdown$dataset === void 0 ? void 0 : _countdown$dataset.expiryTimestamp;
        if (!timestamp) return 0; // continue
        var time = calculateTime(parseInt(timestamp));
        if (Object.values(time).every(function (value) {
          return value === '00';
        })) return 0; // continue
        var interval = setInterval(function () {
          time = calculateTime(parseInt(timestamp));
          if (Object.values(time).every(function (value) {
            return value === '00';
          })) {
            clearInterval(interval);
          }
          for (var t in time) {
            var num = countdown.querySelector(".blockart-countdown-number-".concat(t));
            if (num) {
              num.innerHTML = time[t];
            }
          }
        }, 1000);
      },
      _ret;
    for (var _i = 0, _countdowns = countdowns; _i < _countdowns.length; _i++) {
      _ret = _loop();
      if (_ret === 0) continue;
    }
  });
})();
/******/ })()
;