<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $modelId = $this->route('comment')?->id;

        return [
            'user_id' => ['sometimes', 'required', 'integer', 'exists:users,id'],
            'thread_id' => ['sometimes', 'required', 'integer', 'exists:threads,id'],
            'parent_id' => [
                'sometimes',
                'nullable',
                'integer',
                'exists:comments,id',
                Rule::notIn([$modelId]),
            ],
            'body' => ['sometimes', 'required', 'string'],
        ];
    }
}
