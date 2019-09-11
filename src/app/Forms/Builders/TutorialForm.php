<?php

namespace LaravelEnso\Tutorials\app\Forms\Builders;

use LaravelEnso\Forms\app\Services\Form;
use LaravelEnso\Tutorials\app\Models\Tutorial;
use LaravelEnso\Permissions\app\Models\Permission;

class TutorialForm
{
    protected const FormPath = __DIR__.'/../Templates/tutorial.json';

    protected $form;

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
