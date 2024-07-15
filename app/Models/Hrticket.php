<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hrticket extends Model
{
    use HasFactory;

    protected $primaryKey = 'form_id';

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    protected $fillable = [
        'status',
        'application_date',
        'concerned_employee',
        'type_of_ticket',
        'type_of_request',
        'sub_type_of_request',
        'type_of_pe_hr_ops',
        'account_client_hr_ops',
        'request_requested',
        'purpose',
        'type_of_hrconcern',
        'condition_availability',
        'request_extra',
        'request_assigned',
        'request_link',
        'request_date',
        'request_others',
    ];

}
