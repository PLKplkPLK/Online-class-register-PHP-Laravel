<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Kyslik\ColumnSortable\Sortable;

class Teacher extends User
{
    use HasFactory;
    use Sortable;

    protected $primaryKey = 'user_id';

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function grade(): HasOne
    {
        return $this->hasOne(Grade::class, 'class_teacher_id', 'user_id');
    }

    public function activity(): HasMany
    {
        return $this->hasMany(Activity::class, 'teacher_id', 'user_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function marks(): HasMany
    {
        return $this->hasMany(Marks::class, 'teacher_id', 'user_id');
    }
}
