<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'product_id' => ['required', 'integer'],
            'image'      => ['required', 'mimes:png,jpg,jpeg', 'max:6000'],
            'default'    => ['required', 'integer' , 'min:1' ,'max:2', 'in:1,2'],
        ];
    }
}
