<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'category'          => 'required|exists:categories,id',
                'name'              => 'required|between:3,100|unique:products,name',
                'slug'              => 'required|between:3,100|unique:products,slug',
                'description'       => 'required|between:3,1000',
                'image'             => 'required|image',
                'images'            => 'required|array',
                'images.*'          => 'image|mimes:jpg,jpeg,png',
               
            ];
        } else {
            return [
                'category'          => 'required|exists:categories,id',
                'name'              => 'required|between:3,100|unique:products,name,' . $this->route('product'),
                'slug'              => 'required|between:3,100|unique:products,slug,' . $this->route('product'),
                'description'       => 'required|between:3,1000',
                'image'             => 'nullable|image',
                'images'            => 'nullable|array',
                'images.*'          => 'image|mimes:jpg,jpeg,png',
               
            ];
        }
    }
}
