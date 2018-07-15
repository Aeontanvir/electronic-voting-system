@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Parties
            <a class="btn btn-outline-primary btn-sm float-right" href="/parties/create">Create new</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <ul class="list-group">
                @foreach($parties as $party)
                {{-- $loop->first ? 'active' : '' --}}
                <li class="list-group-item ">
                    <a href="/parties/{{$party->id}}" class="list-group-item-heading">{{$party->title}}</a>
                    <p class="list-group-item-text">{{$company->image}}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
