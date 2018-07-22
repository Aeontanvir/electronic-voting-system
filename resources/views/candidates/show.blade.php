@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <h2 class="card-title float-left">{{ $candidate->name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>NID</th>
                                <td>{{$candidate->nid}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$candidate->name}}</td>
                            </tr>
                            <tr>
                                <th>Father</th>
                                <td>{{$candidate->father_name}}</td>
                            </tr>
                            <tr>
                                <th>Mother</th>
                                <td>{{$candidate->mother_name}}</td>
                            </tr>
                            <tr>
                                <th>Occupation</th>
                                <td>{{$candidate->occupation}}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{$candidate->date_of_birth}}</td>
                            </tr>
                            <tr>
                                <th>Area</th>
                                <td>{{$candidate->area->district}}</td>
                            </tr>
                            <tr>
                                <th>Zone</th>
                                <td>{{$candidate->zone->name}}</td>
                            </tr>
                            <tr>
                                <th>Party</th>
                                <td>
                                    <h4>{{$candidate->party->title}}</h4>
                                    <img src="/images/{{$candidate->party->image}}" 
                                        class="img-thumbnail img-fluid">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <img src="/images/candidates/{{$candidate->profile_photo}}" class="img-thumbnail img-fluid">
                    <br/>
                    <br/>
                    <img src="/images/candidates/{{$candidate->finger_print}}" class="img-thumbnail img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection