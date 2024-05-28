<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    const STATUS_NOT_PROCESS_YET = 'not process yet';
    const STATUS_IN_PROGRESS = 'in progress';
    const STATUS_NOT_FORWARDED = 'not forwarded';
    const STATUS_COMPLETED = 'completed';

    const TYPE_AIR_CONDITIONING = 'Air Conditioning';
    const TYPE_FURNITURE = 'Furniture';
    const TYPE_TOILET = 'Toilet';
    const TYPE_INTERNET = 'Internet';
    const TYPE_TEACHING_AIDS = 'Teaching Aids';

    protected $fillable = [
        'name',
        'reporting_id',
        'title',
        'description',
        'type',
        'attachment',
        'user_id',
        'technician_id',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function technician(): BelongsTo
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
