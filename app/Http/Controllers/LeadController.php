<?php

namespace App\Http\Controllers;

use App\Imports\LeadsImport;
use App\Models\Lead;
use Illuminate\Http\Request;
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
        return view("lead.index", ['leads' => Lead::orderBy('id', 'desc')->paginate(10)]);
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
        return view('lead.view', ['lead' => $lead]);
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

    public function liveSearch(Request $request)
    {
        if ($request->ajax()) {
            $data = Lead::where('phone', 'LIKE', $request->phone . '%')->limit(5)
                ->get();
            $output = '';
            if (count($data) > 0) {
                $output = '<ul>';
                foreach ($data as $row) {
                    $output .= '<li class="py-2">' . $row->name . ' -> ' . $row->phone . '</li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="">' . 'No results' . '</li>';
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
}