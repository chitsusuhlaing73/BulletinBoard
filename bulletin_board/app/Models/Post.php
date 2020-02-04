<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
class Post extends Model
{
    use SoftDeletes;
    protected $table='posts';
    protected $fillable = ['title','description','create_user_id','updated_user_id' ,'deleted_at'];

    public function users(){
        return $this->belongsTo( Users::class , 'create_user_id');
    }
}
