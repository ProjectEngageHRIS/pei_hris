<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ittickets extends Model
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
        'application_date',
        'status',
        'employee_id',
        'description',
        'report',
        'cancelled_at'
    ];
}
