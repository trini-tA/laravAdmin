<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Permission;

class NewPermission extends Notification{
    use Queueable;
    protected $permission;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( Permission $permission ){
        $this->permission = $permission;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via( $notifiable )
    {
        return ['database'];
    }

    

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray( $notifiable ){
        return [
            'permission' => $this->permission->name,
        ];
    }
}
