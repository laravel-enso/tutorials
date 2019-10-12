<?php

namespace LaravelEnso\Tutorials\app\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\app\Traits\TableCache;
use LaravelEnso\Permissions\app\Models\Permission;

class Tutorial extends Model
{
    use TableCache;

    protected $fillable = [
        'permission_id', 'element', 'title', 'content', 'placement', 'order_index',
    ];

    protected $casts = [
      'permission_id' => 'integer', 'placement' => 'integer',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
