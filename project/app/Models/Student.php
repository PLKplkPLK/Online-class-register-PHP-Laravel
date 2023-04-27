<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class Student extends User
{
    use HasFactory;
    use Sortable;

    protected $primaryKey = 'user_id';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function grade(): BelongsTo
    {
        return $this->BelongsTo(Grade::class, 'class_id', 'id');
    }

    public function marks(): HasMany
    {
        return $this->hasMany(Marks::class, 'student_id', 'user_id');
    }
}
