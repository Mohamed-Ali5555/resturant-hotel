<?php

namespace App\Http\Requests\setings;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class setingcreate extends FormRequest
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


        $rule=RuleFactory::make([
            '%name%'=>'required',
            "%about%"=>['required'],
            '%short_description%'=>['required'],
            '%title%'=>['required'],
            '%sub_title%'=>['required'],

        ]);
        $rules=[
            'logo'=>['required','sometimes'],
            'icon'=>['required','sometimes'],
            'default_image'=>['required','sometimes'],
        ];

      $array=array_merge($rule,$rules);
        return  $array;
    }
}
