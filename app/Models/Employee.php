<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getBirthDateAttribute($val)
    {
        return date('d,M,Y',strtotime($val));
    }


    public function getCreatedAtAttribute($val)
    {
        return date('d,M,Y',strtotime($val));
    }

    public function getDeletedAtAttribute($val)
    {
        return date('d,M,Y',strtotime($val));
    }
}
