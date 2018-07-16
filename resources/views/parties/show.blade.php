@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <h2 class="card-title float-left">{{ $party->title }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Full Name</th>
                                <td>{{$party->title}}</td>
                            </tr>
                            <tr>
                                <th>Short Name</th>
                                <td>{{$party->short}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td class="text-justify">{{$party->description}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <img src="/images/{{$party->image}}" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection