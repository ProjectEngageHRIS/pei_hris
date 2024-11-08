<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single'],
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji' => ':boom:',
            'level' => env('LOG_LEVEL', 'critical'),
        ],

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),
            ],
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],
        'loginlog' => [
            'driver' => 'single',
            'path' => storage_path('logs/loginalerts.log'),
            'level' => 'info',
        ],
        'failedotpsend' => [
            'driver' => 'single',
            'path' => storage_path('logs/changepasswordotp/failedotpsendalerts.log'),
            'level' => 'info',
        ],
        'successfulotpsend' => [
            'driver' => 'single',
            'path' => storage_path('logs/changepasswordotp/successfulotpsendalerts.log'),
            'level' => 'info',
        ],
        'passwordchanged' => [
            'driver' => 'single',
            'path' => storage_path('logs/changepasswordotp/passwordchanged.log'),
            'level' => 'info',
        ],
        'bannedaccount' => [
            'driver' => 'single',
            'path' => storage_path('logs/loginlogs/bannedaccount.log'),
            'level' => 'info',
        ],
        'hrextract' => [
            'driver' => 'single',
            'path' => storage_path('logs/hrdtr/hrextractdtr.log'),
            'level' => 'info',
        ],
        'hrticket' => [
            'driver' => 'single',
            'path' => storage_path('logs/forms/hr_tickets.log'),
            'level' => 'error',
        ],
        'hrdashboard' => [
            'driver' => 'single',
            'path' => storage_path('logs/hrdtr/hrdashboard.log'),
            'level' => 'error',
        ],
        'employee_info' => [
            'driver' => 'single',
            'path' => storage_path('logs/hrdtr/employee_info.log'),
            'level' => 'error',
        ],
        'leaverequests' => [
            'driver' => 'single',
            'path' => storage_path('logs/forms/leave_request.log'),
            'level' => 'error',
        ],
        'ittickets' => [
            'driver' => 'single',
            'path' => storage_path('logs/forms/it_tickets.log'),
            'level' => 'error',
        ],
        'changeinforequests' => [
            'driver' => 'single',
            'path' => storage_path('logs/forms/change_info_request.log'),
            'level' => 'error',
        ],
        'time-in-and-out' => [
            'driver' => 'single',
            'path' => storage_path('logs/forms/timeinandout.log'),
            'level' => 'error',
        ],
        'accountingerrors' => [
            'driver' => 'single',
            'path' => storage_path('logs/accounting/accounting_errors.log'),
            'level' => 'error',
        ],
        'activities' => [
            'driver' => 'single',
            'path' => storage_path('logs/activities/announcement.log'),
            'level' => 'error',
        ],
        'tasks' => [
            'driver' => 'single',
            'path' => storage_path('logs/mytasks/tasks.log'),
            'level' => 'error',
        ],
        'it_change_password' => [
            'driver' => 'single',
            'path' => storage_path('logs/admin/it-change-password.log'),
            'level' => 'error',
        ],
        'it_reset_2fa' => [
            'driver' => 'single',
            'path' => storage_path('logs/admin/it-reset-2fa.log'),
            'level' => 'error',
        ],
        'employee_change_password' => [
            'driver' => 'single',
            'path' => storage_path('logs/employee/employee-change-password..log'),
            'level' => 'error',
        ],
    ],

];
