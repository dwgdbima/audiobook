<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductChapterUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'book_id' => 'required|numeric',
            'products' => 'required|array',
            'products.*' => 'required|array',
            'products.*.product_id' => 'required|numeric',
            'products.*.name' => ['required' , 'string' , 'distinct' , 'min:3'],
            'products.*.price' => 'required|numeric',
            'products.*.unselect_chapters' => 'nullable|array',
            'products.*.unselect_chapters*' => 'nullable|numeric',
        ];
    }
}
