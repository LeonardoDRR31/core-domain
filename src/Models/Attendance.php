<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\AttendanceStatus;

class Attendance extends Model
{
    protected $fillable = [
        'class_session_id',
        'enrollment_id',
        'status',
    ];

    protected $casts = [
        'status' => AttendanceStatus::class,
    ];

    public function classSession(): BelongsTo
    {
        return $this->belongsTo(ClassSession::class);
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}
