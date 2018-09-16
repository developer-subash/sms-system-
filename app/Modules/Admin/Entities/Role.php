<?php

namespace App\Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Admin\Entities\Role;

class Role extends Model
{
    protected $fillable = ['name','description'];

    public function Users()
    {
        return $this->belongsToMany(Role::class,'users_roles','role_id','user_id');
    }

}


