@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-left">Select For Result</h2>
        </div>
        <div class="card-body">


            <form method="POST" action="/ballots/result" enctype="multipart/form-data">

                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="area_id">Area</label>
                            <select class="form-control" name="area_id" id="area_id" required>
                                <option value="">--Select--</option>
                                @foreach($areas as $area)
                                <option value="{{$area->id}}"  @if(old('area_id') == $area->id) selected @endif >{{$area->district}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="zone_id">Zone</label>
                            <select class="form-control" name="zone_id" id="zone_id" value="{{ old('zone_id') }}" required>
                                <option value="">--Select--</option>
                                @foreach($zones as $zone)
                                <option value="{{$zone->id}}"  @if(old('area_id') == $zone->id) selected @endif >{{$zone->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-right">Check Reuslt</button>

            </form>


        </div>
    </div>
</div>

@endsection