@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <h2 class="card-title float-left">Voter Details: {{ $voter->name }}</h2>
        <h2 class="card-title float-right">Voter ID : {{ $voter->id }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>National ID</th>
                                <td>{{$voter->nid}}</td>
                                <th>Gender</th>
                                <td>{{$voter->gender}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td colspan="3">{{$voter->name}}</td>
                            </tr>
                            <tr>
                                <th>Father</th>
                                <td colspan="3">{{$voter->father_name}}</td>
                            </tr>
                            <tr>
                                <th>Mother</th>
                                <td colspan="3">{{$voter->mother_name}}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{$voter->date_of_birth}}</td>
                                <th>Birth Place</th>
                                <td>{{$voter->birth_place}}</td>
                            </tr>
                            <tr>
                                <th>Blood Group</th>
                                <td>{{$voter->blood}}</td>
                                <th>Religion</th>
                                <td>{{$voter->religion}}</td>
                            </tr>
                            <tr>
                                <th>Area</th>
                                <td>{{$voter->area->district}}</td>
                                <th>Zone</th>
                                <td>{{$voter->zone->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <img src="/images/voters/{{$voter->profile_photo}}" class="img-thumbnail img-fluid">
                    <br/>
                    <br/>
                    <img src="/images/voters/{{$voter->finger_print}}" class="img-thumbnail img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="/assets/found.png" class="img-thumbnail img-fluid">

                    <form
                        method="POST"
                        action="/ballots/take">


                        {!! csrf_field() !!} 
                        
                        <input type="hidden" name="id" class="form-control"  value="{{$voter->id}}" >


                        <button type="submit" class="btn btn-primary float-right"><img src="/assets/vote.png" class="img-thumbnail img-fluid"></button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection