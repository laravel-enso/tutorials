<?php

namespace LaravelEnso\TutorialManager\app\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\TutorialManager\app\Enums\Placement;
use LaravelEnso\TutorialManager\app\Models\Tutorial;
use LaravelEnso\PermissionManager\app\Models\Permission;

class TutorialsIndex implements Responsable
{
    const HomePermission = 'core.index';

    private $route;

    public function toResponse($request)
    {
        $this->route = $request->get('route');

        return $this->tutorials()
            ->reduce(function ($tutorials, $tutorial) {
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
        return $this->homeTutorials()
            ->merge($this->routeTutorials());
    }

    private function homeTutorials()
    {
        return Tutorial::query()
            ->wherePermissionId(
                optional(Permission::whereName(self::HomePermission))
                    ->first()
                    ->id
            )->orderBy('order_index')
            ->get();
    }

    private function routeTutorials()
    {
        $permission = Permission::whereName($this->route)
            ->first();

        return $permission
            ? $permission->tutorials()
                ->orderBy('order_index')
                ->get()
            : collect();
    }
}
