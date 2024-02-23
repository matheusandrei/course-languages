<?php

namespace App\Models;

use App\Models\CRUD;

class Student extends CRUD
{
    protected $table = 'courseStudent';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'phone', 'email', 'courseGroup_id'];
}
