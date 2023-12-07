<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignChapterRequest extends FormRequest
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
            'chapters' => 'required|array',
            'chapters.*' => 'required|array',
            'chapters.*.title' => 'required|string|distinct|min:3',
            'chapters.*.audio' => 'required|file|mimes:mp3'
        ];
    }
}
