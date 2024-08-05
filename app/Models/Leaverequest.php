<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leaverequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'form_id';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    protected $fillable = [
        'employee_id',
        'date_of_filing',
        'position_type',
        'salary',
        'status',
        'type_of_leave',
        'type_of_leave_sub_category',
        'type_of_leave_description',
        'num_of_days_work_days_applied',
        'inclusive_start_date',
        'inclusive_end_date',
        'commutation',
        'commutation_signature_of_appli',
        'approved_by_hr',
        'approved_by_president',

    ];
}
