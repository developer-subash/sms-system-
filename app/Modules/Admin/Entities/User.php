<?php

namespace App\Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Modules\Admin\Entities\User;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model 
{
    // protected $table = 'users';
    protected $fillable = ['name','birthday','sex','religion','blood_group','permanent_address','phone','email','password','authentication_key','current_address','nationality','mother_tongue','cast_category','disability','known_allergy','parent_id'];
    // protected $hidden = [
 
    //     'password'
      
    //     ];


    public function Roles()
    {
        return $this->belongsToMany(User::class,'users_roles','user_id','role_id');
    }
}
