<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserProfile extends Model
{
    use HasFactory;
    protected $table="profiles";
    protected $fillable=[
        "profile_name","phone","email","profile_pic","github","fb","user_id","linkedin"
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}
