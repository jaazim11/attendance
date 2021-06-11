/*
* Workday - A time clock application for employees
* Support: official.codefactor@gmail.com
* Version: 2.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
(function() {
    'use strict';

    $('select[name="name"]').on('change', function() {
        $('select[name="name"] option').each(function() {
            var value = $('select[name="name"]').val();

            if ($(this).val() == value) {
                var reference = $(this).attr('data-reference');
                $('input[name="reference"]').val(reference);
            };
        });
    });

    $('select[name="employee"]').on('change', function() {
        $('select[name="employee"] option').each(function() {
            var value = $('select[name="employee"]').val();

            if ($(this).val() == value) {
                var reference = $(this).attr('data-reference');
                $('input[name="reference"]').val(reference);
            };
        });
    });
})();