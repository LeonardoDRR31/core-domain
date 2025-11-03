<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAvailabilityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $availability = $this->route('availability');
        $availabilityId = $availability?->id;

        $userId = $this->input('user_id', $availability?->user_id);
        $dayOfWeek = $this->input('day_of_week', $availability?->day_of_week);
        $startTime = $this->input('start_time', $availability?->start_time);
        $endTime = $this->input('end_time', $availability?->end_time);

        return [
            'user_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:users,id',
                Rule::unique('availabilities')
                    ->where('day_of_week', $dayOfWeek)
                    ->where('start_time', $startTime)
                    ->where('end_time', $endTime)
                    ->ignore($availabilityId),
            ],
            'day_of_week' => [
                'sometimes',
                'required',
                'integer',
                'between:0,6',
            ],
            'start_time' => ['sometimes', 'required', 'date_format:H:i'],
            'end_time' => [
                'sometimes',
                'required',
                'date_format:H:i',
                'after:'.$startTime,
            ],
        ];
    }
}
