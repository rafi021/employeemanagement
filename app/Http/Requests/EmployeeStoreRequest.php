<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'address' => 'required|string',
            'department_id' => 'required|numeric',
            'country_id' => 'nullable|numeric',
            'city_id' => 'nullable|numeric',
            'state_id' => 'nullable|numeric',
            'zip_code' => 'nullable|numeric',
            'birthdate' => 'nullable|date',
            'date_hired' => 'nullable|date',
        ];
    }
}
