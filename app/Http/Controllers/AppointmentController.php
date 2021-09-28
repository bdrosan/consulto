<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::where('appointments.is_active', '1')
            ->join('leads', 'leads.id', '=', 'appointments.lead_id')
            ->join('users', 'users.id', '=', 'leads.user_id')
            ->select('leads.name', 'users.name as counselor', 'appointments.*')
            ->paginate(10);
        return view('appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointment.create');
    }

    public function createByLead($lead_id)
    {
        $lead = Lead::find($lead_id);
        return view('appointment.createByLead', compact('lead'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //time,agenda,lead_id
        $request->validate([
            'lead_id' => 'required',
            'time' => 'required',
        ]);

        $appointment = new Appointment();

        $appointment->time = $request->time;
        $appointment->agenda = $request->agenda;
        $appointment->lead_id = $request->lead_id;

        $appointment->save();

        return redirect()->route('appointment.index')->with('success', 'Appointment set successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function leadShow($lead_id)
    {
        $appointments = Appointment::where('lead_id', $lead_id)->orderBy('id', 'desc')->get();

        return view('appointment.leadView', compact('appointments', 'lead_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}