(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else if(typeof exports === 'object')
		exports["blockartUtils"] = factory();
	else
		root["blockartUtils"] = factory();
})(self, () => {
return /******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// EXPORTS
__webpack_require__.d(__webpack_exports__, {
  $: () => (/* reexport */ $),
  $$: () => (/* reexport */ $$),
  domReady: () => (/* reexport */ domReady),
  getSiblings: () => (/* reexport */ getSiblings),
  inView: () => (/* reexport */ inView)
});

;// CONCATENATED MODULE: ./src/frontend/utils/utils.ts
var $ = document.querySelector.bind(document);
var $$ = document.querySelectorAll.bind(document);
var domReady = function domReady(callback) {
  if (document.readyState === 'complete' || document.readyState === 'interactive') {
    callback();
  } else {
    document.addEventListener('DOMContentLoaded', callback);
  }
};
var getSiblings = function getSiblings(element) {
  var parentElement = element.parentElement;
  if (!parentElement) {
    return [];
  }
  return Array.from(parentElement.children).filter(function (sibling) {
    return sibling !== element;
  });
};
var inView = function inView(element, callback) {
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        callback(entry.target);
        observer.disconnect();
      }
    });
  }, {
    root: document,
    // Use the viewport as the root
    threshold: 0.5 // 50% of the element is in view
  });

  observer.observe(element);
};
;// CONCATENATED MODULE: ./src/frontend/utils/index.ts

/******/ 	return __webpack_exports__;
/******/ })()
;
});