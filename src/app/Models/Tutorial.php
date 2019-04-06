<?php

namespace LaravelEnso\TutorialManager\app\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\ActivityLog\app\Traits\LogsActivity;
use LaravelEnso\PermissionManager\app\Models\Permission;

class Tutorial extends Model
{
    use LogsActivity;

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
