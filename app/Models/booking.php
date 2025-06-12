<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'stdnt_id',
        'name',
        'department_id',
        'faculty_id',
        'purpose_id',
        'date',
        'time',
    ];

    public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }       

    public function faculty():BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function purpose():BelongsTo
    {
        return $this->belongsTo(Purpose::class);
    }
}
