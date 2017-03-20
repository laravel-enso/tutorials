<?php

namespace LaravelEnso\TutorialManager;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tutorial.
 *
 * @property int $id
 * @property int $permission_id
 * @property string $element
 * @property string $title
 * @property string $content
 * @property string $placement
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Permission $permission
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Tutorial whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tutorial wherePermissionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tutorial whereElement($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tutorial whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tutorial whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tutorial wherePlacement($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tutorial whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tutorial whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tutorial extends Model
{
    protected $fillable = ['permission_id', 'element', 'title', 'content', 'placement', 'order'];

    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }
}
