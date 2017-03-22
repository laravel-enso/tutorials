<?php

namespace LaravelEnso\TutorialManager;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = ['permission_id', 'element', 'title', 'content', 'placement', 'order'];

    public function permission()
    {
        return $this->belongsTo('LaravelEnso\Core\Models\Permission');
    }
}
