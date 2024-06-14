<?php

return [
    'general' => [
        'all' => 'All',
    ],
    'buttons' => [
        'delete' => 'Delete',
        'edit' => 'Edit',
        'lang' => 'Language',
    ],
    'dashboard' => 'Dashboard',
    'greeting' => 'Welcome to your Admin application!',
    'employees' => [
        'title' => 'Employees',
        'description' => 'Here you can manage your employees. You can add, edit and delete employees.
        You can also assign employees to companies. You can also see the list of employees and their companies.',
        'linkAction' => 'Explore Employees',
        'createAction' => 'Add Employee',
        'editAction' => 'Edit Employee',
        'company' => 'Company',
        'unemployed' => 'Unemployed',
        'empty' => 'No employees found. Create new one, please.',
        'form' => [
            'firstName' => 'First name',
            'lastName' => 'Last name',
            'email' => 'Email',
            'phone' => 'Phone',
            'company' => 'Select your company',
        ]
    ],
    'companies' => [
        'empty' => 'No companies found. Create new one, please.',
        'title' => 'Companies',
        'description' => 'Here you can manage your companies. You can add, edit and delete companies.
         Also, you can see the list of companies and their employees. You can also assign employees to companies.',
        'linkAction' => 'Explore Companies',
        'createAction' => 'Add Company',
        'employees' => 'Employees',
        'create' => [
            'companyName' => 'Company name',
            'email' => 'Email',
            'website' => 'Website',
            'uploadFile' => 'Upload file',
            'types' => 'SVG, PNG, JPG or GIF (min 100x100px).'
        ]
    ],
];
