<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpVerification extends Model
{
    use HasFactory;

      // The table associated with the model.
      protected $table = 'otp_verifications';

      // The attributes that are mass assignable.
      protected $fillable = [
          'email', 'otp', 'expires_at',
      ];
  
      // The attributes that should be cast to native types.
      protected $casts = [
          'expires_at' => 'datetime',
      ];
}
