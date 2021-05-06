<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealerRequest extends FormRequest
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
            //
            'dealer_id'=>['required'],
            'shopname'=>['required'],
            'latitude'=>['required'],
            'longitude'=>['required'],
            'phone'=>['required'],
            'viber_phone'=>['required'],
            'address'=>['required'],
            'township'=>['required'],
            'region_id'=>['required'],
            
        ];
    }
}
