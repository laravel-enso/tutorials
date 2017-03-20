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

        if ($this->_method == 'PATCH') {

            return [

                'permission_id' => 'required',
                'element'       => 'required|unique:tutorials,element,' . $tutorial->id . ',id',
                'title'         => 'required',
                'content'       => 'required',
                'placement'     => 'required',
                'order'         => 'numeric',
            ];
        } else {

            return [

                'permission_id' => 'required',
                'element'       => 'required|unique:tutorials',
                'title'         => 'required',
                'content'       => 'required',
                'placement'     => 'required',
                'order'         => 'numeric',
            ];
        }
    }
}
