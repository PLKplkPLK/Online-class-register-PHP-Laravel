<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function activity(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
