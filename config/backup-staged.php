<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Backup Root Directory
    |--------------------------------------------------------------------------
    |
    | The directory where the timestamped backups will be stored. This path is
    | resolved using Laravel's helper functions so it can be relative to the
    | application. By default it stores backups within the application's
    | storage/app directory.
    |
    */

    'root' => env('BACKUP_STAGED_ROOT', storage_path('app/backup-staged')), 

    /*
    |--------------------------------------------------------------------------
    | Timestamp Format
    |--------------------------------------------------------------------------
    |
    | The format used to create the timestamped subdirectory for each backup.
    | This value supports any PHP date() compatible format string.
    |
    */

    'timestamp_format' => env('BACKUP_STAGED_TIMESTAMP_FORMAT', 'Ymd-His'),
];
