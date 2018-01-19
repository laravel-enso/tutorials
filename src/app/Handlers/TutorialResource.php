<?php

namespace LaravelEnso\TutorialManager\app\Handlers;

use LaravelEnso\TutorialManager\app\Models\Tutorial;
use LaravelEnso\TutorialManager\app\Enums\Placement;
use LaravelEnso\PermissionManager\app\Models\Permission;

class TutorialResource
{
    const HomePermissionId = 1;

    private $route;

    public function __construct(string $route)
    {
        $this->route = $route;
    }

    public function collection()
    {
        return $this->tutorials()->reduce(function ($tutorials, $tutorial) {
            $tutorials->push([
                'intro' => __($tutorial->content),
                'element' => $tutorial->element,
                'position' => Placement::get($tutorial->placement),
                'disable-interaction' => true,
            ]);

            return $tutorials;
        }, collect());
    }

    private function tutorials()
    {
        return $this->homeTutorials()->merge($this->routeTutorials());
    }

    private function homeTutorials()
    {
        return Tutorial::wherePermissionId(self::HomePermissionId)
            ->orderBy('order')
            ->get();
    }

    private function routeTutorials()
    {
        $permission = Permission::whereName($this->route)->first();

        return $permission
            ? $permission->tutorials->sortBy('order')
            : collect();
    }
}
