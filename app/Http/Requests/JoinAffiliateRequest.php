<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class JoinAffiliateRequest extends FormRequest
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
        $user = auth()->user();
        return [
            'password' => ['required', function($attribute, $value, $fail) use ($user){
                if(!Hash::check($value, $user->password)){
                    return $fail($attribute . ' yang anda masukan salah');
                }
            }],
        ];
    }
}
