<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $unassigned = Lead::where(['user_id' => null])->count();
        $unfollowed = Lead::whereNotNull('leads.user_id')->count() - Followup::groupBy('lead_id')->pluck('lead_id')->count();
        return view('dashboard', compact('unfollowed', 'unassigned'));
    }
}