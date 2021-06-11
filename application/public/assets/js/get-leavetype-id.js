/*
* Workday - A time clock application for employees
* Support: official.codefactor@gmail.com
* Version: 2.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
(function() {
    'use strict';

    $('select[name="type"]').on('change', function() {
        $('select[name="type"] option').each(function() {
            var value = $('select[name="type"]').val();

            if ($(this).val() == value) {
                var id = $(this).attr('data-id');
                $('input[name="typeid"]').val(id);
            };
        });
    });
})();