<?php

namespace LaravelEnso\TutorialManager\app\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\ActivityLog\app\Traits\LogsActivity;
use LaravelEnso\PermissionManager\app\Models\Permission;
use LaravelEnso\Multitenancy\app\Traits\SystemConnection;

class Tutorial extends Model
{
    use LogsActivity, SystemConnection;

    protected $fillable = [
        'permission_id', 'element', 'title', 'content', 'placement', 'order_index',
    ];

    protected $casts = [
      'permission_id' => 'integer',
      'placement' => 'integer',
    ];

    protected $loggableLabel = 'title';

    protected $loggable = ['title', 'content', 'placement', 'order_index'];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
