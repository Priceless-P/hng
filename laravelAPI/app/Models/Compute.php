<?php

namespace App\Models;

use App\Enums\OperationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compute extends Model
{
    use HasFactory;
    protected $fillable = [
        'slackUsername',
        'result',
        'operation_type',
    ];

    protected $casts = [
        'operation_type' => OperationType::class
    ];
}
