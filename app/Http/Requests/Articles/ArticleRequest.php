<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title'         => 'required | min:10 | max:255',
            'description'   => 'required | min:10 | max:255',
            'category'      => 'required',
            'content'       => 'required | min:10',
            'Imagefile'     => 'required | image'
        ];
    }
}
