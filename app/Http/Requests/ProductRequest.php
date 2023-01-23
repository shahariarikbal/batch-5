<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required',
            'qty' => 'required|integer',
            'color' => 'required',
            'size' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required',
            'images' => 'required',
        ];
    }
}
