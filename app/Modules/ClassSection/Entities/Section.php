<?php

namespace App\Modules\ClassSection\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\ClassSection\Entities\ClassStudent;

class Section extends Model
{
    protected $fillable = ['name','class_id','year'];

    public function Class()
    {
        return $this->belongsTo(ClassStudent::class);
    }
}
