<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChangeInformation extends Model 
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
        'status'
    ];

    protected $casts = [
        'employee_history' => 'array',
        'emp_image' => 'array',
        'emp_diploma' => 'array',
        'emp_tor' => 'array',
        'emp_cert_of_trainings_seminars' => 'array',
        'emp_auth_copy_of_csc_or_prc' => 'array',
        'emp_auth_copy_of_prc_board_rating' => 'array',
        'emp_med_certif' => 'array',
        'emp_nbi_clearance' => 'array',
        'emp_psa_birth_certif' => 'array',
        'emp_psa_marriage_certif' => 'array',
        'emp_service_record_from_other_govt_agency' => 'array',
        'emp_approved_clearance_prev_employer' => 'array',
        'other_documents' => 'array'
    ];
}
