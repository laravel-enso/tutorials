<?php

namespace LaravelEnso\Tutorials\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Permissions\Models\Permission;
use LaravelEnso\Tables\Traits\TableCache;

class Tutorial extends Model
{
    use HasFactory, TableCache;

    protected $guarded = ['id'];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    protected function casts(): array
    {
        return [
            'permission_id' => 'integer', 'placement' => 'integer',
        ];
    }
}
