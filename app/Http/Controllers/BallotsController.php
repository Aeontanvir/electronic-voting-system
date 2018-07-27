<?php

namespace App\Http\Controllers;

use App\Voter;
use App\Candidate;
use App\Ballot;
use App\Area;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class BallotsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('ballots.index');
    }

    public function voterStatus(Request $request)
    {
        $voter = Voter::where('nid', '=', $request->nid)->first();
        if($voter){
            return view('ballots.show', 
                    ['voter'=> $voter]
                );
        }
        return Redirect::back()->withErrors(["NID not match, This voter not exists!"])->withInput($request->input());
    }

    
    public function take(Request $request)
    {
        $voter = Voter::find($request->id);
        if($voter){
            $candidates = Candidate::where('area_id', '=', $voter->area_id)->where('zone_id', '=', $voter->zone_id)->get();
            if(count($candidates)){
                return view('ballots.take', 
                    [
                        'voter'=> $voter,
                        'candidates'=> $candidates
                    
                    ]
                );
            }        

        }
        return Redirect::vote()->withErrors(["NID not match, This voter not exists!"])->withInput($request->input());
    }

    public function vote(Request $request)
    {
        $this->validate($request, [
            'voter_id' => 'required',
            'candidate_id' => 'required',
            'zone_id' => 'required',
        ]);

        
        $check = Ballot::where('voter_id', '=', $request->voter_id)->get();
        if(!$check->isEmpty()){
            return view('ballots.cancel');
        }

        $input['voter_id'] = $request->voter_id;
        $input['candidate_id'] = $request->candidate_id;
        $input['zone_id'] = $request->zone_id;

        

        $ballot = Ballot::create($input);
        if($ballot){
            return view('ballots.voted')->with('success' , 'Vote successfully');
        }
        return back()->withInput()->with('errors', 'Vote Unsuccessful!');
    }

    public function area()
    {
        $areas = Area::all();
        $zones = Zone::all(); 
        return view('ballots.area', 
                [
                    'areas'=> $areas,
                    'zones'=> $zones
                ]
            );
    }

    public function result(Request $request)
    {
     
        // $candidates = Ballot::select(DB::raw('candidates.name, COUNT(*) AS count'))
        //                         ->join('candidates', 'ballots.candidate_id', '=', 'candidates.id')
        //                         ->groupBy('ballots.candidate_id')->where('ballots.zone_id', $request->zone_id)->get();

        //$candidates = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = '$someVariable'") );
        $zoneId = $request->zone_id;
        $result = DB::select(" select candidates.name, COUNT(*) AS count from ballots 
                                            inner join candidates on ballots.candidate_id = candidates.id 
                                            where ballots.zone_id = '$zoneId' group by candidates.name" );
        //select 'candidates'.'id', 'candidates'.'name', COUNT(*) AS count from `ballots` inner join `candidates` on `ballots`.`candidate_id` = `candidates`.`id` where `ballots`.`zone_id` = 8 group by `ballots`.`candidate_id`
        return view('ballots.result', 
                [
                    'result'=> $result
                ]
            );
    }


}
