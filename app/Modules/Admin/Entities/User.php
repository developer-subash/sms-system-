<?php

namespace App\Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use App\Modules\Admin\Entities\Role;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use HasApiTokens,Authenticatable, Authorizable;
    // protected $table = 'users';
    protected $fillable = ['name','birthday','sex','religion','blood_group','permanent_address','phone','email','password','authentication_key','current_address','nationality','mother_tongue','cast_category','disability','known_allergy','parent_id'];
    // protected $hidden = [
 
    //     'password'
      
    //     ];


    public function Roles()
    {
        return $this->belongsToMany(Role::class,'users_roles','user_id','role_id');
    }

    public function hasAnyRoles($roles)
   {      
       if(is_array($roles))
       {        
           foreach($roles as $role)
           {
               if($this->hasRole($role))
               {
                   return true;
               }
           }
       }
       else {
           if($this->hasRole($roles))
           {
               return true;
           }
       }
       return false;
   } 

   public function hasRole($role)
   {   
       
       
       if($this->Roles()->where('name',$role)->first())
       {
            return true;
       }
       return false;
   }

  

  
   

}
