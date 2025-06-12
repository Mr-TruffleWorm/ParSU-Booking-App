<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purpose extends Model
{
    use HasFactory;
    protected $fillable = [
        'faculty_id', 'name'
    ];
    Public function faculty():BelongsTo
    {
        return $this->belongsTo(Faculty::class, );
    }
}
