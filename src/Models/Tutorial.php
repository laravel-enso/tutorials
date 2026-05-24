<?php

namespace LaravelEnso\Tutorials\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Localisation\Contracts\TranslatableAttributes;
use LaravelEnso\Permissions\Models\Permission;
use LaravelEnso\Tables\Traits\TableCache;

class Tutorial extends Model implements TranslatableAttributes
{
    use HasFactory;
    use TableCache;

    protected $guarded = ['id'];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function translatableAttributes(): array
    {
        return ['title', 'content'];
    }

    protected function casts(): array
    {
        return [
            'permission_id' => 'integer', 'placement' => 'integer',
        ];
    }
}
