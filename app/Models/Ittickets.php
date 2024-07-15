<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ittickets extends Model
{
    protected $primaryKey = 'form_id';

    use HasFactory;

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
    ];
}
