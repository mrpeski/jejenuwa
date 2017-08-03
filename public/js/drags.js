/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 224);
/******/ })
/************************************************************************/
/******/ ({

/***/ 155:
/***/ (function(module, exports) {


var handlers = {
    dragstart: function dragstart(ev) {
        ev.preventDefault();
        var id = ev.target.id;
        ev.dataTransfer.setData('text/plain', id);
        console.log(ev.dataTransfer);
        ev.dataTransfer.dropEffect = "copy";
    },
    // dropzone handlers
    dragover: function dragover(ev) {
        ev.preventDefault();
        var target = ev.target;
        ev.dataTransfer.dropEffect = "copy";
        console.log('dragover');
    },
    drop: function drop(ev) {
        ev.preventDefault();
        ev.dataTransfer.dropEffect = "copy";
        var data = ev.dataTransfer.getData('text');
        ev.target.appendChild(document.getElementById(data));
        // console.log('drop');
    }

};
var helpers = {
    makedraggrable: function makedraggrable(elem) {
        if (elem.length == undefined) {
            elem.setAttribute('draggable', true);
        } else if (elem.length >= 1) {
            for (var i = 0; i < elem.length; i++) {
                var item = elem[i];
                item.setAttribute('draggable', true);
            }
        } else {
            return false;
        }
    },
    makedropzone: function makedropzone(elem) {
        elem.addEventListener('drop', handlers.drop);
        elem.addEventListener('dragover', handlers.dragover);
        // elem.addEventListener('dragover', handlers.dragover);
    }
};

var div = document.querySelectorAll(".img");
var drops = document.querySelectorAll(".dropZone");

helpers.makedraggrable(div);

drops.forEach(function (elem) {
    elem.addEventListener('drop', handlers.drop);
    elem.addEventListener('dragover', handlers.dragover);
});

/***/ }),

/***/ 224:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(155);


/***/ })

/******/ });