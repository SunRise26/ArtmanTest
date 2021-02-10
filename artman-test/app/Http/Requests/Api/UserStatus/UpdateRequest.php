<?php

namespace App\Http\Requests\Api\UserStatus;

use App\Models\UserStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status_id' => [
                'integer',
                Rule::in(array_values(UserStatus::getUserStatuses())),
            ],
        ];
    }
}
