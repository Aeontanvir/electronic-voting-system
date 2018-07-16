<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $areas = Area::all();
        return view('areas.index', 
                    ['areas'=> $areas]
                );
    }


    public function create()
    {
        return view('areas.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'district' => 'required',
        ]);

        $area = Area::create([
            'district' => $request->input('district')
        ]);
        if($area){
            return redirect('areas');
        }
        
        return back()->withInput()->with('errors', 'Error creating new area');
    }

    public function show(Area $area)
    {
        $area = Area::find($area->id);
        return view('areas.show', 
                    ['area'=> $area]
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
