@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-left">Candidate Registration</h2>
        </div>
        <div class="card-body">


            <form
                method="POST"
                action="{{route('candidates.store')}}"
                enctype="multipart/form-data">

                {!! csrf_field() !!} 
                
                
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="nid">National ID</label>
                            <input type="text" name="nid" class="form-control" id="nid" placeholder="NID">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="party_id">Party</label>
                            <select class="form-control" name="party_id" id="party_id">
                                <option value="">--Select--</option>
                                @foreach($parties as $party)
                                    <option value="{{$party->id}}">{{$party->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Candidate's Full Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Candidate's Full Name" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="father_name">Father Name</label>
                    <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Father Name">
                </div>
                <div class="form-group">
                    <label for="mother_name">Mother Name</label>
                    <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Mother Name">
                </div>

                <div class="form-group">
                    <label for="occupation">Occupation</label>
                    <input type="text" name="occupation" class="form-control" id="occupation" placeholder="Occupation">
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth">
                </div>

                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="area_id">Area</label>
                            <select class="form-control" name="area_id" id="area_id">
                                <option value="">--Select--</option>
                                @foreach($areas as $area)
                                    <option value="{{$area->id}}">{{$area->district}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="zone_id">Zone</label>
                            <select class="form-control" name="zone_id" id="zone_id">
                                <option value="">--Select--</option>
                                @foreach($zones as $zone)
                                    <option value="{{$zone->id}}">{{$zone->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="profile_photo">Profile Photo</label>
                            <input type="file" name="profile_photo" id="profile_photo" class="form-control">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="finger_print">Finger Print Scan</label>
                            <input type="file" name="finger_print" id="finger_print" class="form-control">
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary float-right">Register</button>

            </form>


        </div>
    </div>
</div>

@endsection