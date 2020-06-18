<?php

namespace App;

use Laratrust\Models\LaratrustPermission;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends LaratrustPermission
{
    public $guarded = [];
    use LogsActivity;
    protected static $logAttributes = ['name', 'display_name'];

}
