<?php

namespace App\Models;

use App\Models\CRUD;

class Course extends CRUD
{
    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'courseTeacher_id'];
}
