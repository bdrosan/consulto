<?php

namespace App\Http\Controllers;

use App\Imports\LeadsImport;
use App\Models\Followup;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role('counselor')->get();
        $leads = Lead::leftJoin('users', 'users.id', '=', 'leads.user_id')
            ->select('leads.*', 'users.name as assign_to')
            ->orderBy('user_id', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view("lead.index", compact('leads', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lead.create');
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
            'name' => 'required',
            'phone' => 'required',
        ]);

        $lead = new Lead();

        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->ielts = $request->ielts;
        $lead->qualification = $request->qualification;
        $lead->result = $request->result;
        $lead->country = $request->country;
        $lead->subject = $request->subject;
        $lead->address = $request->address;
        $lead->note = $request->note;

        $lead->save();

        return redirect('lead');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = Lead::find($id);
        $user = $lead->user_id ? User::find($lead->user_id) : false;
        $users = User::role('counselor')->get();
        $conversations = Followup::where('lead_id', $id)->orderBy('id', 'desc')->paginate(10);

        return view('lead.view', compact('lead', 'user', 'users', 'id', 'conversations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('lead.edit', ['id' => $id, 'lead' => Lead::find($id)]);
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
            'name' => 'required',
            'phone' => 'required',
        ]);

        $lead = Lead::find($id);

        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->ielts = $request->ielts;
        $lead->qualification = $request->qualification;
        $lead->result = $request->result;
        $lead->country = $request->country;
        $lead->subject = $request->subject;
        $lead->address = $request->address;
        $lead->note = $request->note;

        $lead->save();

        return redirect()->route('lead.index')->with('success', 'Successfully updated.');
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        Lead::where('id', $id)
            ->update(['user_id' => $request->user_id]);

        return redirect()->route('lead.show', $id)->with('success', 'Successfully assigned.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lead::destroy($id);
        return 1;
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $users = User::role('counselor')->get();
        $leads = Lead::where('leads.phone', 'LIKE', '%' . $q . '%')
            ->orWhere('leads.name', 'LIKE', '%' . $q . '%')
            ->leftJoin('users', 'users.id', '=', 'leads.user_id')
            ->select('leads.*', 'users.name as assign_to')
            ->orderBy('user_id', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view("lead.index", compact('leads', 'users', 'q'));
    }

    public function liveSearch(Request $request)
    {
        if ($request->ajax()) {
            $data = Lead::where('phone', 'LIKE', $request->phone . '%')->where('user_id', Auth::id())->limit(5)
                ->get();
            $output = '';
            if (count($data) > 0) {
                $output = '<div class="md:flex justify-evenly">';
                $output .= '<div></div>';
                $output .= '<ul>';
                foreach ($data as $row) {
                    $output .= '<li class="py-2 cursor-pointer">' . $row->name . ' :: ' . $row->phone . '</li>';
                }
                $output .= '</ul>';
                $output .= '</div>';
            }
            return $output;
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'importFile' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        Excel::import(new LeadsImport, $request->importFile);

        return redirect('/lead')->with('success', 'Imported Successfully');
    }

    public function bulkAction(Request $request)
    {
        $request->validate(
            [
                'action' => 'required',
                'check' => 'required',
            ],
            [
                'check.required' => 'Nothing selected. Al least one field must be checked'
            ]
        );

        $user_id = [];
        foreach ($request->check as $check) {
            array_push($user_id, (int)$check);
        }

        if ($request->action === 'assign') {
            $request->validate([
                'counselor' => 'required'
            ]);

            if (Lead::whereIn('id', $user_id)->update(['user_id' => $request->counselor]))
                return redirect('/lead')->with('success', 'Successfully assigned');
        }

        if ($request->action === 'delete') {
            if (Lead::destroy($user_id)) {
                return redirect('/lead')->with('success', 'Successfully deleted');
            }
        }
    }

    public function transfer(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        Lead::where('id', $id)
            ->update(['user_id' => $request->user_id]);

        return redirect()->route('lead.index')->with('success', 'Lead ownership transfered');
    }
}