@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Area Name : {{ $area->district }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('zones.store')}}">


                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="name">Zone Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Zone Name">
                        </div>
                        <input type="hidden" name="area_id" value="{{$area->id}}">
                        <button type="submit" class="btn btn-primary float-right">Add Zone</button>

                    </form>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Area</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($area->zones as $zone)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$zone->name}}</td>
                                <td>{{$zone->area->district}}</td>
                                <td>
                                    <form action="{{ route('zones.destroy', [$zone->id]) }}" method="POST">
                                        <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection