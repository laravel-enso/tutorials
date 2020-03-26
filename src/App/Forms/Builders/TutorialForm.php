<?php

namespace LaravelEnso\Tutorials\App\Forms\Builders;

use LaravelEnso\Forms\App\Services\Form;
use LaravelEnso\Permissions\App\Models\Permission;
use LaravelEnso\Tutorials\App\Models\Tutorial;

class TutorialForm
{
    protected const FormPath = __DIR__.'/../Templates/tutorial.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = (new Form(static::FormPath))
            ->options('permission_id', Permission::get(['name', 'id']));
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Tutorial $tutorial)
    {
        return $this->form->edit($tutorial);
    }
}
