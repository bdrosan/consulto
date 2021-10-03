<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Followup;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $unassigned = Lead::where(['user_id' => null])->count();

        if (Auth::user()->hasRole('counselor')) {
            $unfollowed = Lead::whereNotNull('leads.user_id')
                ->where('leads.user_id', Auth::id())
                ->leftjoin('appointments', 'leads.id', '=', 'appointments.lead_id')
                ->count()
                -
                Followup::where('leads.user_id', Auth::id())
                ->join('leads', 'leads.id', '=', 'followups.lead_id')
                ->groupBy('lead_id')
                ->pluck('lead_id')
                ->count();
        } else {
            $unfollowed = Lead::whereNotNull('leads.user_id')->count() - Followup::groupBy('lead_id')->pluck('lead_id')->count();
        }

        $appointment = Auth::user()->hasRole('counselor') ?
            Appointment::where('time', '>', now())
            ->where('leads.user_id', Auth::id())
            ->join('leads', 'leads.id', '=', 'appointments.lead_id')
            ->count() :
            Appointment::where('time', '>', now())->count();

        return view('dashboard', compact('unfollowed', 'unassigned', 'appointment'));
    }
}