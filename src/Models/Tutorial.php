<?php

namespace LaravelEnso\Tutorials\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Permissions\Models\Permission;
use LaravelEnso\Tables\Traits\TableCache;
use LaravelEnso\Tutorials\Enums\Placement;

class Tutorial extends Model
{
    use HasFactory, TableCache;

    protected $guarded = ['id'];

    protected $casts = [
        'permission_id' => 'integer',
        'placement' => Placement::class,
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
