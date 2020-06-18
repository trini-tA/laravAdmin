<?php

namespace App;

use Laratrust\Models\LaratrustRole;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends LaratrustRole
{
    public $guarded = [];
    use LogsActivity;
    protected static $logAttributes = ['name', 'display_name'];

}
