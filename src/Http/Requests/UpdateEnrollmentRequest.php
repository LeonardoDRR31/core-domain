<?php

namespace IncadevUns\CoreDomain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use IncadevUns\CoreDomain\Enums\EnrollmentAcademicStatus;
use IncadevUns\CoreDomain\Enums\PaymentStatus;

class UpdateEnrollmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $model = $this->route('enrollment');
        $modelId = $model?->id;
        $groupId = $this->input('group_id', $model?->group_id);

        return [
            'group_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:groups,id',
            ],
            'user_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:users,id',
                Rule::unique('enrollments')
                    ->where('group_id', $groupId)
                    ->ignore($modelId),
            ],
            'payment_status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(PaymentStatus::class),
            ],
            'academic_status' => [
                'sometimes',
                'required',
                'string',
                Rule::enum(EnrollmentAcademicStatus::class),
            ],
        ];
    }
}
