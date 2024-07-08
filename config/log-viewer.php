<?php

use Arcanedev\LogViewer\Contracts\Utilities\Filesystem;
use Arcanedev\LogViewer\Contracts\Utilities\LogLevels as LogLevelsContract;

return [

    'storage-path'  => storage_path('logs'),

    'pattern'       => [
        'prefix'    => Filesystem::PATTERN_PREFIX,    // 'laravel-'
        'date'      => Filesystem::PATTERN_DATE,      // '[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]'
        'extension' => Filesystem::PATTERN_EXTENSION, // '.log'
    ],

    'locale'        => 'auto',

    'theme'         => 'bootstrap-5',

    'route'         => [
        'enabled'    => true,
        'attributes' => [
            'prefix'     => 'log-viewer',
            'middleware' => env('ARCANEDEV_LOGVIEWER_MIDDLEWARE') ? explode(',', env('ARCANEDEV_LOGVIEWER_MIDDLEWARE')) : null,
        ],
        'show' => 'log-viewer::logs.show'
    ],

    'per-page'      => 30,

    'download'      => [
        'prefix'    => 'laravel-',
        'extension' => 'log',
    ],

    'menu'  => [
        'filter-route'  => 'log-viewer::logs.filter',
        'icons-enabled' => true,
    ],

    'icons' =>  [
        'all'       => 'fa fa-fw fa-list',
        'emergency' => 'fa fa-fw fa-bug',
        'alert'     => 'fa fa-fw fa-bullhorn',
        'critical'  => 'fa fa-fw fa-heartbeat',
        'error'     => 'fa fa-fw fa-times-circle',
        'warning'   => 'fa fa-fw fa-exclamation-triangle',
        'notice'    => 'fa fa-fw fa-exclamation-circle',
        'info'      => 'fa fa-fw fa-info-circle',
        'debug'     => 'fa fa-fw fa-life-ring',
    ],

    'colors' =>  [
        'levels'    => [
            'empty'     => '#D1D1D1',
            'all'       => '#8A8A8A',
            'emergency' => '#B71C1C',
            'alert'     => '#D32F2F',
            'critical'  => '#F44336',
            'error'     => '#FF5722',
            'warning'   => '#FF9100',
            'notice'    => '#4CAF50',
            'info'      => '#1976D2',
            'debug'     => '#90CAF9',
        ],
    ],

    'highlight' => [
        '^#\d+',
        '^Stack trace:',
    ],

    // Asegúrate de que esta parte esté correcta
    'log_parsing_regex' => '/^\[(\d{4}-\d{2}-\d{2}[T ]\d{2}:\d{2}:\d{2}\.?(\d{6}([\+-]\d\d:\d\d)?)?)\](.*?(\w+)\.|.*?)('
                .implode('|', array_filter(LogLevelsContract::all()))
                .')?: (.*?)( in [\/].*?:[0-9]+)?$/is',
];
