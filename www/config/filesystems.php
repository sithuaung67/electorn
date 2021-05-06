<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
        // 'links' => [
        //     public_path('storage') => storage_path('app/public'),
        //     public_path('images') => storage_path('app/images'),
        // ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],
        'hotel' => [
            'driver' => 'ftp',
            'host' => '139.59.98.151',
            'username' => 'nanodev',
            'password' => 'n@no1Media',
            'root' => '/StarZone/Hotel/', // for example: /var/www/html/dev/images
            'port' => 21,
            'passive' => true,
            'ssl' => true,
            'timeout' => 30,
        ],
        'hotel_room' => [
            'driver' => 'ftp',
            'host' => '139.59.98.151',
            'username' => 'nanodev',
            'password' => 'n@no1Media',
            'root' => '/StarZone/Room/', // for example: /var/www/html/dev/images
            'port' => 21,
            'passive' => true,
            'ssl' => true,
            'timeout' => 30,
        ],
        'nrc' => [
            'driver' => 'ftp',
            'host' => '139.59.98.151',
            'username' => 'nanodev',
            'password' => 'n@no1Media',
            'root' => '/StarZone/Nrc/', // for example: /var/www/html/dev/images
            'port' => 21,
            'passive' => true,
            'ssl' => true,
            'timeout' => 30,
        ],
        'passport' => [
            'driver' => 'ftp',
            'host' => '139.59.98.151',
            'username' => 'nanodev',
            'password' => 'n@no1Media',
            'root' => '/StarZone/Passport/', // for example: /var/www/html/dev/images
            'port' => 21,
            'passive' => true,
            'ssl' => true,
            'timeout' => 30,
        ],
        'log' => [
             'driver' => 'local',
             'root' => storage_path('logs'),
        ],
        'tutorialcover' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/tutorial_cover',
            'root'        => public_path('uploads/tutorial_cover'),
        ],
        'video' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/tutorial_video',
            'root'        => public_path('uploads/tutorial_video'),
        ],
        'country' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/country',
            'root'        => public_path('uploads/country'),
        ],
        'customer' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/customer',
            'root'        => public_path('uploads/customer'),
        ],
        'destination' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/destination',
            'root'        => public_path('uploads/destination'),
        ],
        'package' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/package',
            'root'        => public_path('uploads/package'),
        ],
        'tour_leader' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/tour_leader',
            'root'        => public_path('uploads/tour_leader'),
        ],
        'travel_blog' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/travel_blog',
            'root'        => public_path('uploads/travel_blog'),
        ],
        'home_cover' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/home_cover',
            'root'        => public_path('uploads/home_cover'),
        ],
        'home_video' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/home_video',
            'root'        => public_path('uploads/home_video'),
        ],
        'users' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/user',
            'root'        => public_path('uploads/user'),
        ],
        'noti' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/notification',
            'root'        => public_path('uploads/notification'),
        ],
        'chatting' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/chatting',
            'root'        => public_path('uploads/chatting'),
        ],
        'popup' => [
            'driver'      => 'local',
            'simple_path' => 'uploads/popup',
            'root'        => public_path('uploads/popup'),
        ],
    ],

];
