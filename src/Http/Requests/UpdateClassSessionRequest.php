<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $startTime = $this->input(
            'start_time',
            $this->route('class_session')?->start_time
        );

        return [
            'group_id' => ['sometimes', 'required', 'integer', 'exists:groups,id'],
            'module_id' => ['sometimes', 'required', 'integer', 'exists:modules,id'],
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'start_time' => ['sometimes', 'required', 'date'],
            'end_time' => [
                'sometimes',
                'required',
                'date',
                'after:'.$startTime,
            ],
            'meet_url' => [
                'sometimes',
                'nullable',
                'string',
                'url:http,https',
                'max:255',
            ],
        ];
    }
}
