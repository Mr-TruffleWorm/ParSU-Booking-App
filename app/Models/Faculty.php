<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faculty extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'department_id'
    ];
    Public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function purposes()
    {
        return $this->hasMany(Purpose::class);
    }
}
