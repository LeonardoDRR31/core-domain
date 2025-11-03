<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'thread_id' => ['required', 'integer', 'exists:threads,id'],
            'parent_id' => ['nullable', 'integer', 'exists:comments,id'],
            'body' => ['required', 'string'],
        ];
    }
}
