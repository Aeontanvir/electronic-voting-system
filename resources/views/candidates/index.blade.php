@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-left">Candidates</h2>
            <a class="btn btn-outline-primary btn-sm float-right" href="/candidates/create">Create new</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Profile</th>
                        <th scope="col">Thumb</th>
                        <th scope="col">Name</th>
                        <th scope="col">Father</th>
                        <th scope="col">Mother</th>
                        <th scope="col">NID</th>
                        <th scope="col">Area</th>
                        <th scope="col">Zone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidates as $candidate)
                    <tr>
                        <th scope="row">
                            <img src="/images/candidates/{{$candidate->profile_photo}}" alt="" class="thumb" >
                        </th>
                        <th scope="row">
                            <img src="/images/candidates/{{$candidate->finger_print}}" alt="" class="thumb">
                        </th>
                        <td>{{$candidate->name}}</td>
                        <td>{{$candidate->father_name}}</td>
                        <td>{{$candidate->mother_name}}</td>
                        <td>{{$candidate->nid}}</td>
                        <td>{{$candidate->area->district}}</td>
                        <td>{{$candidate->zone->name}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm float-right" href="/candidates/{{$candidate->id}}">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection