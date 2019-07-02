/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('bootstrap-datepicker');
window.feather = require('feather-icons')
window.Vue = require('vue');

feather.replace();

$('.datepicker').datepicker({
    todayHighlight: true,
    format: 'dd/mm/yyyy'
});

$(".alert-top").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-top").slideUp(500);
});

$('[data-toggle="tooltip"]').tooltip();

$('.availability').on('click', function(e){
    $('#availability').modal('show');
    $('input[name="id"]').val($(this).data('id'));
});

new Vue({
    el: '#sidebar-menu',
    data: {
        selected: undefined
    }
})

