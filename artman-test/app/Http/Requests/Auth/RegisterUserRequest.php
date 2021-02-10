<?php

namespace App\Http\Requests\Auth;

use App\Facades\ReCaptchaService;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'g-recaptcha-response' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!ReCaptchaService::validateV2($value, $this->ip())) {
                        $fail(trans('validation.custom.g-recaptcha-response.required'));
                    }
                },
            ],
        ];
    }
}
