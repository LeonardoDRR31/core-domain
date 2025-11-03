<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'offer_id' => [
                'required',
                'integer',
                'exists:offers,id',
            ],
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
                Rule::unique('applications')
                    ->where('offer_id', $this->input('offer_id')),
            ],
            'cv_path' => ['required', 'string', 'max:255'],
        ];
    }
}
