<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Supervisor;

class SupervisorRequest extends FormRequest
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
                'username'   => 'required|between:3,100',
                'phone'      => 'required|between:3,100|unique:supervisors,phone',
                'email'      => 'required|unique:supervisors,email',
                'avatar'     => 'required|image',
                'password'   => 'required',
            ];
        } else {
            return [
        
                'username'   => 'required|between:3,100',
                // 'phone'      => 'required|between:3,100|unique:supervisors,phone,' . $this->route('supervisor'),
                'phone'      =>  ['required','between:3,100', \Illuminate\Validation\Rule::unique(Supervisor::class,'phone')->ignore($this->id)],
                'email'      =>  ['required', \Illuminate\Validation\Rule::unique(Supervisor::class,'email')->ignore($this->id)],
                'avatar'     => 'nullable|image',
                'password'   => 'required',
            ];
        }
    }
}
