$(function () {
    'use strict';
    const datepicker = $('.datepicker');
    if (datepicker.length) {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        datepicker.datepicker({
            format: "dd/mm/yyyy",
            todayHighlight: true,
            autoclose: true,
            language: 'fr',
            orientation: "bottom auto",
        });
        datepicker.datepicker('setDate', today);
    }
});
