<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $rules=RuleFactory::make([
            "%name%"=>['required'],
            "%description%"=>['required']

        ]);
        $rule=[
            "type"=>['required'],
            "start_time"=>['required'],
            "end_time"=>['required'],



        ];
        $array=array_merge($rules ,$rule);
        return $array;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
