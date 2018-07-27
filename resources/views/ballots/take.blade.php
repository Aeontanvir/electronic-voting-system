@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-left">Voter :: {{ $voter->name}}, Select your candidate and submit you vote!</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/voters/{{$voter->profile_photo}}" class="img-thumbnail img-fluid">
                    <!-- <table class="table">
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
                    </table> -->
                </div>
                <!-- <div class="col-md-4">
                    <img src="/images/voters/{{$voter->profile_photo}}" class="img-thumbnail img-fluid">
                    <br/>
                    <br/>
                    <img src="/images/voters/{{$voter->finger_print}}" class="img-thumbnail img-fluid">
                </div> -->
                <!-- <div class="col-md-2">
                    <img src="/assets/found.png" class="img-thumbnail img-fluid">

                    <form
                        method="POST"
                        action="/ballots/take">


                        {!! csrf_field() !!} 
                        
                        <input type="hidden" name="id" class="form-control"  value="{{$voter->id}}" >


                        <button type="submit" class="btn btn-primary float-right"><img src="/assets/vote.png" class="img-thumbnail img-fluid"></button>

                    </form>
                </div> -->
                <div class="col-md-8">
                    <form method="POST" action="/ballots/vote">
                        {!! csrf_field() !!}
                        <input type="hidden" name="voter_id" value="{{$voter->id}}">
                        <input type="hidden" name="zone_id" value="{{$voter->zone->id}}">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Party</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($candidates as $candidate)
                                <tr>
                                    <td>
                                        <img src="/images/{{$candidate->party->image}}" alt="" class="thumb">
                                    </td>
                                    <td>{{$candidate->name}}</td>
                                    <th scope="row">
                                        <img src="/images/candidates/{{$candidate->profile_photo}}" alt="" class="thumb">
                                    </th>

                                    <td>
                                        <input type="radio" id="radio_{{$candidate->id}}" name="candidate_id" value="{{$candidate->id}}">
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <button type="submit" class="btn btn-primary float-right"><img src="/assets/voted.png" class="img-thumbnail img-fluid"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection