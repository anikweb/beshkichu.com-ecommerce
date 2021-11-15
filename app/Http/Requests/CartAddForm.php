<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartAddForm extends FormRequest
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
            'image_id' => "required",
            'quantity' => "required",
        ];
    }
    public function messages()
    {
        return [
            'image_id.required' => "You need to select image first",
            'quantity.required' => "You have to select at least 1 product.",
        ];
    }
}
