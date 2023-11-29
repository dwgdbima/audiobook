<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'title' => 'required|string|min:5|unique:books',
            'author' => 'required|string',
            'desc' => 'required|min:5',
            'cover' =>  'required|file|mimes:jpg,jpeg,png,gif|max:3100'

        ];
    }
}
