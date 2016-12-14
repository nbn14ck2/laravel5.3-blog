<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'         => 'required | min:3 | max:255 | unique:categories',
            'description'   => 'required | min:10 | max: 255'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'title.required' => 'A title is required',
    //         'description.required'  => 'A message is required',
    //     ];
    // }
}
