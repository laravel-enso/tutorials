<?php

namespace LaravelEnso\Tutorials\app\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use LaravelEnso\Permissions\app\Models\Permission;
use LaravelEnso\Tutorials\app\Http\Resources\Tutorial as Resource;
use LaravelEnso\Tutorials\app\Models\Tutorial;

class Show implements Responsable
{
    private $route;

    public function toResponse($request)
    {
        $this->route = $request->get('route');

        return Resource::collection($this->tutorials());
    }

    private function tutorials()
    {
        return $this->homeTutorials()
            ->merge($this->routeTutorials());
    }

    private function homeTutorials()
    {
        return Tutorial::wherePermissionId(
            optional(Permission::whereName(
                config('enso.tutorials.homePermission'))
            )->first()->id
        )->orderBy('order_index')
        ->get();
    }

    private function routeTutorials()
    {
        $permission = Permission::whereName($this->route)->first();

        return $permission
            ? $permission->tutorials()->orderBy('order_index')->get()
            : collect();
    }
}
