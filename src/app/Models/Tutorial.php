<?php

namespace LaravelEnso\TutorialManager\app\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = ['permission_id', 'element', 'title', 'content', 'placement', 'order'];

    public function permission()
    {
        return $this->belongsTo('LaravelEnso\PermissionManager\app\Models\Permission');
    }
}
