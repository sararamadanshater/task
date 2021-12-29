<?php

namespace App\Http\Requests;

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
        if ($this->method() == 'POST') {
            return [
                'name'   => 'required|between:3,100|unique:categories,name',
                'slug'   => 'required|between:3,100|unique:categories,slug',
                'icon'     => 'required|image',
                
            ];
        } else {
            return [
                'name'   => 'required|between:3,100|unique:categories,name,' . $this->route('category'),
                'slug'   => 'required|between:3,100|unique:categories,slug,' . $this->route('category'),
                'icon'     => 'nullable|image',
                
            ];
        }
    }
}
