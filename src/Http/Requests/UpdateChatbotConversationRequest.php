<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChatbotConversationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $startedAt = $this->input(
            'started_at',
            $this->route('chatbot_conversation')?->started_at
        );

        return [
            'started_at' => ['sometimes', 'required', 'date'],
            'ended_at' => [
                'sometimes',
                'nullable',
                'date',
                'after_or_equal:'.$startedAt,
            ],
            'satisfaction_rating' => [
                'sometimes',
                'nullable',
                'integer',
                'between:0,255',
            ],
            'feedback' => ['sometimes', 'nullable', 'string'],
            'resolved' => ['sometimes', 'nullable', 'boolean'],
            'handed_to_human' => ['sometimes', 'nullable', 'boolean'],
            'first_message' => ['sometimes', 'nullable', 'string'],
            'last_bot_response' => ['sometimes', 'nullable', 'string'],
            'message_count' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'faq_matched_id' => [
                'sometimes',
                'nullable',
                'integer',
                'exists:chatbot_faqs,id',
            ],
        ];
    }
}
