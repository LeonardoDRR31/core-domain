<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\TicketPriority;
use IncadevUns\CoreDomain\Enums\TicketStatus;
use IncadevUns\CoreDomain\Enums\TicketType;

class UpdateTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'type' => [
                'sometimes',
                'nullable',
                'string',
                Rule::enum(TicketType::class),
            ],
            'status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(TicketStatus::class),
            ],
            'priority' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(TicketPriority::class),
            ],
        ];
    }
}
