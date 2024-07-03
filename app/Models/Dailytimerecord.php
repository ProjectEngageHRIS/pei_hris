<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dailytimerecord extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    protected $fillable = [
        'employee_id',
        'attendance_date',
        'attendance_details',
        'attendance_type',
    ];
}
