<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PracticumPlacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'company_id',
        'position_title',
        'description',
        'start_date',
        'end_date',
        'status',
        'requirements',
        'stipend',
        'supervisor_name',
        'supervisor_email',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'stipend' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
