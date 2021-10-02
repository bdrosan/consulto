<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Followup;
use App\Models\Lead;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class FollowupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations = Followup::where('user_id', Auth::id())
            ->join('leads', 'leads.id', '=', 'followups.lead_id')
            ->select('followups.*', 'leads.phone')
            ->orderBy('followups.id', 'desc')
            ->paginate(10);

        $leads = Lead::where('leads.user_id', Auth::id())
            ->where('is_active', 1)
            ->whereNull('followups.id')
            ->leftjoin('followups', 'leads.id', '=', 'followups.lead_id')
            ->select('leads.*')
            ->paginate(10, ['*'], 'lage');

        $active_leads = Lead::where('leads.user_id', Auth::id())
            ->join('followups', 'leads.id', '=', 'followups.lead_id')
            ->select('leads.*')
            ->selectRaw('count(lead_id) calls, ROUND( AVG(rating),1 ) rating')
            ->groupBy('leads.id')
            ->orderBy('followups.id', 'desc')
            ->paginate(10, ['*'], 'al_page');

        $dead_leads = Lead::where('leads.user_id', Auth::id())
            ->where('is_active', 0)
            ->paginate(10, ['*'], 'dl_page');

        return view('followup.index', compact('conversations', 'leads', 'active_leads', 'dead_leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('followup.create');
    }

    public function createByLead($lead)
    {
        return view('followup.createByLead', ['lead', $lead]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'conversation' => 'required',
        ]);

        $followup = new Followup();

        if ($lead = Lead::where('phone', $request->phone)->first())
            $followup->lead_id = $lead->id;
        else
            $followup->lead_id = $request->lead_id;

        $followup->conversation = $request->conversation;
        $followup->rating = $request->rating;

        $followup->save();

        return redirect('follow-up');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'conversation' => Followup::where('followups.id', $id)
                ->join('leads', 'leads.id', '=', 'followups.lead_id')
                ->select('followups.*', 'leads.phone')
                ->first()
        );
        return view('followup.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'id' => $id,
            'conversation' => Followup::find($id)
        );
        return view('followup.edit', $data);
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
        $validated = $request->validate([
            'conversation' => 'required',
        ]);

        $followup = Followup::find($id);
        $followup->conversation = $request->conversation;
        $followup->rating = $request->rating;

        $followup->save();

        return redirect('follow-up');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Followup::destroy($id))
            return 1;
    }

    public function leadShow($lead_id)
    {

        $appointment = Appointment::where('lead_id', $lead_id)->whereDate('time', '>', Carbon::now()->toDateTimeString())->first();

        if ($appointment) {
            if (Carbon::parse($appointment->time)->isToday())
                $time = 'Today ' . Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->format('h:i a');
            elseif (Carbon::parse($appointment->time)->diff(Carbon::tomorrow())->format('%a') == 0)
                $time = 'Tomorrow ' . Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->format('h:i a');
            else {
                $time = Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->format('l d M Y h:i a');
            }
        } else {
            $time = false;
        }

        $data = array(
            'id' => $lead_id,
            'conversations' => Followup::where('lead_id', $lead_id)->orderBy('id', 'desc')->paginate(10),
            'lead' => Lead::where('id', $lead_id)->where('user_id', Auth::id())->first(),
            'users' => User::where('id', '!=', Auth::id())->role('counselor')->get(),
            'appointment' => $time
        );
        return view('followup.leadview', $data);
    }

    public function moveToArchive($lead_id)
    {
        if (Lead::where('id', $lead_id)->update(['is_active' => 0])) {
            return redirect()->route('followup.leadShow', $lead_id)->with('success', 'Moved to archive');
        }
    }

    public function undoArchive($lead_id)
    {
        if (Lead::where('id', $lead_id)->update(['is_active' => 1])) {
            return redirect()->route('followup.leadShow', $lead_id)->with('success', 'Retrieved from archive');
        }
    }

    public function transfer(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        Lead::where('id', $id)
            ->update(['user_id' => $request->user_id]);

        return redirect()->route('follow-up.index')->with('success', 'Lead ownership transfered');
    }
}