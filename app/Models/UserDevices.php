<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDevices extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'device_guid', 'last_used_at', 'expires_at'];

    public $incrementing = false;
    protected $keyType = 'uuid';

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->device_guid = Str::uuid();
        });
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
