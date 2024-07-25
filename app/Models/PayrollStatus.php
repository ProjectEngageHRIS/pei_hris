<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollStatus extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_id',
        'target_employee',
        'phase',
        'status',
        'month',
        'year'
    ];
}
