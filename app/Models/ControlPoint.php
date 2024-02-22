<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlPoint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'DtHr',
        'ClockIn',
        'LunchTimeIn',
        'LunchTimeOut',
        'ClockOut',
        'UserId',
        'Status',
    ];

    protected $guarded = ['id'];
    protected $table = 'clock_in_out';
    protected $dates = ['created_at', 'update_at'];
}

