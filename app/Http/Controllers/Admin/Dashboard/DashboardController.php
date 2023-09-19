<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    function getDashboard()
    {
        $landlords = User::orderBy('created_at', 'DESC')->where('is_approved', false)->paginate(20);

        return view('admin.dashboard.index', compact('landlords'));
    }

}
