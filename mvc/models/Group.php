<?php

namespace App\Models;

use App\Models\CRUD;

class Group extends CRUD
{
    protected $table = 'coursegroup';
    protected $fillable = ['course_id', 'courseStudent_id'];
    
}