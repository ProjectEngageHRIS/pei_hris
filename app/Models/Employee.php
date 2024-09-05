<?php

namespace App\Models;

use App\Models\Dailytimerecord;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    // protected $primaryKey = 'employee_id';

    protected $primaryKey = 'employee_id'; // Specify your custom primary key

    // If the primary key is not an incrementing integer, you also need to specify the key type
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'college_id' => 'array',
        'department_id' => 'array',
        'is_department_head' => 'array',
        'is_college_head' => 'array',
        // 'emp_image' => 'array',
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
        'other_documents' => 'array',
        'sss_num' => 'encrypted',
        'tin_num' => 'encrypted',
        'phic_num' => 'encrypted',
        'hdmf_num' => 'encrypted',
    ];
}
