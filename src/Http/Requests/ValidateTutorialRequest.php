<?php

namespace LaravelEnso\TutorialManager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTutorialRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $tutorial = $this->route('tutorial');

        $elementRule = $this->_method == 'PATCH'
            ? 'required|unique:tutorials,element,' . $tutorial->id . ',id'
            : 'required|unique:tutorials';

        return [

            'permission_id' => 'required',
            'element'       => $elementRule,
            'title'         => 'required',
            'content'       => 'required',
            'placement'     => 'required',
            'order'         => 'numeric',
        ];
    }
}
