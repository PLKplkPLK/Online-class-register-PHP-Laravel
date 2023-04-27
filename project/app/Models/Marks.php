<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Marks extends Model
{
    use HasFactory;

    public function student(): BelongsTo
    {
        return $this->BelongsTo(Student::class, 'student_id', 'user_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->BelongsTo(Teacher::class, 'teacher_id', 'user_id');
    }
}
