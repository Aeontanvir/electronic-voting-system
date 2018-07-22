<?php

namespace App\Http\Controllers;

use App\Candidate;
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
        //
    }


    public function store(Request $request)
    {
        //
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
