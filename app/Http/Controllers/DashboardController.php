<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Date;
use App\Models\Makeup;
use App\Models\Catering;
use App\Models\Service;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $user_type = $user->user_type;

        $totalUsers = User::count();

        // Modify the queries to fetch data only for the authenticated user
        $totalDate = Date::count();
        $totalMakeup = Makeup::count();
        $totalCatering = Catering::count();
        $totalService = Service::count();
        $totalAvailable = Service::where('status', 1)->count();
        $totalUnavailable = Service::where('status', 0)->count();

        return view($user_type . '.dashboards.index', compact('totalUsers', 'totalDate', 'totalMakeup', 'totalCatering', 'totalService', 'totalAvailable', 'totalUnavailable'));
    }
}
