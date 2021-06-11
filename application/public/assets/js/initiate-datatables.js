/*
* Workday - A time clock application for employees
* Support: official.codefactor@gmail.com
* Version: 2.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
(function() {
    'use strict';

    $('.datatables-table').DataTable({
        responsive: true,
        pageLength: 15,
        lengthChange: false,
        searching: false,
        ordering: true
    });
})();