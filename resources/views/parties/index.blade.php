@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-left">Parties</h2>
            <a class="btn btn-outline-primary btn-sm float-right" href="/parties/create">Create new</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Thumb</th>
                        <th scope="col">Name</th>
                        <th scope="col">Short</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($parties as $party)
                    <tr>
                        <th scope="row">
                            <img src="/images/{{$party->image}}" alt="" class="thumb">
                        </th>
                        <td>{{$party->title}}</td>
                        <td>{{$party->short}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm float-right" href="/parties/{{$party->id}}">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection