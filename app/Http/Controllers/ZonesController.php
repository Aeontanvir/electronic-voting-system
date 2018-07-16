<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Http\Request;

class ZonesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'area_id' => 'required',
        ]);

        $zone = Zone::create([
            'name' => $request->input('name'),
            'area_id' => $request->input('area_id'),
        ]);
        if($zone){
            return redirect()->route('areas.show', ['id' => $zone->area->id])
            ->with('success', "Zone created successfully!");
        }
        
        return back()->withInput()->with('errors', 'Error creating new zone');
    }

    public function destroy(Zone $zone)
    {
        $findZone = Zone::find($zone->id);
        $area_id = $findZone->area->id;
        if($findZone->delete()) {
            return redirect()->route('areas.show', ['id' => $area_id])
            ->with('success', "Zone deleted successfully!");
        }
        return back()->withInput()->with('errors', "Zone could not be deleted!");
    }
}
