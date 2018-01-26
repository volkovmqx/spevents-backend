<?php

namespace SPE\Http\Requests;

use SPE\Http\Requests\Request;

class EventRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'dateandtime' => 'required',
            'place' => 'required',
            'image' => 'mimes:jpeg,bmp,png',
        ];
    }
}
