<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'name', 'father_name', 'mother_name', 'email', 'dob', 'image', 'mobile', 
        'contact_address', 'designation', 'join_date'
    ];
}
