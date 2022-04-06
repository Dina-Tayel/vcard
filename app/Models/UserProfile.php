<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table="profiles";
    protected $fillable=[
        "phone","email","profile_pic","github","fb","user_id","linkedin"
    ];
}
