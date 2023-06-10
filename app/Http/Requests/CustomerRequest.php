<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|string|max:20',
            'mail_address' => 'required|string|max:50',
            'post_code' => 'required|string|max:10000000',
            'address' => 'required|string|max:100',
            'telephone_number' => 'required|string|max:20',
        ];
    }
}
