/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
(function () {
  var _window$blockartUtils = window.blockartUtils,
    $$ = _window$blockartUtils.$$,
    domReady = _window$blockartUtils.domReady;
  domReady(function () {
    var tocs = Array.from($$('.blockart-toc'));
    for (var _i = 0, _tocs = tocs; _i < _tocs.length; _i++) {
      var _toc$dataset, _toc$dataset2;
      var toc = _tocs[_i];
      if ((_toc$dataset = toc.dataset) !== null && _toc$dataset !== void 0 && _toc$dataset.toc) {
        var _window;
        var headings = (_window = window) === null || _window === void 0 ? void 0 : _window[toc.dataset.toc];
        if (headings !== null && headings !== void 0 && headings.length) {
          var _iterator = _createForOfIteratorHelper(headings),
            _step;
          try {
            var _loop = function _loop() {
              var heading = _step.value;
              var headingEl = Array.from(document.querySelectorAll("h".concat(heading.level))).find(function (h) {
                return h.textContent === heading.content;
              });
              if (!headingEl) return 1; // continue
              if (!headingEl.querySelector("#".concat(heading.id.replace(/\d/g, function (match) {
                return '\\3' + match;
              })))) {
                var anchor = document.createElement('span');
                anchor.setAttribute('id', heading.id);
                anchor.setAttribute('class', 'blockart-toc-anchor');
                headingEl === null || headingEl === void 0 || headingEl.insertAdjacentElement('afterbegin', anchor);
              }
            };
            for (_iterator.s(); !(_step = _iterator.n()).done;) {
              if (_loop()) continue;
            }
          } catch (err) {
            _iterator.e(err);
          } finally {
            _iterator.f();
          }
        }
      }
      if ((_toc$dataset2 = toc.dataset) !== null && _toc$dataset2 !== void 0 && _toc$dataset2.collapsed) {
        var _toc$querySelector;
        (_toc$querySelector = toc.querySelector('.blockart-toc-toggle')) === null || _toc$querySelector === void 0 || _toc$querySelector.addEventListener('click', function (e) {
          var _e$target;
          e.preventDefault();
          var parent = (_e$target = e.target) === null || _e$target === void 0 ? void 0 : _e$target.closest('.blockart-toc');
          var collapsed = parent.getAttribute('data-collapsed');
          if (collapsed === 'true') {
            parent.setAttribute('data-collapsed', 'false');
          } else {
            parent.setAttribute('data-collapsed', 'true');
          }
        });
      }
    }
  });
})();
/******/ })()
;