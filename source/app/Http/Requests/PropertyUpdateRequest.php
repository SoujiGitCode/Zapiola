<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PropertyUpdateRequest extends Request
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
            'title'=>'required',
            'content'=>'required',
            'title_en'=>'required',
            'content_en'=>'required',
            'address'=>'required',
            'area'=>'required',
            'bedroom'=>'required',
            'bathroom'=>'required',
            'kitchen'=>'required',
            'price'=>'required',
            'type'=>'required',
            'image'=>'required'
        ];
    }
}