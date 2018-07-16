<?php

namespace App\Http\Controllers;

use App\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::check()){
            $parties = Party::all();

            return view('parties.index', 
                        ['parties'=> $parties]
                    );
        }
        return redirect()->route('login');
    }

    public function create()
    {
        return view('parties.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);


        $input['title'] = $request->title;
        $input['short'] = $request->short;
        $input['description'] = $request->description;
        $party = Party::create($input);
        if($party){
            return redirect()->route('parties.show', ['party'=> $party->id])
            ->with('success' , 'Party registration successfully');
        }
        return back()->withInput()->with('errors', 'Error registration new party!');
    }

    public function show(Party $party)
    {
        $party = Party::find($party->id);
        return view('parties.show', 
                    ['party'=> $party]
                );
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
