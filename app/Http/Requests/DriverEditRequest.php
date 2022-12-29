<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'driver' => 'string|max:255',
            'owner' => 'string|max:255',
            'tel_d' => 'integer',
            'tel_o' => 'integer',
            'car_id' => 'integer',
            'car_number' => 'string',
            'branch_id' => 'integer',
            'c_start' => 'date',
            'c_end' => 'date',
            'l_start' => 'date',
            'l_end' => 'date',
            'l_cost'=>'nullable|integer',
            'payment' => 'integer',
            'account' => 'integer',
        ];
    }
}
