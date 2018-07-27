@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-left">Election Voting: Voter Identify</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="nid">National ID</label>
                        <input type="text" name="nid" class="form-control" id="nid" placeholder="NID" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection