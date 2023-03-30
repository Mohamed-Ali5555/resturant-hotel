<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            "room_id"=>['required'],
            "count_room"=>['required'],
            "start_date"=>['required'],
            "end_date"=>['required'],
            "first_name"=>['required'],

            'phone'=>'required_without:email',
            'email'=>'required_without:phone',
            "country"=>['required'],
            "terms"=>['required']
        ];
    }
}
