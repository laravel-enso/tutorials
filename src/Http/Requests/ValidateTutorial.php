<?php

namespace LaravelEnso\Tutorials\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTutorial extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'permission_id' => 'required',
            'element' => 'required',
            'title' => 'required',
            'content' => 'required',
            'placement' => 'required|numeric',
            'order_index' => 'numeric',
        ];
    }
}
