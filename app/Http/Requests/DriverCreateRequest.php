<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverCreateRequest extends FormRequest
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
            'driver' => 'required|string|max:255',
            'owner' => 'required|string|max:255',
            'tel_d' => 'required|integer',
            'tel_o' => 'required|integer',
            'car_number' => 'required|string',
            'branch_id' => 'required|integer',
            'c_start' => 'required|date',
            'c_end' => 'required|date',
            'l_start' => 'required|date',
            'l_end' => 'required|date',
            'l_cost'=>'nullable|integer',
            'payment' => 'required|integer',
            'account' => 'required|integer',
            'type'=>'required|integer|min:1|max:3',
            'name'=>'required|string'
        ];
    }
}
