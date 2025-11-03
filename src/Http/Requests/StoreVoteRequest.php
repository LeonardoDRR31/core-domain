<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'votable_id' => ['required', 'integer', 'min:1'],
            'votable_type' => ['required', 'string', 'max:255'],
            'value' => [
                'required',
                'integer',
                Rule::in([1, -1]),
            ],
        ];
    }
}
