<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\MediaType;

class StoreReplyAttachmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ticket_reply_id' => [
                'required',
                'integer',
                'exists:ticket_replies,id',
            ],
            'type' => ['nullable', 'string', Rule::enum(MediaType::class)],
            'path' => ['required', 'string', 'max:255'],
        ];
    }
}
