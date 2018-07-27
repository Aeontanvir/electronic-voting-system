<?php

namespace App\Http\Controllers;

use App\Voter;
use App\Area;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VotersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $voters = Voter::all();

        return view('voters.index', 
                    ['voters'=> $voters]
                );
    }

    public function create()
    {
        $areas = Area::all();
        $zones = Zone::all(); 
        return view('voters.create', 
                [
                    'areas'=> $areas,
                    'zones'=> $zones
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
            'birth_place' => 'required',
            'blood' => 'required',
            'religion' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'profile_photo'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'finger_print'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'area_id' => 'required',
            'zone_id' => 'required'
        ]);

        $check = Voter::where('nid', '=', $request->nid)->get();
        if(!$check->isEmpty()){
            return Redirect::back()->withErrors(["NID not unique!"])->withInput($request->input());
        }


        $input['nid'] = $request->nid;
        $input['name'] = $request->name;
        $input['father_name'] = $request->father_name;
        $input['mother_name'] = $request->mother_name;
        $input['occupation'] = $request->occupation;
        $input['date_of_birth'] = $request->date_of_birth;
        $input['birth_place'] = $request->birth_place;
        $input['blood'] = $request->blood;
        $input['gender'] = $request->gender;
        $input['religion'] = $request->religion;
        $input['address'] = $request->address;
        $input['area_id'] = $request->area_id;
        $input['zone_id'] = $request->zone_id;

        $input['profile_photo'] = time().'pp.'.$request->profile_photo->getClientOriginalExtension();
        $request->profile_photo->move(public_path('images/voters'), $input['profile_photo']);

        $input['finger_print'] = time().'.'.$request->finger_print->getClientOriginalExtension();
        $request->finger_print->move(public_path('images/voters'), $input['finger_print']);

        $voter = Voter::create($input);
        if($voter){
            return redirect()->route('voters.show', ['voter'=> $voter->id])
            ->with('success' , 'Voter registration successfully');
        }
        return back()->withInput()->with('errors', 'Error registration new Voter!');
    }

    public function show(Voter $voter)
    {
        $voter = Voter::find($voter->id);
        return view('voters.show', 
                    ['voter'=> $voter]
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
