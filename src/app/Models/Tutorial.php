<?php

namespace LaravelEnso\TutorialManager\app\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\PermissionManager\app\Models\Permission;

class Tutorial extends Model
{
    protected $fillable = [
        'permission_id', 'element', 'title', 'content', 'placement', 'order_index',
    ];
    
    protected $casts = [
      'permission_id' => 'integer',
      'placement' => 'integer',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
