<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class updateprofile extends FormRequest
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
            'name'=>['required'],
            'email'=>'required|email|unique:users,email,'.auth()->user()['id'],
            'phone'=>'unique:users,phone,'.auth()->user()['id'],
            'password'=>['min:8','nullable']
        ];
    }
}
