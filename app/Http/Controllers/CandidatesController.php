<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Area;
use App\Zone;
use App\Party;
use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $candidates = Candidate::all();

        return view('candidates.index', 
                    ['candidates'=> $candidates]
                );
    }


    public function create()
    {
        $areas = Area::all();
        $zones = Zone::all(); 
        $parties = Party::all();
        return view('candidates.create', 
                [
                    'areas'=> $areas,
                    'zones'=> $zones,
                    'parties'=> $parties
                ]
            );
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nid' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'occupation' => 'required',
            'date_of_birth' => 'required',
            'profile_photo'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'finger_print'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'area_id' => 'required',
            'zone_id' => 'required',
            'party_id' => 'required'
        ]);


        $input['nid'] = $request->nid;
        $input['name'] = $request->name;
        $input['father_name'] = $request->father_name;
        $input['mother_name'] = $request->mother_name;
        $input['occupation'] = $request->occupation;
        $input['date_of_birth'] = $request->date_of_birth;
        $input['area_id'] = $request->area_id;
        $input['zone_id'] = $request->zone_id;
        $input['party_id'] = $request->party_id;

        $input['profile_photo'] = time().'pp.'.$request->profile_photo->getClientOriginalExtension();
        $request->profile_photo->move(public_path('images/candidates'), $input['profile_photo']);

        $input['finger_print'] = time().'.'.$request->finger_print->getClientOriginalExtension();
        $request->finger_print->move(public_path('images/candidates'), $input['finger_print']);

        $candidate = Candidate::create($input);
        if($candidate){
            return redirect()->route('candidates.show', ['party'=> $candidate->id])
            ->with('success' , 'Candidate registration successfully');
        }
        return back()->withInput()->with('errors', 'Error registration new Candidate!');
    }


    public function show(Candidate $candidate)
    {
        $candidate = Candidate::find($candidate->id);
        return view('candidates.show', 
                    ['candidate'=> $candidate]
                );
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
