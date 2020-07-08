<?php

namespace App;

use Laratrust\Models\LaratrustPermission;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;

class Permission extends LaratrustPermission{
    use Notifiable;
    use LogsActivity;

    public $guarded = [];
    protected static $logAttributes = ['name', 'display_name'];

}
