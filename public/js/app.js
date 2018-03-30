/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

$(document).ready(function () {
    $('.currency_radio input').on('change', function (e) {

        $('.currency_radio input').prop('checked', false);
        $(this).prop('checked', true);

        var currency = $(this).attr('name');
        $('[name="currency"]').val(currency);
    });

    $('.sex_radio input').on('change', function (e) {

        $('.sex_radio input').prop('checked', false);
        $(this).prop('checked', true);

        var sex = $(this).attr('name');
        $('[name="sex"]').val(sex);
    });

    $('.identity_type_radio input').on('change', function (e) {

        $('.identity_type_radio input').prop('checked', false);
        $(this).prop('checked', true);

        var identity_type = $(this).attr('name');
        $('[name="identity_type"]').val(identity_type);
    });

    function datepicker(year, month, day) {

        function disabledChecker() {
            day.prop('disabled', !(year.val() && month.val()));
        }

        function handler() {
            if (!(year.val() && month.val())) {
                return;
            }
            day.empty();
            for (var i = 1; i <= new Date(year.val(), month.val(), 0).getDate(); i++) {
                $("<option>").val(i).text(i).appendTo(day);
            }

            disabledChecker();
        }

        disabledChecker();
        year.change(handler);
        month.change(handler);
    }

    datepicker($('#year'), $('#month'), $('#day'));

    datepicker($('#given_year'), $('#given_month'), $('#given_day'));

    $('.FormDiv input[type!="file"]').on('click', function (e) {
        var placeholder = $(this).attr('placeholder');
        $(this).prev().html(placeholder);
    });
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);