require('./bootstrap');

window.Dropzone = require('dropzone');

window.nestedSortable = require('nestedSortable');

window.Chart = require('chart.js');

window.autosize = require('autosize');

$(".dropzone").dropzone({
     
});

var target = document.querySelectorAll('textarea');

autosize(target);