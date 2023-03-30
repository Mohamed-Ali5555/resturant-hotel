<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class DiningRequestUpdate extends FormRequest
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
        $rules=RuleFactory::make([
            "%title%"=>'required',
            '%description%'=>['required']
        ]);
        $rule= [
            
            "phone"=>['required']
        ];
        $array=array_merge($rules,$rule);
        return $array;
    }
}
