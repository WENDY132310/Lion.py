/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
(function () {
  var domReady = window.blockartUtils.domReady;
  var Notice = function Notice() {
    var dismissIcons = document.querySelectorAll('.blockart-icon.dismiss');
    var _iterator = _createForOfIteratorHelper(dismissIcons),
      _step;
    try {
      var _loop = function _loop() {
        var _parent$dataset;
        var dismissIcon = _step.value;
        var parent = dismissIcon.closest('.blockart-notice');
        var noticeId = parent === null || parent === void 0 || (_parent$dataset = parent.dataset) === null || _parent$dataset === void 0 ? void 0 : _parent$dataset.id;
        dismissIcon.addEventListener('click', function (e) {
          var _target, _target2, _target3;
          var target = e.target;
          if ('path' === ((_target = target) === null || _target === void 0 ? void 0 : _target.tagName)) {
            target = target.closest('svg');
          }
          parent.style.display = 'none';
          var dataHide = '-1' != ((_target2 = target) === null || _target2 === void 0 || (_target2 = _target2.dataset) === null || _target2 === void 0 ? void 0 : _target2.hide) ? (_target3 = target) === null || _target3 === void 0 || (_target3 = _target3.dataset) === null || _target3 === void 0 ? void 0 : _target3.hide : '9999';
          if (dataHide && noticeId) {
            setCookie('notice_' + noticeId, noticeId, dataHide);
          }
        });

        // Show cookie if the notice hidden cookie is not set.
        var cookie = getCookie('notice_' + noticeId);
        if (!cookie) {
          parent.style.display = 'block';
        }
      };
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        _loop();
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }
  };

  /**
   * Set cookie function.
   *
   * @param name Cookie Name
   * @param value Cookie Value
   * @param days Number of days for cookie to expire.
   */
  function setCookie(name, value, days) {
    var expires = new Date();
    expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
    document.cookie = "".concat(name, "=").concat(value, ";expires=").concat(expires.toUTCString(), ";path=/");
  }

  /**
   * Returns cookie value if exists. Else, returns null.
   * @param name Cookie Name
   * @return string|null Cookie value
   */
  function getCookie(name) {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i].trim();
      if (cookie.startsWith(name + '=')) {
        return cookie.substring(name.length + 1);
      }
    }
    return null;
  }
  domReady(Notice);
})();
/******/ })()
;