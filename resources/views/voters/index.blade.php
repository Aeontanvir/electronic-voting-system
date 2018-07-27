@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-left">Voters</h2>
            <a class="btn btn-outline-primary btn-sm float-right" href="/voters/create">Register new</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Profile</th>
                        <th scope="col">Thumb</th>
                        <th scope="col">NID</th>
                        <th scope="col">Father</th>
                        <th scope="col">Mother</th>
                        <th scope="col">NID</th>
                        <th scope="col">Area</th>
                        <th scope="col">Zone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($voters as $voter)
                    <tr>
                        <th scope="row">
                            <img src="/images/voters/{{$voter->profile_photo}}" alt="" class="thumb" >
                        </th>
                        <th scope="row">
                            <img src="/images/voters/{{$voter->finger_print}}" alt="" class="thumb">
                        </th>
                        <td>{{$voter->name}}</td>
                        <td>{{$voter->father_name}}</td>
                        <td>{{$voter->mother_name}}</td>
                        <td>{{$voter->nid}}</td>
                        <td>{{$voter->area->district}}</td>
                        <td>{{$voter->zone->name}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm float-right" href="/voters/{{$voter->id}}">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection