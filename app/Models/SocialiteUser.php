<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialiteUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    protected $table = "socialite_users";
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
