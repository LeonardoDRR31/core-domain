<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChatbotConversationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'started_at' => ['required', 'date'],
            'ended_at' => ['nullable', 'date', 'after_or_equal:started_at'],
            'satisfaction_rating' => ['nullable', 'integer', 'between:0,255'],
            'feedback' => ['nullable', 'string'],
            'resolved' => ['nullable', 'boolean'],
            'handed_to_human' => ['nullable', 'boolean'],
            'first_message' => ['nullable', 'string'],
            'last_bot_response' => ['nullable', 'string'],
            'message_count' => ['nullable', 'integer', 'min:0'],
            'faq_matched_id' => ['nullable', 'integer', 'exists:chatbot_faqs,id'],
        ];
    }
}
