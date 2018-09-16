<?php

namespace App\Modules\ClassSection\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\ClassSection\Entities\Section;

class ClassStudent extends Model
{
    protected $fillable = ['class_name'];

    public function Sections()
    {
        return $this->hasMany(Section::class);
    }
}
