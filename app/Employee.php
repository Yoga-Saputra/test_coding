<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable =[
        'nama', 'email'
    ];
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
