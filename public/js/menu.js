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
/******/ 	return __webpack_require__(__webpack_require__.s = 221);
/******/ })
/************************************************************************/
/******/ ({

/***/ 156:
/***/ (function(module, exports) {

$('.sortable').nestedSortable({
	handle: 'div',
	items: 'li',
	toleranceElement: '> div',
	maxLength: 2,
	change: function change() {
		console.log('fired');
	}
});

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$('.toggle_new').on('click', function (e) {
	e.preventDefault();
	$('.new_menu').slideToggle('400');
});

// Loads appropriate menu from db
$('#menu_list_').on('change', function () {
	$('.sortable').children().remove();
	$.get('menu/get', { name: $(this).val() }).then(function (data) {
		// console.log(data);
		$.each(data, function (key, value) {
			var str = '';
			str += '<li id=';
			str += 'list_' + ++key + '>';
			str += '<div class="ui-sortable-handle">';
			str += value.title;

			var input = '<input type="hidden" form="menu_form" name="menu_items[]" value="' + value.link + '">';
			var title = '<input type="hidden" form="menu_form" name="menu_titles[]" value="' + value.title + '">';
			var x = "<span class='close remove_menu' title='Remove this Slide'>&times;</span>";

			str += x + input + title;
			str += '</li></div>';
			$(str).appendTo('ol.sortable');
		});
	});
});

// Saves to db
$('#save').on('click', function (e) {
	e.preventDefault();
	var menu_items = $('.sortable [name*="menu_items"]');
	var menu_ids = $('.sortable [name*="menu_ids"]');
	var menu_titles = $('.sortable [name*="menu_titles"]');

	var oSortable = $('.sortable').nestedSortable('toArray');
	// var sort = $('.sortable').sortable('toArray');

	var menu_list_ = $('#menu_list_').val();

	var loc_ = $('.loc :input');

	var menus = new Array(),
	    ids = new Array(),
	    titles = new Array(),
	    loc = new Array();

	$.each(menu_items, function (key, item) {
		menus.push(item.value);
	});
	$.each(menu_ids, function (key, item) {
		ids.push(item.value);
	});
	$.each(menu_titles, function (key, item) {
		titles.push(item.value);
	});

	$.each(loc_, function (key, item) {
		if ($(item).is(':checked')) {
			loc.push($(item).val());
		}
	});

	var option = { nestData: oSortable, menu_items: menus, menu_ids: ids, menu_titles: titles, loc: loc, menu_list_: menu_list_ };

	$.post('menu/save', option).then(function (data) {
		console.log(data);
	});
});
var id = 0;
$('#addtoMenu').on('click', function () {
	var check = $('.checkbox :checked');
	for (i = 0; i < check.length; i++) {
		window.id = window.id + 1;
		var str = '';
		str += '<li id=';
		str += 'list_' + window.id + '>';
		str += '<div class="ui-sortable-handle">';
		str += $(check[i]).val();

		var input = '<input type="hidden" form="menu_form" name="menu_items[]" value="' + $(check[i]).data('uri') + '">';
		var title = '<input type="hidden" form="menu_form" name="menu_titles[]" value="' + $(check[i]).data('title') + '">';
		var x = "<span class='close remove_menu' title='Remove this Slide'>&times;</span>";
		var ids = '<input type="hidden" form="menu_form" name="menu_ids[]" value="' + window.id + '">';

		str += x + input + title + ids;
		str += '</li></div>';
		$(str).appendTo('ol.sortable');
	}
});

$('ol.sortable').on('sortchange', function () {
	//var nestData = $('.sortable').nestedSortable('toArray');
	// console.log(nestData);
	// console.log('fired');
});
// Adds custom link;
$('#add_cust_link').on('click', function (e) {
	e.preventDefault();
	var link = $('input.custom_link').val();
	var title = $('input.custom_title').val();

	var form = document.getElementById('custom_link_form');
	form.reset();

	var str = '';
	str += '<li id=';
	str += 'list_' + ++window.id + '>';
	str += '<div class="ui-sortable-handle">';
	str += title;

	var input = '<input type="hidden" form="menu_form" name="menu_items[]" value="' + link + '">';
	var title = '<input type="hidden" form="menu_form" name="menu_titles[]" value="' + title + '">';
	var x = "<span class='close remove_menu' title='Remove this Slide'>&times;</span>";
	var ids = '<input type="hidden" form="menu_form" name="menu_ids[]" value="' + window.id++ + '">';
	str += x + input + title + ids;
	str += '</li></div>';
	$(str).appendTo('ol.sortable');
});

$('.sortable').on('click', '.remove_menu', function (e) {
	$(e.target).parents('li').remove();
});

/***/ }),

/***/ 221:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(156);


/***/ })

/******/ });