<?php

namespace App\Http\Requests;

use App\Models\Subscriber;
use App\Rules\ActiveEmailServer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriberUpdateRequest extends FormRequest
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
            'email' => ['email', 'unique:subscribers,email,:email', new ActiveEmailServer()],
            'state' => ['required', Rule::in(Subscriber::STATE)],
        ];
    }
}
