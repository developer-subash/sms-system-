<?php

namespace App\Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $table = 'settings';
    protected $fillable = ['type','description'];
}
