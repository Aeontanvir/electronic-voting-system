@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-left">Areas</h2>
            <a class="btn btn-outline-primary btn-sm float-right" href="/areas/create">Create new</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($areas as $area)
                    <tr>
                        <th>{{$loop->index+1}}</th>
                        <td>{{$area->district}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm float-right" href="/areas/{{$area->id}}">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection