<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'emp_id';
    public $timestamps = true;
    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'phone',
    ];

    public function get_comp_name()
    {
        return $this->hasOne('App\Models\Companies','comp_id','company');
    }
}
