<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'name'      => ['required', 'min:3', 'max:20', 'string'],
            'email'     => ['required', 'min:5', 'max:30', 'email'],
            'no_hp'     => ['required', 'min:5', 'max:30', 'string'],
            'address'   => ['required', 'min:5']
        ];
    }
}
