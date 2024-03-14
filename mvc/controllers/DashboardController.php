<?php

namespace App\Controllers;

use App\Models\Dashboard;
use App\Providers\View;

class DashboardController
{
    public function index()
    {
        if (!$_SESSION['user_id']) {
            return View::redirect('login');
        }

        $dashboard = new Dashboard;
        $select = $dashboard->select();

        if ($select) {
            return View::render('dashboard', ['dashboard' => $select]);
        } else {
            return View::render('error');
        }
    }
}