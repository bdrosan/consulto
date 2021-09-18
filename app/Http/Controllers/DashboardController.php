<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use App\Models\Lead;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $lead = Lead::count();
        $unassigned = Lead::where(['user_id' => null])->count();
        $followup = Followup::count();
        return view('dashboard', compact('lead', 'followup', 'unassigned'));
    }
}