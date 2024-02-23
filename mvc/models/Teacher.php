<?php

namespace App\Models;

use App\Models\CRUD;

class Teacher extends CRUD
{
    protected $table = 'courseTeacher';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'phone', 'email','courseGroup_id'];
}
