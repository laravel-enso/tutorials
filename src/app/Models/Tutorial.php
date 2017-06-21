<?php

namespace LaravelEnso\TutorialManager\app\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Helpers\Traits\DMYTimestamps;

class Tutorial extends Model
{
    use DMYTimestamps;

    protected $fillable = ['permission_id', 'element', 'title', 'content', 'placement', 'order'];

    public function permission()
    {
        return $this->belongsTo('LaravelEnso\PermissionManager\app\Models\Permission');
    }
}
