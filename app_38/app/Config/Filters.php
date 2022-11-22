<?php

namespace Config;

use App\Filters\User\UserNotLoggedInFilter;
use App\Filters\User\UserLoggedInFilter;
use App\Filters\User\UserIsAdmin;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,

        'user_not_logged_in_filter' => UserNotLoggedInFilter::class,
        'user_is_logged_in_filter' => UserLoggedInFilter::class,
        'user_is_admin' => UserIsAdmin::class,
    ];

    /**
     * Lista de aliases de filtro que são sempre 
     * aplicados antes e depois de cada solicitação.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'user_not_logged_in_filter' => [
            'before' => [
                '/', 'logout', 'area1', 'area2', 'area3', //'verify_email'
            ]
        ],
        'user_is_logged_in_filter' => [
            'before' => [ 
                'login_frm', 'new_user_account_frm', 'user_recover_password', 'user_recover_password_check'
            ]
            ],
            'user_is_admin' => [
                'before' => [
                    'area3'
                ]
            ]
    ];
}
