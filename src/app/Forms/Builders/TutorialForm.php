<?php

namespace LaravelEnso\TutorialManager\app\Forms\Builders;

use LaravelEnso\FormBuilder\app\Classes\Form;
use LaravelEnso\TutorialManager\app\Enums\Placement;
use LaravelEnso\TutorialManager\app\Models\Tutorial;
use LaravelEnso\PermissionManager\app\Models\Permission;

class TutorialForm
{
    private const FormPath = __DIR__.'/../Templates/tutorial.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::FormPath);
    }

    public function create()
    {
        return $this->form
            ->options('permission_id', Permission::pluck('name', 'id'))
            ->options('placement', Placement::object())
            ->create();
    }

    public function edit(Tutorial $tutorial)
    {
        return $this->form
            ->options('permission_id', Permission::pluck('name', 'id'))
            ->options('placement', Placement::object())
            ->edit($tutorial);
    }
}
