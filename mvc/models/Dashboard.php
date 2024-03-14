<?php

namespace App\Models;

use App\Models\CRUD;

class Dashboard extends CRUD
{
    protected $table = 'dashboard';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'ipAddress', 'userName', 'userId', 'dateTime', 'page'];
}