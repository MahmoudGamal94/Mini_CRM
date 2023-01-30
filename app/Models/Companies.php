<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'comp_id';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'logo',
        'website',
        'email',
    ];
}
