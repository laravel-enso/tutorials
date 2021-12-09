<?php

namespace LaravelEnso\Tutorials\Forms\Builders;

use LaravelEnso\Forms\Services\Form;
use LaravelEnso\Permissions\Models\Permission;
use LaravelEnso\Tutorials\Models\Tutorial;

class TutorialForm
{
    protected const FormPath = __DIR__.'/../Templates/tutorial.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = (new Form(static::FormPath));
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
