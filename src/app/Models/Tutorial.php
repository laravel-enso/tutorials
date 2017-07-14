<?php

namespace LaravelEnso\TutorialManager\app\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Helpers\Traits\FormattedTimestamps;

class Tutorial extends Model
{
    use FormattedTimestamps;

    protected $fillable = ['permission_id', 'element', 'title', 'content', 'placement', 'order'];

    protected $attributes = ['order' => 1];

    public function permission()
    {
        return $this->belongsTo('LaravelEnso\PermissionManager\app\Models\Permission');
    }
}
