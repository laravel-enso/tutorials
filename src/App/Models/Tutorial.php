<?php

namespace LaravelEnso\Tutorials\App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Permissions\App\Models\Permission;
use LaravelEnso\Tables\App\Traits\TableCache;

class Tutorial extends Model
{
    use TableCache;

    protected $fillable = [
        'permission_id', 'element', 'title', 'content', 'placement',
        'order_index',
    ];

    protected $casts = [
        'permission_id' => 'integer', 'placement' => 'integer',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
