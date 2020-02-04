<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table='users';
    protected $fillable = ['name', 'email', 'password', 'profile', 'type', 'phone', 'dob', 'address','create_user_id','deleted_at'];
    
    public function post () {
        return $this->hasMany ('Post');
    }

    public function users(){
        return $this->belongsTo( Users::class , 'create_user_id');
    }

    protected $dates = ['created_at'];

    
}

