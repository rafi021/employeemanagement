<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'address',
        'department_id',
        'country_id',
        'city_id',
        'state_id',
        'zip_code',
        'birthdate',
        'date_hired',
    ];
}
