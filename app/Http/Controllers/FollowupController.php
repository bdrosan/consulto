<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'conversations' => Followup::where('followups.user_id', Auth::id())
                ->join('leads', 'leads.id', '=', 'followups.lead_id')
                ->select('followups.*', 'leads.phone')
                ->orderBy('followups.id', 'desc')
                ->paginate(10),

            'leads' => Lead::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(10)
        );
        return view('followup.index', $data);
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

        $followup->user_id = Auth::id();
        $followup->conversation = $request->conversation;

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
            'id' => $id,
            'conversations' => Followup::where('lead_id', $id)->orderBy('id', 'desc')->paginate(10),
            'lead' => Lead::where('id', $id)->where('user_id', Auth::id())->first()
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